<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const IMAGES = [
        'Routers, Switches, Access Points & Fibre' => [
            '/lucare/assets/imgs/shop/thumbnail-3.jpg',
            '/lucare/assets/imgs/slider/networking-equipment.webp',
        ],
        'MikroTik Products in Kenya' => [
            '/lucare/assets/imgs/shop/thumbnail-4.jpg',
            '/lucare/assets/imgs/slider/mikrotik-rb5009.webp',
        ],
        'Ubiquiti Products in Kenya' => [
            '/lucare/assets/imgs/shop/thumbnail-3.jpg',
            '/lucare/assets/imgs/slider/ubiquiti-nanostation.jpg',
        ],
    ];

    public function up(): void
    {
        // Repair existing seeded slides without replacing administrator images.
        foreach (self::IMAGES as $title => [$oldImage, $newImage]) {
            DB::table('sliders')
                ->where('h1_title', $title)
                ->where('img_url', $oldImage)
                ->update(['img_url' => $newImage]);
        }
    }

    public function down(): void
    {
        foreach (self::IMAGES as $title => [$oldImage, $newImage]) {
            DB::table('sliders')
                ->where('h1_title', $title)
                ->where('img_url', $newImage)
                ->update(['img_url' => $oldImage]);
        }
    }
};
