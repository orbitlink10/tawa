<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Networking Equipment Supply',
                'meta_description' => 'Supply of routers, switches, access points, CPE and fibre optic equipment from leading networking brands for ISPs and businesses.',
            ],
            [
                'name' => 'Wireless Network Design',
                'meta_description' => 'Design and deployment of point-to-point and point-to-multipoint wireless links for ISPs and enterprise campuses.',
            ],
            [
                'name' => 'Fibre Optic Installation',
                'meta_description' => 'FTTH rollouts, splicing, termination and testing for residential and commercial fibre networks.',
            ],
            [
                'name' => 'CCTV & Security Installation',
                'meta_description' => 'Supply and installation of CCTV cameras and access control systems for homes, offices and institutions.',
            ],
            [
                'name' => 'Structured Cabling',
                'meta_description' => 'Professional Ethernet cabling, network cabinets and rack installations for offices and server rooms.',
            ],
            [
                'name' => 'Network Support & Maintenance',
                'meta_description' => 'Ongoing support, configuration and maintenance for business and ISP networks across Kenya.',
            ],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['name']);
            $service['description'] = $service['description'] ?? $service['meta_description'];
            $service['price'] = $service['price'] ?? 0;

            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
