<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImportCtcCatalog extends Command
{
    protected $signature = 'tawa:import-ctc
        {--sitemap=https://ctcsolutions.co.ke/product-sitemap.xml : Product sitemap URL}
        {--file= : Optional JSON file of products instead of crawling}
        {--fetch-pages : Fetch each product page for price/description/category}
        {--limit=0 : Limit number of products to import (0 = all)}
        {--dry-run : Report without writing to the database}';

    protected $description = 'Import the networking product catalog from the reference catalog (CTC) idempotently.';

    /**
     * Brand detection keywords (slug => name keywords).
     */
    protected array $brandKeywords = [
        'mikrotik' => ['mikrotik', 'mikrotic', 'rb', 'ccr', 'crs', 'hAP', 'routerboard'],
        'ubiquiti' => ['ubiquiti', 'airmax', 'litebeam', 'nanostation', 'nanobeam', 'powerbeam', 'unifi', 'u6+', 'loco'],
        'tp-link' => ['tp-link', 'tp link', 'tplink', 'cpe210', 'cpe510', 'eap', 'tapo', 'tl-'],
        'd-link' => ['d-link', 'd link', 'dlink', 'des-', 'dgs-'],
        'tenda' => ['tenda'],
        'dahua' => ['dahua', 'dh-', 'nvr', 'xvr', 'ipc-', 'imou', 'hdcvi', 'skyhawk'],
        'netlink' => ['netlink', 'easenet'],
        'panasonic' => ['panasonic', 'pabx', 'excelltel'],
        'huawei' => ['huawei'],
        'vsol' => ['v-sol', 'vsol', 'gpon', 'olt', 'onu'],
        'mercusys' => ['mercusys'],
        'zkteco' => ['zkteco', 'zk-', 'zt'],
    ];

    public function handle(): int
    {
        $products = $this->option('file') ? $this->loadFromFile() : $this->crawlSitemap();

        if (empty($products)) {
            $this->error('No products discovered.');

            return self::FAILURE;
        }

        $this->info('Discovered '.count($products).' products.');

        if ($this->option('limit') > 0) {
            $products = array_slice($products, 0, (int) $this->option('limit'));
        }

        $brands = Brand::pluck('id', 'slug');
        $categories = Category::with('subCategories')->get();
        $subCategoryMap = $categories->flatMap(function ($c) {
            return $c->subCategories->mapWithKeys(fn ($s) => [$s->slug => [$c->slug, $s->id]]);
        })->all();

        $bar = $this->output->createProgressBar(count($products));
        $imported = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($products as $item) {
            $bar->advance();

            $name = $this->normalizeName($item['name'] ?? '');
            if ($name === '') {
                $skipped++;
                continue;
            }

            $brandSlug = $this->detectBrand($item['brand'] ?? null, $name);
            $slug = $item['slug'] ?? Product::slugFrom($name, $item['model'] ?? null);
            $sku = $item['sku'] ?? $this->skuFromSlug($slug);

            if ($this->option('fetch-pages') && ! empty($item['url']) && empty($item['description'])) {
                $details = $this->fetchProductPage($item['url']);
                $item = array_merge($item, $details);
            }

            [$categorySlug, $subCategoryId] = $this->mapCategory($item, $categories, $subCategoryMap);

            $category = $categories->firstWhere('slug', $categorySlug);
            if (! $category) {
                $category = $categories->firstWhere('slug', 'wireless-devices');
            }

            if ($this->option('dry-run')) {
                $this->line('  - '.$name.' ['.$brandSlug.'] '.($category->slug ?? '').'/'.$categorySlug);
                $imported++;
                continue;
            }

            $existing = Product::withTrashed()->where('sku', $sku)->orWhere('slug', $slug)->first();

            $data = [
                'name' => $name,
                'model' => $item['model'] ?? null,
                'slug' => $slug,
                'sku' => $sku,
                'brand_id' => $brands[$brandSlug] ?? null,
                'category_id' => $category->id,
                'sub_category_id' => $subCategoryId,
                'price' => $item['price'] ?? 0,
                'marked_price' => $item['marked_price'] ?? null,
                'has_price' => isset($item['price']) && $item['price'] > 0 ? 1 : 0,
                'short_description' => $item['short_description'] ?? null,
                'description' => $item['description'] ?? $this->defaultDescription($name),
                'specifications' => $item['specifications'] ?? null,
                'meta_title' => $item['meta_title'] ?? ($name.' Price in Kenya | Tawa'),
                'meta_description' => $item['meta_description'] ?? $this->defaultMetaDescription($name),
                'stock_status' => $item['stock_status'] ?? 'in_stock',
                'is_active' => true,
                'product_type' => 'product',
            ];

            if ($existing) {
                $existing->forceFill($data)->save();
                $updated++;
            } else {
                Product::create($data);
                $imported++;
            }
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Imported: {$imported} | Updated: {$updated} | Skipped: {$skipped}");

        return self::SUCCESS;
    }

    protected function crawlSitemap(): array
    {
        $url = $this->option('sitemap');
        $this->info("Fetching sitemap: {$url}");

        $response = Http::timeout(60)->get($url);

        if (! $response->successful()) {
            $this->error('Failed to fetch sitemap.');

            return [];
        }

        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        if (! $xml) {
            $this->error('Invalid sitemap XML.');

            return [];
        }

        $products = [];
        $ns = $xml->getNamespaces(true);
        $imageNs = $ns['image'] ?? null;

        foreach ($xml->url as $urlNode) {
            $loc = (string) $urlNode->loc;
            if (! str_contains($loc, '/product/')) {
                continue;
            }

            $image = '';
            if ($imageNs) {
                $images = $urlNode->children($imageNs);
                if (isset($images->image) && isset($images->image->loc)) {
                    $image = (string) $images->image->loc;
                }
            }

            $products[] = [
                'url' => $loc,
                'slug' => $this->slugFromUrl($loc),
                'name' => $this->nameFromSlug($this->slugFromUrl($loc)),
                'photo' => $image,
            ];
        }

        return $products;
    }

    protected function fetchProductPage(string $url): array
    {
        $response = Http::timeout(60)->get($url);

        if (! $response->successful()) {
            return [];
        }

        $html = $response->body();
        $details = [];

        if (preg_match('/<h1[^>]*class="[^"]*product_title[^"]*"[^>]*>(.*?)<\/h1>/is', $html, $m)) {
            $details['name'] = trim(strip_tags($m[1]));
        }

        if (preg_match('/<span class="woocommerce-Price-amount[^"]*">.*?([\d,]+)<\/span>/is', $html, $m)) {
            $details['price'] = (float) str_replace(',', '', $m[1]);
        }

        if (preg_match('/<div[^>]*class="[^"]*product-short-description[^"]*"[^>]*>(.*?)<\/div>/is', $html, $m)) {
            $details['short_description'] = trim(strip_tags($m[1]));
        }

        return $details;
    }

    protected function loadFromFile(): array
    {
        $path = $this->option('file');
        if (! file_exists($path)) {
            $this->error("File not found: {$path}");

            return [];
        }

        return json_decode(file_get_contents($path), true) ?? [];
    }

    protected function mapCategory(array $item, $categories, array $subCategoryMap): array
    {
        if (! empty($item['subcategory']) && isset($subCategoryMap[$item['subcategory']])) {
            return [$subCategoryMap[$item['subcategory']][0], $subCategoryMap[$item['subcategory']][1]];
        }

        if (! empty($item['category']) && $categories->firstWhere('slug', $item['category'])) {
            return [$item['category'], null];
        }

        $name = strtolower($item['name'] ?? '');
        $slug = strtolower($item['slug'] ?? '');

        if (str_contains($name, 'camera') || str_contains($name, 'nvr') || str_contains($name, 'dvr') || str_contains($name, 'access control') || str_contains($name, 'intercom')) {
            return ['security-surveillance', null];
        }
        if (str_contains($name, 'cabinet') || str_contains($name, 'rack') || str_contains($name, 'cable') || str_contains($name, 'media converter') || str_contains($name, 'splitter') || str_contains($name, 'odf') || str_contains($name, 'patch cord') || str_contains($name, 'connector') || str_contains($name, 'fiber') || str_contains($name, 'fibre') || str_contains($name, 'pigtail') || str_contains($name, 'enclosure') || str_contains($name, 'fat box') || str_contains($name, 'power supply')) {
            return ['structured-cabling', null];
        }
        if (str_contains($name, 'phone') || str_contains($name, 'pbx') || str_contains($name, 'pabx')) {
            return ['pbx-ip-telephony', null];
        }

        return ['wireless-devices', null];
    }

    protected function detectBrand(?string $explicit, string $name): string
    {
        if ($explicit && array_key_exists(Str::slug($explicit), $this->brandKeywords)) {
            return Str::slug($explicit);
        }

        $haystack = strtolower($name);
        foreach ($this->brandKeywords as $slug => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($haystack, strtolower($keyword))) {
                    return $slug;
                }
            }
        }

        return 'netlink';
    }

    protected function normalizeName(string $name): string
    {
        $name = trim(strip_tags($name));

        return trim(Str::of($name)->replaceMatches('/\s+/', ' '));
    }

    protected function nameFromSlug(string $slug): string
    {
        return Str::title(str_replace(['-', '_'], ' ', $slug));
    }

    protected function slugFromUrl(string $url): string
    {
        $path = trim(parse_url($url, PHP_URL_PATH), '/');

        return preg_replace('#^(product|shop|product-category|brand)/#', '', $path);
    }

    protected function skuFromSlug(string $slug): string
    {
        $slug = Str::of($slug)->replace(['/product/', '/'], '')->__toString();

        return 'CTC-'.Str::upper(Str::limit(Str::slug($slug, ''), 24, ''));
    }

    protected function defaultDescription(string $name): string
    {
        return '<p>'.$name.' — available in Kenya from Tawa. Order online for delivery in Nairobi and across Kenya. For bulk and project pricing, contact our team.</p>';
    }

    protected function defaultMetaDescription(string $name): string
    {
        return 'Buy the '.$name.' in Kenya from Tawa. View specifications, current pricing and order for delivery in Nairobi and across Kenya.';
    }
}
