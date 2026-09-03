<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadProductImages extends Command
{
    protected $signature = 'tawa:download-product-images
        {--limit=0 : Limit number of products to process (0 = all)}
        {--force : Re-download even if a local photo already exists}
        {--dry-run : Report only, do not download}';

    protected $description = 'Download product images to local storage so Tawa serves its own images (no hotlinking).';

    public function handle(): int
    {
        $query = Product::whereNotNull('image_url')->where('image_url', '!=', '');

        if ((int) $this->option('limit') > 0) {
            $query->limit((int) $this->option('limit'));
        }

        $products = $query->get(['id', 'name', 'slug', 'image_url', 'photo']);
        $this->info('Found '.$products->count().' products with image_url.');

        $bar = $this->output->createProgressBar($products->count());
        $downloaded = 0;
        $skipped = 0;
        $failed = 0;

        foreach ($products as $product) {
            $bar->advance();

            $ext = $this->extensionFromUrl($product->image_url);
            $filename = 'products/'.$product->slug.'.'.$ext;

            // Skip only when the file actually exists (unless --force).
            if (! $this->option('force') && ! empty($product->photo) && Storage::disk('public')->exists($filename)) {
                $skipped++;
                continue;
            }

            if ($this->option('dry-run')) {
                $downloaded++;
                continue;
            }

            try {
                $response = Http::timeout(60)->get($product->image_url);
            } catch (\Throwable $e) {
                $failed++;
                $this->warn("\nFailed to fetch: {$product->image_url}");
                continue;
            }

            if (! $response->successful()) {
                $failed++;
                continue;
            }

            $body = $response->body();
            if (empty($body)) {
                $failed++;
                continue;
            }

            $contentType = $response->header('Content-Type') ?? '';
            if (! Str::contains($contentType, 'image')) {
                $failed++;
                continue;
            }

            // Determine real extension from the response content-type.
            $ext = $this->extensionFromContentType($contentType) ?: $ext;
            $filename = 'products/'.$product->slug.'.'.$ext;

            if (Storage::disk('public')->put($filename, $body)) {
                $product->forceFill(['photo' => $filename])->save();
                $downloaded++;
            } else {
                $failed++;
            }
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Downloaded: {$downloaded} | Skipped (already exist): {$skipped} | Failed: {$failed}");

        return self::SUCCESS;
    }

    protected function extensionFromUrl(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH);
        $ext = strtolower(pathinfo($path ?? '', PATHINFO_EXTENSION));

        return in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']) ? $ext : 'jpg';
    }

    protected function extensionFromContentType(string $contentType): ?string
    {
        $map = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
            'image/gif' => 'gif',
            'image/svg+xml' => 'svg',
        ];

        foreach ($map as $mime => $ext) {
            if (Str::contains($contentType, $mime)) {
                return $ext;
            }
        }

        return null;
    }
}
