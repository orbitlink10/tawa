<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'h4_title' => 'Networking Equipment Supplier',
                'h2_title' => 'Networking Equipment in Kenya',
                'h1_title' => 'Routers, Switches, Access Points & Fibre',
                'description' => 'Shop routers, switches, wireless access points, fibre optic equipment, structured cabling and CCTV products from leading networking brands.',
                'button_url' => '/shop',
                'button_text' => 'Shop Networking Equipment',
                'img_url' => '/lucare/assets/imgs/shop/thumbnail-3.jpg',
            ],
            [
                'h4_title' => 'Trusted by ISPs & Installers',
                'h2_title' => 'MikroTik Routers & Switches',
                'h1_title' => 'MikroTik Products in Kenya',
                'description' => 'RB4011, RB5009, CCR and CRS series routers and switches for ISPs, hotspots and business networks.',
                'button_url' => '/brand/mikrotik',
                'button_text' => 'Browse MikroTik',
                'img_url' => '/lucare/assets/imgs/shop/thumbnail-4.jpg',
            ],
            [
                'h4_title' => 'Long-Range Wireless',
                'h2_title' => 'Ubiquiti Wireless & CPE',
                'h1_title' => 'Ubiquiti Products in Kenya',
                'description' => 'airMAX CPE, NanoStation and UniFi access points for wireless ISPs and managed networks.',
                'button_url' => '/brand/ubiquiti',
                'button_text' => 'Shop Ubiquiti',
                'img_url' => '/lucare/assets/imgs/shop/thumbnail-3.jpg',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(
                ['h1_title' => $slider['h1_title']],
                $slider
            );
        }
    }
}
