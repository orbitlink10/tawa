<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncProductImagesFromSitemap extends Command
{
    protected $signature = 'tawa:sync-product-images
        {--sitemap=https://ctcsolutions.co.ke/product-sitemap.xml : Product sitemap URL}
        {--limit=0 : Limit number of matching products to update (0 = all)}
        {--overwrite : Replace existing image_url values}
        {--dry-run : Report changes without writing to the database}';

    protected $description = 'Backfill product image_url values from a sitemap without changing product content.';

    public function handle(): int
    {
        $imageUrls = $this->loadImageUrlsFromSitemap($this->option('sitemap'));

        if (empty($imageUrls)) {
            $this->error('No product images found in sitemap.');

            return self::FAILURE;
        }

        $query = Product::whereIn('slug', array_keys($imageUrls));

        if (! $this->option('overwrite')) {
            $query->where(function ($q) {
                $q->whereNull('image_url')->orWhere('image_url', '');
            });
        }

        if ((int) $this->option('limit') > 0) {
            $query->limit((int) $this->option('limit'));
        }

        $products = $query->get(['id', 'name', 'slug', 'image_url']);
        $updated = 0;

        foreach ($products as $product) {
            $imageUrl = $imageUrls[$product->slug] ?? null;

            if (empty($imageUrl)) {
                continue;
            }

            if ($this->option('dry-run')) {
                $this->line($product->slug.' => '.$imageUrl);
            } else {
                $product->forceFill(['image_url' => $imageUrl])->save();
            }

            $updated++;
        }

        $action = $this->option('dry-run') ? 'Matched' : 'Updated';
        $this->info("{$action} {$updated} products.");

        return self::SUCCESS;
    }

    protected function loadImageUrlsFromSitemap(string $url): array
    {
        $response = Http::timeout(60)->get($url);

        if (! $response->successful()) {
            return [];
        }

        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        if (! $xml) {
            return [];
        }

        $imageUrls = [];
        $namespaces = $xml->getNamespaces(true);
        $imageNamespace = $namespaces['image'] ?? null;

        foreach ($xml->url as $urlNode) {
            $loc = (string) $urlNode->loc;
            $slug = $this->slugFromUrl($loc);

            if ($slug === null || $imageNamespace === null) {
                continue;
            }

            $images = $urlNode->children($imageNamespace);
            if (isset($images->image) && isset($images->image->loc)) {
                $imageUrls[$slug] = (string) $images->image->loc;
            }
        }

        return $imageUrls;
    }

    protected function slugFromUrl(string $url): ?string
    {
        $path = trim((string) parse_url($url, PHP_URL_PATH), '/');

        if (! str_starts_with($path, 'product/')) {
            return null;
        }

        return trim(preg_replace('#^product/#', '', $path), '/');
    }
}
