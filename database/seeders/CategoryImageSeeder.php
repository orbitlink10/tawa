<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategoryImageSeeder extends Seeder
{
    /**
     * Official manufacturer images for categories, keyed by slug.
     * Categories and sub-categories share unique slugs.
     */
    protected array $images = [
        'wireless-devices' => 'https://cdn.mikrotik.com/web-assets/rb_images/1374_lg.webp',
        'routers' => 'https://cdn.mikrotik.com/web-assets/rb_images/1633_lg.webp',
        'network-switches' => 'https://cdn.mikrotik.com/web-assets/rb_images/1466_lg.webp',
        'wireless-access-points' => 'https://cdn.mikrotik.com/web-assets/rb_images/1447_lg.webp',
        'wireless-outdoor-cpe' => 'https://cdn.mikrotik.com/web-assets/rb_images/1374_lg.webp',
        'point-to-point-antennas' => 'https://cdn.mikrotik.com/web-assets/rb_images/1374_lg.webp',
    ];

    public function run(): void
    {
        foreach ($this->images as $slug => $imageUrl) {
            Category::where('slug', $slug)->update(['image_url' => $imageUrl]);
            SubCategory::where('slug', $slug)->update(['image_url' => $imageUrl]);
        }
    }
}
