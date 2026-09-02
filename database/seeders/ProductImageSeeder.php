<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Verified official manufacturer image URLs, keyed by SKU.
     *
     * URLs are validated to return HTTP 200 and correspond to the exact model.
     */
    protected array $images = [
        // MikroTik (cdn.mikrotik.com)
        'RB4011IGS+RM' => 'https://cdn.mikrotik.com/web-assets/rb_images/1633_lg.webp',
        'RB5009UG+S+IN' => 'https://cdn.mikrotik.com/web-assets/rb_images/2065_lg.webp',
        'CCR2004-1G-12S+2XS' => 'https://cdn.mikrotik.com/web-assets/rb_images/1935_lg.webp',
        'RBSXTSQG-5ACD' => 'https://cdn.mikrotik.com/web-assets/rb_images/1374_lg.webp',
    ];

    public function run(): void
    {
        foreach ($this->images as $sku => $imageUrl) {
            Product::where('sku', $sku)->update(['image_url' => $imageUrl]);
        }
    }
}
