<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NetworkingProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::pluck('id', 'slug');
        $categories = Category::pluck('id', 'slug');
        $subCategories = SubCategory::pluck('id', 'slug');

        foreach ($this->products() as $p) {
            $brandId = $brands[$p['brand']] ?? null;
            $categoryId = $categories[$p['category']] ?? null;
            $subCategoryId = isset($p['subcategory']) ? ($subCategories[$p['subcategory']] ?? null) : null;

            $sku = $p['sku'] ?? Str::upper($p['model'] ?? Str::slug($p['name'], '-'));
            $slug = $p['slug'] ?? Product::slugFrom($p['name'], $p['model'] ?? null);

            Product::updateOrCreate(
                ['sku' => $sku],
                [
                    'name' => $p['name'],
                    'model' => $p['model'] ?? null,
                    'slug' => $slug,
                    'brand_id' => $brandId,
                    'category_id' => $categoryId,
                    'sub_category_id' => $subCategoryId,
                    'price' => $p['price'],
                    'marked_price' => $p['marked_price'] ?? null,
                    'has_price' => 1,
                    'stock' => $p['stock'] ?? 0,
                    'stock_status' => $p['stock_status'] ?? 'in_stock',
                    'short_description' => $p['short_description'] ?? null,
                    'description' => $p['description'],
                    'specifications' => $p['specifications'] ?? null,
                    'meta_title' => $p['meta_title'] ?? null,
                    'meta_description' => $p['meta_description'] ?? null,
                    'is_active' => true,
                    'featured' => $p['featured'] ?? false,
                    'product_type' => 'product',
                ]
            );
        }
    }

    protected function products(): array
    {
        return [
            // ---- Ubiquiti ----
            [
                'name' => 'Ubiquiti airMAX LiteBeam M5 LBE-M5-23',
                'model' => 'LBE-M5-23',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 6500,
                'marked_price' => 7500,
                'stock' => 15,
                'featured' => true,
                'short_description' => '5GHz 23dBi point-to-point CPE with a compact dish design for long-range links.',
                'description' => $this->litebeamM5(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Gain', 'value' => '23 dBi'],
                    ['name' => 'Throughput', 'value' => '150+ Mbps'],
                    ['name' => 'Ethernet', 'value' => '1x 10/100 Mbps'],
                    ['name' => 'Mounting', 'value' => 'Pole mount bracket included'],
                ],
                'meta_title' => 'Ubiquiti LiteBeam M5 LBE-M5-23 Price in Kenya | Tawa',
                'meta_description' => 'Buy the Ubiquiti airMAX LiteBeam M5 LBE-M5-23 23dBi 5GHz CPE in Kenya. View specs, price and order for delivery in Nairobi and across Kenya.',
            ],
            [
                'name' => 'Ubiquiti airMAX NanoStation Loco M5',
                'model' => 'Loco M5',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 8800,
                'stock' => 20,
                'featured' => true,
                'short_description' => 'Compact 5GHz 13dBi outdoor CPE for point-to-point and client links.',
                'description' => $this->locoM5(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Gain', 'value' => '13 dBi'],
                    ['name' => 'Throughput', 'value' => '150+ Mbps'],
                    ['name' => 'Ethernet', 'value' => '1x 10/100 Mbps'],
                    ['name' => 'Weatherproof', 'value' => 'Outdoor rated'],
                ],
                'meta_title' => 'Ubiquiti NanoStation Loco M5 Price in Kenya | Tawa',
                'meta_description' => 'Shop the Ubiquiti NanoStation Loco M5 5GHz 13dBi CPE in Kenya. Competitive price, specifications and nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Ubiquiti airMAX NanoStation M2',
                'model' => 'NanoStation M2',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 10500,
                'stock' => 10,
                'short_description' => '2.4GHz 11dBi outdoor CPE for point-to-multipoint and WiFi client links.',
                'description' => $this->nanostationM2(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '2.4 GHz'],
                    ['name' => 'Gain', 'value' => '11 dBi'],
                    ['name' => 'Throughput', 'value' => '150+ Mbps'],
                    ['name' => 'Ethernet', 'value' => '1x 10/100 Mbps'],
                ],
                'meta_title' => 'Ubiquiti NanoStation M2 Price in Kenya | Tawa',
                'meta_description' => 'Buy the Ubiquiti NanoStation M2 2.4GHz outdoor CPE in Kenya. View specifications and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Ubiquiti airMAX NanoBeam AC NBE-5AC-GEN2',
                'model' => 'NBE-5AC-GEN2',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 11500,
                'stock' => 8,
                'short_description' => 'Dedicated 5GHz airMAX AC CPE with a 25dBi high-gain antenna for high-throughput links.',
                'description' => $this->nanobeam(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Gain', 'value' => '25 dBi'],
                    ['name' => 'Throughput', 'value' => '450+ Mbps'],
                    ['name' => 'Ethernet', 'value' => '1x Gigabit'],
                ],
                'meta_title' => 'Ubiquiti NanoBeam AC NBE-5AC-GEN2 Price in Kenya | Tawa',
                'meta_description' => 'Shop the Ubiquiti NanoBeam AC Gen2 5GHz 25dBi CPE in Kenya. View specs, price and order for delivery across Kenya from Tawa.',
            ],
            [
                'name' => 'Ubiquiti airMAX AM-5G19-120 Sector Antenna',
                'model' => 'AM-5G19-120',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'point-to-point-antennas',
                'price' => 25000,
                'stock' => 4,
                'short_description' => '5GHz 19dBi 120-degree sector antenna for point-to-multipoint base stations.',
                'description' => $this->sectorAntenna(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Gain', 'value' => '19 dBi'],
                    ['name' => 'Beamwidth', 'value' => '120 degrees'],
                    ['name' => 'Polarisation', 'value' => 'Dual slant'],
                ],
                'meta_title' => 'Ubiquiti AM-5G19-120 Sector Antenna Price in Kenya | Tawa',
                'meta_description' => 'Buy the Ubiquiti airMAX AM-5G19-120 sector antenna in Kenya for point-to-multipoint base stations. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Ubiquiti UniFi U6+ Access Point',
                'model' => 'U6+',
                'brand' => 'ubiquiti',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-access-points',
                'price' => 13500,
                'stock' => 12,
                'featured' => true,
                'short_description' => 'Dual-band WiFi 6 access point with 3 Gbps aggregate throughput for managed networks.',
                'description' => $this->u6plus(),
                'specifications' => [
                    ['name' => 'WiFi standard', 'value' => 'WiFi 6 (802.11ax)'],
                    ['name' => 'Bands', 'value' => '2.4 GHz + 5 GHz'],
                    ['name' => 'Throughput', 'value' => 'Up to 3 Gbps'],
                    ['name' => 'PoE', 'value' => '802.3af'],
                    ['name' => 'Ethernet', 'value' => '1x Gigabit'],
                ],
                'meta_title' => 'Ubiquiti UniFi U6+ Access Point Price in Kenya | Tawa',
                'meta_description' => 'Buy the Ubiquiti UniFi U6+ WiFi 6 access point in Kenya. View specifications and order with fast delivery in Nairobi and across Kenya.',
            ],

            // ---- MikroTik ----
            [
                'name' => 'MikroTik RB4011iGS+RM',
                'model' => 'RB4011iGS+RM',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'routers',
                'price' => 32000,
                'marked_price' => 35000,
                'stock' => 6,
                'featured' => true,
                'short_description' => '10x Gigabit Ethernet router with a powerful quad-core CPU and 1GB RAM in a 1U rack-mount case.',
                'description' => $this->rb4011(),
                'specifications' => [
                    ['name' => 'CPU', 'value' => 'Quad-core 1.4 GHz'],
                    ['name' => 'RAM', 'value' => '1 GB'],
                    ['name' => 'Storage', 'value' => '512 MB NAND'],
                    ['name' => 'Ethernet', 'value' => '10x Gigabit'],
                    ['name' => 'PoE out', 'value' => '1x (port 10)'],
                    ['name' => 'Form factor', 'value' => '1U rack-mount'],
                ],
                'meta_title' => 'MikroTik RB4011iGS+RM Price in Kenya | Tawa',
                'meta_description' => 'Buy the MikroTik RB4011iGS+RM 10-port Gigabit router in Kenya. View specifications, price and order for delivery in Nairobi and across Kenya.',
            ],
            [
                'name' => 'MikroTik RB5009UG+S+IN',
                'model' => 'RB5009UG+S+IN',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'routers',
                'price' => 28000,
                'stock' => 5,
                'featured' => true,
                'short_description' => 'High-performance router with 7x Gigabit, one 2.5GbE and one 10G SFP+ port.',
                'description' => $this->rb5009(),
                'specifications' => [
                    ['name' => 'CPU', 'value' => 'Quad-core 1.4 GHz'],
                    ['name' => 'RAM', 'value' => '1 GB'],
                    ['name' => 'Ethernet', 'value' => '7x Gigabit + 1x 2.5GbE'],
                    ['name' => 'SFP+', 'value' => '1x 10G'],
                    ['name' => 'PoE out', 'value' => 'Up to 130 W'],
                ],
                'meta_title' => 'MikroTik RB5009UG+S+IN Price in Kenya | Tawa',
                'meta_description' => 'Shop the MikroTik RB5009 router with 2.5GbE and 10G SFP+ in Kenya. View specs, price and order from Tawa with nationwide delivery.',
            ],
            [
                'name' => 'MikroTik CCR2004-1G-12S+2XS',
                'model' => 'CCR2004-1G-12S+2XS',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'routers',
                'price' => 85000,
                'stock' => 2,
                'short_description' => 'Cloud Core Router with 12x 10G SFP+ and 2x 25G SFP28 ports for carrier-grade routing.',
                'description' => $this->ccr2004(),
                'specifications' => [
                    ['name' => 'CPU', 'value' => 'Annapurna Labs AL52400 quad-core 2 GHz'],
                    ['name' => 'RAM', 'value' => '4 GB'],
                    ['name' => 'SFP+', 'value' => '12x 10G'],
                    ['name' => 'SFP28', 'value' => '2x 25G'],
                    ['name' => 'Ethernet', 'value' => '1x Gigabit (management)'],
                ],
                'meta_title' => 'MikroTik CCR2004-1G-12S+2XS Price in Kenya | Tawa',
                'meta_description' => 'Buy the MikroTik CCR2004 Cloud Core Router in Kenya with 12x 10G SFP+ and 2x 25G ports. ISP-grade routing delivered nationwide by Tawa.',
            ],
            [
                'name' => 'MikroTik hAP Lite RB941-2nD',
                'model' => 'RB941-2nD',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-access-points',
                'price' => 3900,
                'stock' => 30,
                'short_description' => 'Compact 2.4GHz wireless access point and router for small homes and offices.',
                'description' => $this->hapLite(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '2.4 GHz'],
                    ['name' => 'Ethernet', 'value' => '4x 10/100 Mbps'],
                    ['name' => 'Wireless speed', 'value' => '300 Mbps'],
                    ['name' => 'PoE in', 'value' => 'Supported'],
                ],
                'meta_title' => 'MikroTik hAP Lite RB941-2nD Price in Kenya | Tawa',
                'meta_description' => 'Buy the MikroTik hAP Lite RB941-2nD wireless access point in Kenya. Affordable price with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'MikroTik SXT SQ 5AC RBSXTsqG-5acD',
                'model' => 'RBSXTsqG-5acD',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 7000,
                'stock' => 9,
                'short_description' => 'Integrated 5GHz 16dBi outdoor CPE for point-to-point and client connections.',
                'description' => $this->sxt5ac(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Gain', 'value' => '16 dBi'],
                    ['name' => 'Ethernet', 'value' => '1x Gigabit'],
                    ['name' => 'Weatherproof', 'value' => 'Outdoor rated'],
                ],
                'meta_title' => 'MikroTik SXT 5AC RBSXTsqG-5acD Price in Kenya | Tawa',
                'meta_description' => 'Shop the MikroTik SXT 5AC outdoor CPE in Kenya. View specifications, price and order with fast nationwide delivery from Tawa.',
            ],
            [
                'name' => 'MikroTik BaseBox 5 RB912UAG-5HPnD-OUT',
                'model' => 'RB912UAG-5HPnD-OUT',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 8500,
                'stock' => 7,
                'short_description' => 'Dual-polarity 5GHz outdoor base station with a powerful radio for PtMP networks.',
                'description' => $this->basebox(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Ethernet', 'value' => '1x Gigabit'],
                    ['name' => 'RAM', 'value' => '64 MB'],
                    ['name' => 'Weatherproof', 'value' => 'Outdoor rated'],
                ],
                'meta_title' => 'MikroTik BaseBox 5 RB912UAG-5HPnD-OUT Price in Kenya | Tawa',
                'meta_description' => 'Buy the MikroTik BaseBox 5 outdoor base station in Kenya. Ideal for WISP point-to-multipoint networks. Delivery from Tawa.',
            ],
            [
                'name' => 'MikroTik RB260GSP PoE Switch',
                'model' => 'RB260GSP',
                'brand' => 'mikrotik',
                'category' => 'wireless-devices',
                'subcategory' => 'network-switches',
                'price' => 7000,
                'stock' => 0,
                'stock_status' => 'out_of_stock',
                'short_description' => '5-port Gigabit switch with four PoE-out ports for powering access points and cameras.',
                'description' => $this->rb260gsp(),
                'specifications' => [
                    ['name' => 'Ports', 'value' => '5x Gigabit'],
                    ['name' => 'PoE out', 'value' => '4x 802.3af/at'],
                    ['name' => 'Switching', 'value' => 'Smart managed'],
                ],
                'meta_title' => 'MikroTik RB260GSP PoE Switch Price in Kenya | Tawa',
                'meta_description' => 'Buy the MikroTik RB260GSP 5-port Gigabit PoE switch in Kenya. View specs and order with nationwide delivery from Tawa.',
            ],

            // ---- TP-Link ----
            [
                'name' => 'TP-Link CPE210 2.4GHz 300Mbps 9dBi Outdoor CPE',
                'model' => 'CPE210',
                'brand' => 'tp-link',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 4500,
                'marked_price' => 5000,
                'stock' => 40,
                'featured' => true,
                'short_description' => '2.4GHz 300Mbps 9dBi outdoor CPE for long-distance point-to-point and client links.',
                'description' => $this->cpe210(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '2.4 GHz'],
                    ['name' => 'Speed', 'value' => '300 Mbps'],
                    ['name' => 'Gain', 'value' => '9 dBi'],
                    ['name' => 'Range', 'value' => 'Up to 5 km'],
                    ['name' => 'PoE', 'value' => 'Passive PoE (24V)'],
                ],
                'meta_title' => 'TP-Link CPE210 Price in Kenya | Tawa',
                'meta_description' => 'Buy the TP-Link CPE210 2.4GHz outdoor CPE in Kenya. View specifications, price and order with delivery in Nairobi and across Kenya from Tawa.',
            ],
            [
                'name' => 'TP-Link CPE510 5GHz 300Mbps 13dBi Outdoor CPE',
                'model' => 'CPE510',
                'brand' => 'tp-link',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-outdoor-cpe',
                'price' => 5500,
                'marked_price' => 6000,
                'stock' => 35,
                'featured' => true,
                'short_description' => '5GHz 300Mbps 13dBi outdoor CPE for high-throughput, low-interference links.',
                'description' => $this->cpe510(),
                'specifications' => [
                    ['name' => 'Frequency', 'value' => '5 GHz'],
                    ['name' => 'Speed', 'value' => '300 Mbps'],
                    ['name' => 'Gain', 'value' => '13 dBi'],
                    ['name' => 'Range', 'value' => 'Up to 15 km'],
                    ['name' => 'PoE', 'value' => 'Passive PoE (24V)'],
                ],
                'meta_title' => 'TP-Link CPE510 Price in Kenya | Tawa',
                'meta_description' => 'Shop the TP-Link CPE510 5GHz 13dBi outdoor CPE in Kenya. View specifications and order with fast nationwide delivery from Tawa.',
            ],
            [
                'name' => 'TP-Link EAP225 Wireless Access Point',
                'model' => 'EAP225',
                'brand' => 'tp-link',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-access-points',
                'price' => 9500,
                'stock' => 18,
                'short_description' => 'AC1350 ceiling-mount access point with PoE support for business WiFi.',
                'description' => $this->eap225(),
                'specifications' => [
                    ['name' => 'WiFi standard', 'value' => '802.11ac'],
                    ['name' => 'Speed', 'value' => 'AC1350 (867+450 Mbps)'],
                    ['name' => 'Bands', 'value' => 'Dual-band'],
                    ['name' => 'PoE', 'value' => '802.3af'],
                ],
                'meta_title' => 'TP-Link EAP225 Access Point Price in Kenya | Tawa',
                'meta_description' => 'Buy the TP-Link EAP225 AC1350 ceiling access point in Kenya. View specs, price and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'TP-Link TL-WR840N 300Mbps Wireless Router',
                'model' => 'TL-WR840N',
                'brand' => 'tp-link',
                'category' => 'wireless-devices',
                'subcategory' => 'routers',
                'price' => 1900,
                'stock' => 60,
                'short_description' => 'Affordable 300Mbps WiFi router for everyday home internet use.',
                'description' => $this->wr840n(),
                'specifications' => [
                    ['name' => 'WiFi standard', 'value' => '802.11n'],
                    ['name' => 'Speed', 'value' => '300 Mbps'],
                    ['name' => 'Ports', 'value' => '4x LAN + 1x WAN'],
                    ['name' => 'Antennas', 'value' => '2x external'],
                ],
                'meta_title' => 'TP-Link TL-WR840N Router Price in Kenya | Tawa',
                'meta_description' => 'Buy the TP-Link TL-WR840N 300Mbps wireless router in Kenya. Affordable price with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'TP-Link MC210CS Gigabit Media Converter',
                'model' => 'MC210CS',
                'brand' => 'tp-link',
                'category' => 'structured-cabling',
                'subcategory' => 'media-converters',
                'price' => 3500,
                'stock' => 25,
                'short_description' => 'Gigabit single-mode media converter for extending Ethernet over fibre.',
                'description' => $this->mc210cs(),
                'specifications' => [
                    ['name' => 'Ethernet', 'value' => '1x Gigabit RJ45'],
                    ['name' => 'Fibre', 'value' => '1x Gigabit SFP (single-mode)'],
                    ['name' => 'Distance', 'value' => 'Up to 20 km'],
                ],
                'meta_title' => 'TP-Link MC210CS Media Converter Price in Kenya | Tawa',
                'meta_description' => 'Shop the TP-Link MC210CS Gigabit media converter in Kenya. View specs and order with fast delivery from Tawa.',
            ],
            [
                'name' => 'TP-Link TL-WA801ND 300Mbps Access Point',
                'model' => 'TL-WA801ND',
                'brand' => 'tp-link',
                'category' => 'wireless-devices',
                'subcategory' => 'wireless-access-points',
                'price' => 2500,
                'stock' => 28,
                'short_description' => '300Mbps wireless access point for extending WiFi coverage in small spaces.',
                'description' => $this->wa801nd(),
                'specifications' => [
                    ['name' => 'WiFi standard', 'value' => '802.11n'],
                    ['name' => 'Speed', 'value' => '300 Mbps'],
                    ['name' => 'Modes', 'value' => 'AP, Repeater, Client'],
                ],
                'meta_title' => 'TP-Link TL-WA801ND Access Point Price in Kenya | Tawa',
                'meta_description' => 'Buy the TP-Link TL-WA801ND 300Mbps access point in Kenya. View specs and order with nationwide delivery from Tawa.',
            ],

            // ---- D-Link ----
            [
                'name' => 'D-Link DES-1016D 16-Port Desktop Switch',
                'model' => 'DES-1016D',
                'brand' => 'd-link',
                'category' => 'wireless-devices',
                'subcategory' => 'network-switches',
                'price' => 3800,
                'stock' => 20,
                'short_description' => '16-port 10/100 unmanaged switch for basic office and home networks.',
                'description' => $this->des1016d(),
                'specifications' => [
                    ['name' => 'Ports', 'value' => '16x 10/100 Mbps'],
                    ['name' => 'Management', 'value' => 'Unmanaged'],
                    ['name' => 'Switching capacity', 'value' => '3.2 Gbps'],
                ],
                'meta_title' => 'D-Link DES-1016D 16-Port Switch Price in Kenya | Tawa',
                'meta_description' => 'Buy the D-Link DES-1016D 16-port switch in Kenya. View specs, price and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'D-Link DES-1024D 24-Port Desktop Switch',
                'model' => 'DES-1024D',
                'brand' => 'd-link',
                'category' => 'wireless-devices',
                'subcategory' => 'network-switches',
                'price' => 5000,
                'stock' => 15,
                'short_description' => '24-port 10/100 unmanaged switch for growing office networks.',
                'description' => $this->des1024d(),
                'specifications' => [
                    ['name' => 'Ports', 'value' => '24x 10/100 Mbps'],
                    ['name' => 'Management', 'value' => 'Unmanaged'],
                    ['name' => 'Switching capacity', 'value' => '4.8 Gbps'],
                ],
                'meta_title' => 'D-Link DES-1024D 24-Port Switch Price in Kenya | Tawa',
                'meta_description' => 'Shop the D-Link DES-1024D 24-port switch in Kenya. View specifications and order with fast delivery from Tawa.',
            ],
            [
                'name' => 'D-Link DGS-1210-28P 28-Port Gigabit PoE Switch',
                'model' => 'DGS-1210-28P',
                'brand' => 'd-link',
                'category' => 'wireless-devices',
                'subcategory' => 'network-switches',
                'price' => 35000,
                'stock' => 3,
                'featured' => true,
                'short_description' => '24-port Gigabit PoE+ smart switch with 4 SFP uplinks for business networks.',
                'description' => $this->dgs1210(),
                'specifications' => [
                    ['name' => 'Ports', 'value' => '24x Gigabit PoE+ + 4x SFP'],
                    ['name' => 'Management', 'value' => 'Smart managed'],
                    ['name' => 'PoE budget', 'value' => '193 W'],
                ],
                'meta_title' => 'D-Link DGS-1210-28P PoE Switch Price in Kenya | Tawa',
                'meta_description' => 'Buy the D-Link DGS-1210-28P 28-port Gigabit PoE switch in Kenya. View specs and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'D-Link DGS-F1010P-E 8-Port PoE Switch',
                'model' => 'DGS-F1010P-E',
                'brand' => 'd-link',
                'category' => 'wireless-devices',
                'subcategory' => 'network-switches',
                'price' => 9000,
                'stock' => 12,
                'short_description' => '8-port Gigabit unmanaged PoE switch for cameras and access points.',
                'description' => $this->dgsf1010p(),
                'specifications' => [
                    ['name' => 'Ports', 'value' => '8x Gigabit PoE'],
                    ['name' => 'Management', 'value' => 'Unmanaged'],
                    ['name' => 'PoE budget', 'value' => '92 W'],
                ],
                'meta_title' => 'D-Link DGS-F1010P-E PoE Switch Price in Kenya | Tawa',
                'meta_description' => 'Shop the D-Link DGS-F1010P-E 8-port PoE switch in Kenya. View specs and order with fast nationwide delivery from Tawa.',
            ],

            // ---- Structured cabling ----
            [
                'name' => 'Cat6 UTP Ethernet Cable (305m Box)',
                'model' => 'CAT6-UTP-305M',
                'brand' => 'netlink',
                'category' => 'structured-cabling',
                'subcategory' => 'ethernet-cables',
                'price' => 8500,
                'stock' => 25,
                'featured' => true,
                'short_description' => 'Solid bare-copper Cat6 UTP cable in a 305m box for Gigabit structured cabling.',
                'description' => $this->cat6cable(),
                'specifications' => [
                    ['name' => 'Category', 'value' => 'Cat6 UTP'],
                    ['name' => 'Conductor', 'value' => '23 AWG solid bare copper'],
                    ['name' => 'Length', 'value' => '305 m box'],
                    ['name' => 'Bandwidth', 'value' => '250 MHz'],
                ],
                'meta_title' => 'Cat6 Cable Price in Kenya | 305m UTP Ethernet Cable | Tawa',
                'meta_description' => 'Buy Cat6 UTP Ethernet cable (305m box) in Kenya. Competitive Cat6 cable price with nationwide delivery from Tawa.',
            ],
            [
                'name' => '6U Wall-Mount Network Cabinet',
                'model' => 'CAB-6U',
                'brand' => 'netlink',
                'category' => 'structured-cabling',
                'subcategory' => 'network-cabinets',
                'price' => 4500,
                'stock' => 10,
                'short_description' => '6U wall-mount network cabinet for switches, patch panels and small racks.',
                'description' => $this->cabinet6u(),
                'specifications' => [
                    ['name' => 'Size', 'value' => '6U wall-mount'],
                    ['name' => 'Material', 'value' => 'Cold-rolled steel'],
                    ['name' => 'Depth', 'value' => '450 mm'],
                ],
                'meta_title' => '6U Network Cabinet Price in Kenya | Tawa',
                'meta_description' => 'Buy a 6U wall-mount network cabinet in Kenya. View specifications and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'PoE Injector 48V Gigabit',
                'model' => 'POE-48V-GBE',
                'brand' => 'tp-link',
                'category' => 'structured-cabling',
                'subcategory' => 'poe-injectors',
                'price' => 1500,
                'stock' => 40,
                'short_description' => '48V Gigabit passive PoE injector for powering CPE, cameras and access points.',
                'description' => $this->poeInjector(),
                'specifications' => [
                    ['name' => 'Output', 'value' => '48V passive PoE'],
                    ['name' => 'Ethernet', 'value' => 'Gigabit'],
                    ['name' => 'Max power', 'value' => '24 W'],
                ],
                'meta_title' => 'PoE Injector Price in Kenya | 48V Gigabit | Tawa',
                'meta_description' => 'Buy a 48V Gigabit PoE injector in Kenya for powering access points and cameras. Nationwide delivery from Tawa.',
            ],

            // ---- Fibre optic ----
            [
                'name' => 'Fibre Optic PLC Splitter 1x8 SC/APC',
                'model' => 'PLC-1X8-SC-APC',
                'brand' => 'netlink',
                'category' => 'fibre-optic-solutions',
                'subcategory' => 'plc-splitters',
                'price' => 1200,
                'stock' => 50,
                'featured' => true,
                'short_description' => '1x8 PLC splitter with SC/APC connectors for FTTH distribution.',
                'description' => $this->plcSplitter(),
                'specifications' => [
                    ['name' => 'Type', 'value' => '1x8 PLC splitter'],
                    ['name' => 'Connector', 'value' => 'SC/APC'],
                    ['name' => 'Insertion loss', 'value' => '≤ 10.5 dB'],
                ],
                'meta_title' => 'PLC Splitter 1x8 SC/APC Price in Kenya | Tawa',
                'meta_description' => 'Buy a fibre optic PLC splitter 1x8 SC/APC in Kenya for FTTH networks. Competitive price with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'SC/APC Fast Connector (Pack of 10)',
                'model' => 'FC-SC-APC-10',
                'brand' => 'netlink',
                'category' => 'fibre-optic-solutions',
                'subcategory' => 'fast-connectors',
                'price' => 800,
                'stock' => 60,
                'short_description' => 'Pre-polished SC/APC fast connectors for quick fibre drop termination without splicing.',
                'description' => $this->fastConnector(),
                'specifications' => [
                    ['name' => 'Type', 'value' => 'SC/APC pre-polished'],
                    ['name' => 'Quantity', 'value' => '10 per pack'],
                    ['name' => 'Cable', 'value' => '0.9mm / 2.0mm / 3.0mm drop'],
                ],
                'meta_title' => 'SC/APC Fast Connector Price in Kenya | Tawa',
                'meta_description' => 'Shop SC/APC fast connectors in Kenya (pack of 10) for quick FTTH fibre termination. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Fiber Patch Cord SC/APC to SC/APC 3m',
                'model' => 'PC-SC-SC-3M',
                'brand' => 'netlink',
                'category' => 'fibre-optic-solutions',
                'subcategory' => 'patch-cords-pigtails',
                'price' => 500,
                'stock' => 80,
                'short_description' => '3-metre single-mode SC/APC to SC/APC fibre patch cord.',
                'description' => $this->patchCord(),
                'specifications' => [
                    ['name' => 'Type', 'value' => 'Single-mode G.657A'],
                    ['name' => 'Connectors', 'value' => 'SC/APC - SC/APC'],
                    ['name' => 'Length', 'value' => '3 m'],
                ],
                'meta_title' => 'Fiber Patch Cord SC/APC Price in Kenya | Tawa',
                'meta_description' => 'Buy SC/APC fibre patch cords in Kenya (3m single-mode). View specs and order with nationwide delivery from Tawa.',
            ],

            // ---- CCTV / security ----
            [
                'name' => 'Dahua 2MP IP Dome Camera',
                'model' => 'IPC-HDBW2231R',
                'brand' => 'dahua',
                'category' => 'security-surveillance',
                'subcategory' => 'cctv-cameras',
                'price' => 6500,
                'stock' => 15,
                'featured' => true,
                'short_description' => '2MP IR dome IP camera for indoor surveillance with PoE support.',
                'description' => $this->dahuaDome(),
                'specifications' => [
                    ['name' => 'Resolution', 'value' => '2 MP (1080p)'],
                    ['name' => 'Lens', 'value' => '2.8mm fixed'],
                    ['name' => 'IR range', 'value' => 'Up to 30 m'],
                    ['name' => 'PoE', 'value' => '802.3af'],
                ],
                'meta_title' => 'Dahua 2MP IP Dome Camera Price in Kenya | Tawa',
                'meta_description' => 'Buy the Dahua 2MP IP dome camera in Kenya. View specifications, price and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'ZKTeco F18 Biometric Access Control',
                'model' => 'F18',
                'brand' => 'zkteco',
                'category' => 'security-surveillance',
                'subcategory' => 'access-control',
                'price' => 18500,
                'stock' => 6,
                'short_description' => 'Fingerprint and RFID access control terminal with TCP/IP and USB.',
                'description' => $this->zktecoF18(),
                'specifications' => [
                    ['name' => 'Verification', 'value' => 'Fingerprint, RFID, password'],
                    ['name' => 'Capacity', 'value' => '3,000 templates'],
                    ['name' => 'Interface', 'value' => 'TCP/IP, USB'],
                ],
                'meta_title' => 'ZKTeco F18 Access Control Price in Kenya | Tawa',
                'meta_description' => 'Buy the ZKTeco F18 biometric access control terminal in Kenya. View specs and order with fast nationwide delivery from Tawa.',
            ],

            // ---- PBX / IP phones ----
            [
                'name' => 'Yeastar S20 VoIP PBX',
                'model' => 'S20',
                'brand' => 'panasonic',
                'category' => 'pbx-ip-telephony',
                'subcategory' => 'yeastar-pbx',
                'price' => 28000,
                'stock' => 4,
                'short_description' => 'Compact IP PBX supporting up to 20 users and 10 concurrent calls.',
                'description' => $this->yeastarS20(),
                'specifications' => [
                    ['name' => 'Users', 'value' => 'Up to 20'],
                    ['name' => 'Concurrent calls', 'value' => '10'],
                    ['name' => 'Interfaces', 'value' => '2x FXO / 2x FXS (model dependent)'],
                ],
                'meta_title' => 'Yeastar S20 VoIP PBX Price in Kenya | Tawa',
                'meta_description' => 'Buy the Yeastar S20 VoIP PBX system in Kenya for small offices. View specs and order with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Yealink T31P IP Phone',
                'model' => 'T31P',
                'brand' => 'panasonic',
                'category' => 'pbx-ip-telephony',
                'subcategory' => 'yealink-ip-phones',
                'price' => 6500,
                'stock' => 10,
                'short_description' => 'Entry-level 2-line SIP IP phone with PoE support for business voice.',
                'description' => $this->yealinkT31P(),
                'specifications' => [
                    ['name' => 'Lines', 'value' => '2 SIP accounts'],
                    ['name' => 'Display', 'value' => '132x64 graphical LCD'],
                    ['name' => 'PoE', 'value' => 'Supported'],
                ],
                'meta_title' => 'Yealink T31P IP Phone Price in Kenya | Tawa',
                'meta_description' => 'Buy the Yealink T31P SIP IP phone in Kenya. View specifications and order with fast nationwide delivery from Tawa.',
            ],
        ];
    }

    protected function litebeamM5(): string
    {
        return <<<HTML
        <h2>Ubiquiti airMAX LiteBeam M5 (LBE-M5-23)</h2>
        <p>The Ubiquiti LiteBeam M5 is a lightweight, high-performance 5&nbsp;GHz outdoor CPE built for point-to-point links and wireless ISP client connections. It packs a high-gain 23&nbsp;dBi antenna into a compact, easy-to-align dish, giving you long-range coverage and strong signal quality without the bulk of a traditional parabolic antenna. The integrated design reduces assembly time and makes it one of the fastest Ubiquiti radios to deploy in the field.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>23 dBi high-gain antenna</strong> for focused, long-distance 5&nbsp;GHz links.</li>
            <li><strong>150+ Mbps throughput</strong> for smooth client connectivity.</li>
            <li><strong>airMAX protocol</strong> with TDMA scheduling to reduce latency and increase scalability.</li>
            <li><strong>InnerFeed technology</strong> that integrates the radio into the feed horn for minimal cabling loss.</li>
            <li><strong>Compact, lightweight dish</strong> that is quick to mount and align on a pole.</li>
            <li><strong>Weather-resistant outdoor enclosure</strong> for reliable operation in harsh conditions.</li>
        </ul>
        <h3>What it's for</h3>
        <p>The LiteBeam M5 is ideal for connecting a remote home or business to a wireless ISP tower, or for linking two buildings across a campus. Its tight beamwidth helps reject interference in congested urban areas, while its high gain makes it a strong performer on long rural links.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>LiteBeam M5 radio with integrated antenna</li>
            <li>Pole mount bracket and hardware</li>
            <li>Passive PoE adapter (24V)</li>
            <li>Quick start guide</li>
        </ul>
        <p>Order the Ubiquiti LiteBeam M5 in Kenya from Tawa for competitive pricing and fast, nationwide delivery.</p>
        HTML;
    }

    protected function locoM5(): string
    {
        return <<<HTML
        <h2>Ubiquiti airMAX NanoStation Loco M5</h2>
        <p>The Ubiquiti NanoStation Loco M5 is a compact, all-in-one 5&nbsp;GHz outdoor CPE that combines the radio and a 13&nbsp;dBi antenna in a single sleek enclosure. Its small footprint makes it perfect for installations where a discreet unit is required, without sacrificing the reliable point-to-point performance that Ubiquiti's airMAX range is known for.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>13 dBi directional antenna</strong> for solid point-to-point and client links.</li>
            <li><strong>150+ Mbps throughput</strong> on the 5&nbsp;GHz band.</li>
            <li><strong>Compact form factor</strong> that blends into any roofline or wall.</li>
            <li><strong>Passive PoE</strong> for single-cable power and data.</li>
            <li><strong>Durable UV-stabilised enclosure</strong> rated for outdoor use.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the Loco M5 to connect a single customer to a wireless base station, or to bridge two nearby locations. It is a favourite of Kenyan installers for its simple mounting, easy alignment and dependable long-term performance.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>NanoStation Loco M5 radio</li>
            <li>Mounting bracket</li>
            <li>Passive PoE adapter</li>
        </ul>
        <p>Order the NanoStation Loco M5 in Kenya from Tawa with delivery in Nairobi and across the country.</p>
        HTML;
    }

    protected function nanostationM2(): string
    {
        return <<<HTML
        <h2>Ubiquiti airMAX NanoStation M2</h2>
        <p>The Ubiquiti NanoStation M2 is a proven 2.4&nbsp;GHz outdoor CPE with an 11&nbsp;dBi antenna, widely used across Kenya for point-to-multipoint client connections and WiFi links. Its long-standing reliability and simple setup have made it one of the most popular outdoor radios for ISPs and rural connectivity projects.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>2.4 GHz operation</strong> for broad compatibility and longer reach.</li>
            <li><strong>11 dBi gain</strong> with a wide enough beam for flexible deployment.</li>
            <li><strong>150+ Mbps throughput</strong> for everyday broadband use.</li>
            <li><strong>All-in-one outdoor design</strong> with passive PoE.</li>
        </ul>
        <h3>What it's for</h3>
        <p>The NanoStation M2 is ideal for connecting subscribers to a 2.4&nbsp;GHz base station or creating simple point-to-point links where 5&nbsp;GHz is congested or range is a concern. It remains a dependable workhorse for wireless networks.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>NanoStation M2 radio</li>
            <li>Mounting bracket</li>
            <li>Passive PoE adapter</li>
        </ul>
        <p>Shop the NanoStation M2 in Kenya from Tawa for competitive pricing and fast delivery.</p>
        HTML;
    }

    protected function nanobeam(): string
    {
        return <<<HTML
        <h2>Ubiquiti airMAX NanoBeam AC Gen2 (NBE-5AC-GEN2)</h2>
        <p>The Ubiquiti NanoBeam AC Gen2 is a dedicated 5&nbsp;GHz airMAX ac CPE with a high-gain 25&nbsp;dBi antenna and Gigabit Ethernet. It delivers significantly higher throughput than older 802.11n radios, making it the right choice for demanding point-to-point and client links that need clean spectrum performance and speed.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>25 dBi high-gain antenna</strong> in a compact, lightweight dish.</li>
            <li><strong>450+ Mbps throughput</strong> over airMAX ac.</li>
            <li><strong>Gigabit Ethernet port</strong> to avoid wired bottlenecks.</li>
            <li><strong>airOS 8 interface</strong> with powerful management and diagnostics.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the NanoBeam AC Gen2 to deliver high-capacity backhaul or premium subscriber links where throughput matters most. It excels on medium to long-distance 5&nbsp;GHz links in both urban and rural settings.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>NanoBeam AC Gen2 radio</li>
            <li>Mounting bracket</li>
            <li>Passive PoE adapter</li>
        </ul>
        <p>Buy the NanoBeam AC Gen2 in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function sectorAntenna(): string
    {
        return <<<HTML
        <h2>Ubiquiti airMAX AM-5G19-120 Sector Antenna</h2>
        <p>The Ubiquiti AM-5G19-120 is a 5&nbsp;GHz sector antenna with 19&nbsp;dBi gain and a wide 120-degree beamwidth, purpose-built for point-to-multipoint base stations. When paired with an airMAX Rocket radio, it lets a single tower serve dozens of CPE clients across a broad coverage area with consistent, high-quality signal.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>19 dBi gain</strong> for extended sector coverage.</li>
            <li><strong>120-degree beamwidth</strong> to cover a wide arc from one mount.</li>
            <li><strong>Dual-slant polarisation</strong> for improved MIMO performance.</li>
            <li><strong>Weatherproof construction</strong> for permanent outdoor installation.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Build a wireless ISP base station serving a residential or commercial area, or light up a campus or estate with a single sector. Three AM-5G19-120 antennas can provide a full 360-degree coverage pattern from a tower.</p>
        <p>Order the AM-5G19-120 sector antenna in Kenya from Tawa for your point-to-multipoint projects.</p>
        HTML;
    }

    protected function u6plus(): string
    {
        return <<<HTML
        <h2>Ubiquiti UniFi U6+ Access Point</h2>
        <p>The Ubiquiti UniFi U6+ is a WiFi 6 (802.11ax) access point that delivers up to 3&nbsp;Gbps aggregate throughput across the 2.4&nbsp;GHz and 5&nbsp;GHz bands. Managed through the UniFi Network controller, it brings enterprise-grade wireless to offices, hotels, schools and homes, with centralised visibility over every client and access point.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>WiFi 6 (802.11ax)</strong> for higher speeds and efficiency in dense environments.</li>
            <li><strong>Dual-band, up to 3 Gbps</strong> aggregate throughput.</li>
            <li><strong>Compact ceiling-mount design</strong> with clean, discreet styling.</li>
            <li><strong>802.3af PoE</strong> for single-cable power and data.</li>
            <li><strong>Seamless roaming</strong> and advanced RF management via UniFi.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the U6+ to cover meeting rooms, classrooms, hotel rooms or open offices with fast, reliable WiFi. Its support for many simultaneous clients makes it especially strong in busy spaces where older access points struggle.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>UniFi U6+ access point</li>
            <li>Ceiling/wall mount bracket</li>
            <li>Screws and anchors</li>
        </ul>
        <p>Buy the Ubiquiti UniFi U6+ in Kenya from Tawa with fast, nationwide delivery.</p>
        HTML;
    }

    protected function rb4011(): string
    {
        return <<<HTML
        <h2>MikroTik RB4011iGS+RM</h2>
        <p>The MikroTik RB4011iGS+RM is a powerful 10-port Gigabit router in a 1U rack-mount case, built for ISPs and businesses that need serious routing performance. A quad-core CPU, 1&nbsp;GB of RAM and 512&nbsp;MB of storage give it the headroom to handle routing, firewalling, VPN termination, QoS and hotspot workloads simultaneously.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>10x Gigabit Ethernet ports</strong>, including one PoE-out port.</li>
            <li><strong>Quad-core 1.4 GHz CPU</strong> for high packet-processing throughput.</li>
            <li><strong>1 GB RAM / 512 MB storage</strong> for large routing tables and logs.</li>
            <li><strong>Full RouterOS</strong> with advanced routing, firewall, VPN and hotspot features.</li>
            <li><strong>Rack-mount 1U enclosure</strong> for clean data-centre and cabinet installs.</li>
        </ul>
        <h3>What it's for</h3>
        <p>The RB4011iGS+RM is a strong core or distribution router for a small ISP, a busy office network, or a hotspot deployment. Its 10 Gigabit ports and rack-mount form factor make it ideal for installations where port density and throughput are both required.</p>
        <p>Buy the RB4011iGS+RM in Kenya from Tawa for competitive pricing and nationwide delivery.</p>
        HTML;
    }

    protected function rb5009(): string
    {
        return <<<HTML
        <h2>MikroTik RB5009UG+S+IN</h2>
        <p>The MikroTik RB5009UG+S+IN is a compact, high-performance router that punches well above its size. It combines seven Gigabit Ethernet ports, a 2.5&nbsp;GbE port and a 10&nbsp;Gbps SFP+ cage, plus PoE output, in a fanless desktop enclosure. This makes it a versatile core or edge router for homes, offices and ISPs that need high throughput without a rack-mount chassis.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>7x Gigabit + 1x 2.5GbE + 1x 10G SFP+</strong> for flexible connectivity.</li>
            <li><strong>Quad-core 1.4 GHz CPU and 1 GB RAM</strong> for fast routing and VPN.</li>
            <li><strong>PoE output up to 130 W</strong> to power access points and cameras.</li>
            <li><strong>Passive cooling</strong> for silent operation in offices and homes.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the RB5009 as a powerful home-lab router, a small-office gateway, or an ISP edge device. The 10G SFP+ and 2.5GbE ports make it ready for multi-gigabit fibre connections, while the PoE budget lets it power a few devices directly.</p>
        <p>Order the MikroTik RB5009 in Kenya from Tawa for competitive pricing and fast delivery.</p>
        HTML;
    }

    protected function ccr2004(): string
    {
        return <<<HTML
        <h2>MikroTik CCR2004-1G-12S+2XS</h2>
        <p>The MikroTik CCR2004-1G-12S+2XS is a carrier-grade Cloud Core Router with 12x 10&nbsp;Gbps SFP+ and 2x 25&nbsp;Gbps SFP28 ports. Its powerful quad-core ARM CPU and 4&nbsp;GB of RAM deliver the routing throughput required by ISPs, data centres and large enterprises moving serious amounts of traffic.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>12x 10G SFP+ and 2x 25G SFP28</strong> for high-capacity fibre links.</li>
            <li><strong>Quad-core 2 GHz CPU</strong> with hardware-accelerated packet processing.</li>
            <li><strong>4 GB RAM</strong> for large BGP tables and high session counts.</li>
            <li><strong>Full RouterOS v7</strong> with advanced routing and MPLS support.</li>
            <li><strong>Dual redundant power inputs</strong> for reliable operation.</li>
        </ul>
        <h3>What it's for</h3>
        <p>The CCR2004 is built for ISP core routing, data-centre aggregation and high-capacity backhaul. Its dense 10G/25G port count lets you consolidate many fibre connections into a single, powerful routing platform.</p>
        <p>Shop the CCR2004 in Kenya from Tawa for enterprise and ISP networking projects.</p>
        HTML;
    }

    protected function hapLite(): string
    {
        return <<<HTML
        <h2>MikroTik hAP Lite RB941-2nD</h2>
        <p>The MikroTik hAP Lite (RB941-2nD) is a compact 2.4&nbsp;GHz wireless access point and router that brings full RouterOS capability to small homes, offices and hotspot deployments at an entry-level price. Despite its small size, it offers four Ethernet ports and flexible wireless modes, making it one of the most versatile budget networking devices available.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>2.4 GHz, 300 Mbps wireless</strong> for everyday connectivity.</li>
            <li><strong>4x 10/100 Ethernet ports</strong> for wired devices.</li>
            <li><strong>Full RouterOS</strong> with hotspot, firewall and VPN features.</li>
            <li><strong>Compact, low-power design</strong> ideal for confined spaces.</li>
            <li><strong>PoE-in support</strong> for flexible powering options.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the hAP Lite as a budget home router, a small-office access point, or the foundation of a simple hotspot system. Its full RouterOS feature set means it can grow with your needs well beyond a typical consumer router.</p>
        <p>Buy the MikroTik hAP Lite in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function sxt5ac(): string
    {
        return <<<HTML
        <h2>MikroTik SXT 5ac (RBSXTsqG-5acD)</h2>
        <p>The MikroTik SXT 5ac is an integrated 5&nbsp;GHz outdoor CPE with a 16&nbsp;dBi antenna and Gigabit Ethernet, designed for point-to-point and client connections. Its compact square form factor and high gain make it simple to deploy, align and integrate into wireless ISP networks running MikroTik's RouterOS.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>16 dBi integrated antenna</strong> for strong 5&nbsp;GHz links.</li>
            <li><strong>Gigabit Ethernet port</strong> for full-speed backhaul.</li>
            <li><strong>802.11ac support</strong> for modern high-throughput links.</li>
            <li><strong>Compact, weatherproof enclosure</strong> for outdoor mounting.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the SXT 5ac as a client CPE to connect a subscriber to a MikroTik base station, or as one end of a point-to-point link. Its Gigabit port ensures the wired side never becomes the bottleneck, even on fast wireless links.</p>
        <p>Order the MikroTik SXT 5ac in Kenya from Tawa for reliable wireless links and fast delivery.</p>
        HTML;
    }

    protected function basebox(): string
    {
        return <<<HTML
        <h2>MikroTik BaseBox 5 (RB912UAG-5HPnD-OUT)</h2>
        <p>The MikroTik BaseBox 5 is a dual-polarity 5&nbsp;GHz outdoor base station with a high-power radio, engineered for point-to-multipoint wireless ISP networks. It supports MIMO and delivers the flexible routing, bridging and management features of RouterOS, making it a dependable foundation for serving multiple CPE clients from a single tower.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Dual-polarity MIMO 5 GHz radio</strong> for higher capacity.</li>
            <li><strong>High output power</strong> for extended PtMP coverage.</li>
            <li><strong>Gigabit Ethernet port</strong> for fast backhaul.</li>
            <li><strong>Outdoor-rated enclosure</strong> with robust mounting.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the BaseBox 5 as the access point for a wireless ISP sector, distributing connectivity to MikroTik or Ubiquiti client CPEs across a coverage area. It is particularly well-suited to rural and estate-wide networks where wired infrastructure is impractical.</p>
        <p>Buy the MikroTik BaseBox 5 in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function rb260gsp(): string
    {
        return <<<HTML
        <h2>MikroTik RB260GSP PoE Switch</h2>
        <p>The MikroTik RB260GSP is a 5-port Gigabit switch with four PoE-out ports, letting you power access points, IP cameras and other devices directly from the switch. Its smart switching features bring VLAN and port management to small installations at a very affordable price.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>5x Gigabit ports</strong>, four with PoE-out.</li>
            <li><strong>802.3af/at PoE</strong> to power cameras, APs and phones.</li>
            <li><strong>Smart managed</strong> with VLAN and port monitoring.</li>
            <li><strong>Compact, fanless design</strong> for quiet operation.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the RB260GSP to power and connect a small cluster of access points or cameras without a separate PoE injector for each device. It is a tidy, cost-effective solution for SOHO and light commercial networks.</p>
        <p>Shop the MikroTik RB260GSP PoE switch in Kenya from Tawa.</p>
        HTML;
    }

    protected function cpe210(): string
    {
        return <<<HTML
        <h2>TP-Link CPE210 2.4GHz 300Mbps 9dBi Outdoor CPE</h2>
        <p>The TP-Link CPE210 is a 2.4&nbsp;GHz outdoor CPE offering 300&nbsp;Mbps throughput and a 9&nbsp;dBi antenna, designed for point-to-point links and long-distance client connections. Its centralised Pharos management interface and straightforward setup make it a favourite among installers building wireless links across Kenyan towns and rural areas.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>2.4 GHz, 300 Mbps</strong> with a 9&nbsp;dBi directional antenna.</li>
            <li><strong>Up to 5 km range</strong> in ideal conditions.</li>
            <li><strong>Passive PoE (24V)</strong> for single-cable power and data.</li>
            <li><strong>Pharos control</strong> for easy point-to-point setup and alignment.</li>
            <li><strong>Weatherproof enclosure</strong> rated for outdoor use.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the CPE210 to connect a remote building to a wireless network, or as one end of a short-to-medium point-to-point link. The 2.4&nbsp;GHz band provides good range and penetration, making it a reliable choice where line of sight is imperfect.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>CPE210 outdoor radio</li>
            <li>Mounting bracket</li>
            <li>Passive PoE injector</li>
        </ul>
        <p>Buy the TP-Link CPE210 in Kenya from Tawa for competitive pricing and nationwide delivery.</p>
        HTML;
    }

    protected function cpe510(): string
    {
        return <<<HTML
        <h2>TP-Link CPE510 5GHz 300Mbps 13dBi Outdoor CPE</h2>
        <p>The TP-Link CPE510 is a 5&nbsp;GHz outdoor CPE with a 13&nbsp;dBi antenna and 300&nbsp;Mbps throughput, built for high-performance point-to-point links with less interference than 2.4&nbsp;GHz. With support for passive PoE and a range of up to 15&nbsp;km in ideal conditions, it is a powerful tool for long-range wireless connectivity.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>5 GHz, 300 Mbps</strong> with a 13&nbsp;dBi high-gain antenna.</li>
            <li><strong>Up to 15 km range</strong> in clear line-of-sight conditions.</li>
            <li><strong>Passive PoE (24V)</strong> for simple single-cable installation.</li>
            <li><strong>Pharos management</strong> with spectrum analysis and alignment tools.</li>
            <li><strong>Weatherproof design</strong> for permanent outdoor mounting.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the CPE510 for long-distance point-to-point backhaul or premium client links where the cleaner 5&nbsp;GHz spectrum delivers higher, more stable throughput. It is ideal for connecting distant buildings or sites to a central network.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>CPE510 outdoor radio</li>
            <li>Mounting bracket</li>
            <li>Passive PoE injector</li>
        </ul>
        <p>Order the TP-Link CPE510 in Kenya from Tawa with fast, nationwide delivery.</p>
        HTML;
    }

    protected function eap225(): string
    {
        return <<<HTML
        <h2>TP-Link EAP225 Wireless Access Point</h2>
        <p>The TP-Link EAP225 is an AC1350 dual-band ceiling-mount access point with PoE support, engineered for business WiFi. Integrated with the Omada SDN controller, it delivers centralised management, captive portal support and seamless roaming — everything a growing office or hospitality business needs to offer reliable wireless access.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>AC1350 dual-band WiFi</strong> (867 Mbps on 5 GHz + 450 Mbps on 2.4 GHz).</li>
            <li><strong>802.3af PoE</strong> for clean, single-cable installation.</li>
            <li><strong>Omada SDN integration</strong> for centralised management and roaming.</li>
            <li><strong>Ceiling-mount design</strong> with discreet, professional styling.</li>
            <li><strong>Captive portal</strong> for guest WiFi and marketing pages.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the EAP225 in offices, hotels, restaurants and schools to provide fast, stable WiFi with seamless roaming between access points. Its centralised management scales easily from one AP to dozens as your network grows.</p>
        <h3>What's in the Box</h3>
        <ul>
            <li>EAP225 access point</li>
            <li>Ceiling/wall mount kit</li>
            <li>Installation guide</li>
        </ul>
        <p>Buy the TP-Link EAP225 in Kenya from Tawa for reliable office and hospitality WiFi.</p>
        HTML;
    }

    protected function wr840n(): string
    {
        return <<<HTML
        <h2>TP-Link TL-WR840N 300Mbps Wireless Router</h2>
        <p>The TP-Link TL-WR840N is a 300&nbsp;Mbps wireless router built for everyday home internet use. With four LAN ports, two external antennas and a simple setup wizard, it provides dependable WiFi for browsing, streaming and basic networking at an affordable price.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>300 Mbps WiFi</strong> on the 2.4&nbsp;GHz band.</li>
            <li><strong>4x LAN + 1x WAN ports</strong> for wired devices.</li>
            <li><strong>2x external antennas</strong> for improved coverage.</li>
            <li><strong>Easy setup wizard</strong> for quick installation.</li>
            <li><strong>Parental controls</strong> and basic QoS.</li>
        </ul>
        <h3>What it's for</h3>
        <p>The TL-WR840N is the go-to choice for small homes and apartments that need simple, reliable WiFi without extra features or cost. It handles everyday browsing, video streaming and light multi-device use comfortably.</p>
        <p>Shop the TP-Link TL-WR840N in Kenya from Tawa at an affordable price with nationwide delivery.</p>
        HTML;
    }

    protected function mc210cs(): string
    {
        return <<<HTML
        <h2>TP-Link MC210CS Gigabit Media Converter</h2>
        <p>The TP-Link MC210CS is a Gigabit media converter that bridges a Gigabit Ethernet port to a single-mode fibre link over distances of up to 20&nbsp;km. It is a simple, reliable way to extend a network between buildings or connect remote equipment over fibre where copper cannot reach.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>1x Gigabit RJ45</strong> to <strong>1x Gigabit SFP (single-mode)</strong>.</li>
            <li><strong>Up to 20 km fibre distance</strong> for long links.</li>
            <li><strong>Plug-and-play</strong> with no configuration required.</li>
            <li><strong>Compact metal housing</strong> for durability.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the MC210CS to extend a LAN across a campus, connect an outbuilding to the main network, or bridge a copper switch to a fibre backbone. It is a cost-effective alternative to replacing switches when fibre is needed.</p>
        <p>Buy the TP-Link MC210CS media converter in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function wa801nd(): string
    {
        return <<<HTML
        <h2>TP-Link TL-WA801ND 300Mbps Access Point</h2>
        <p>The TP-Link TL-WA801ND is a 300&nbsp;Mbps wireless access point that can operate as an access point, repeater or client, making it a versatile tool for extending WiFi coverage in homes and small offices. Its flexible modes let you solve a range of coverage problems with a single, affordable device.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>300 Mbps WiFi</strong> on 2.4&nbsp;GHz.</li>
            <li><strong>Multiple modes</strong>: access point, repeater, client.</li>
            <li><strong>Passive PoE support</strong> for flexible placement.</li>
            <li><strong>2x external antennas</strong> for better range.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the TL-WA801ND to add a new wireless network, boost an existing one, or connect wired-only devices to WiFi. It is a budget-friendly way to fill coverage gaps without rewiring.</p>
        <p>Order the TP-Link TL-WA801ND in Kenya from Tawa with fast delivery.</p>
        HTML;
    }

    protected function des1016d(): string
    {
        return <<<HTML
        <h2>D-Link DES-1016D 16-Port Desktop Switch</h2>
        <p>The D-Link DES-1016D is a 16-port 10/100 unmanaged switch that delivers plug-and-play connectivity for small offices and homes. Its compact desktop form factor fits neatly on a shelf or rack shelf, and its fanless design keeps it quiet in any environment.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>16x 10/100 Mbps ports</strong> for wired devices.</li>
            <li><strong>Plug-and-play</strong> with no configuration needed.</li>
            <li><strong>3.2 Gbps switching capacity</strong> for smooth traffic.</li>
            <li><strong>Fanless, compact design</strong> for quiet operation.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the DES-1016D to connect computers, printers and other devices in a small office or to expand the port count of an existing network. It is a simple, reliable way to grow a wired LAN without complexity.</p>
        <p>Buy the D-Link DES-1016D in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function des1024d(): string
    {
        return <<<HTML
        <h2>D-Link DES-1024D 24-Port Desktop Switch</h2>
        <p>The D-Link DES-1024D is a 24-port 10/100 unmanaged switch for growing networks that need more port density without management overhead. It provides a simple, reliable way to expand a wired LAN, connecting many devices from a single network point.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>24x 10/100 Mbps ports</strong> for high device counts.</li>
            <li><strong>4.8 Gbps switching capacity</strong> for efficient traffic.</li>
            <li><strong>Plug-and-play</strong>, no setup required.</li>
            <li><strong>Rack-mountable</strong> with included brackets.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the DES-1024D in an office, classroom or small business where many wired devices need to share a network. Its 24 ports reduce the need for multiple smaller switches.</p>
        <p>Shop the D-Link DES-1024D in Kenya from Tawa.</p>
        HTML;
    }

    protected function dgs1210(): string
    {
        return <<<HTML
        <h2>D-Link DGS-1210-28P 28-Port Gigabit PoE Switch</h2>
        <p>The D-Link DGS-1210-28P is a smart managed switch with 24 Gigabit PoE+ ports and 4 SFP uplinks, offering a generous PoE budget for powering cameras, access points and phones. Its intuitive web interface provides VLAN, QoS and monitoring features, making it a strong backbone for business and surveillance networks.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>24x Gigabit PoE+ ports</strong> plus <strong>4x SFP uplinks</strong>.</li>
            <li><strong>193 W PoE budget</strong> to power many devices.</li>
            <li><strong>Smart managed</strong> with VLAN, QoS and port monitoring.</li>
            <li><strong>Web-based management</strong> for easy configuration.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the DGS-1210-28P to power and connect a large IP camera installation, a floor of access points, or a mix of PoE devices in an office. Its PoE budget and uplinks make it a one-switch solution for many deployments.</p>
        <p>Buy the D-Link DGS-1210-28P in Kenya from Tawa for business and surveillance networks.</p>
        HTML;
    }

    protected function dgsf1010p(): string
    {
        return <<<HTML
        <h2>D-Link DGS-F1010P-E 8-Port PoE Switch</h2>
        <p>The D-Link DGS-F1010P-E is an 8-port Gigabit unmanaged PoE switch with a 92&nbsp;W budget, ideal for powering IP cameras, access points and VoIP phones in small installations. Its plug-and-play operation means no setup is required, making it perfect for quick deployments.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>8x Gigabit PoE ports</strong> for cameras, APs and phones.</li>
            <li><strong>92 W total PoE budget</strong> for connected devices.</li>
            <li><strong>Unmanaged plug-and-play</strong>, no configuration.</li>
            <li><strong>Compact design</strong> for desktop or wall mounting.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the DGS-F1010P-E in a small office, shop or home to power and connect a few PoE devices without separate power adapters. It is a clean, cost-effective way to simplify cabling.</p>
        <p>Order the D-Link DGS-F1010P-E in Kenya from Tawa with fast delivery.</p>
        HTML;
    }

    protected function cat6cable(): string
    {
        return <<<HTML
        <h2>Cat6 UTP Ethernet Cable (305m Box)</h2>
        <p>This Cat6 UTP cable comes in a 305&nbsp;m box and uses solid bare-copper conductors, making it suitable for permanent structured cabling runs at Gigabit and multi-gigabit speeds. It is the reliable choice for offices, homes and ISP installations across Kenya.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Cat6 UTP</strong> for Gigabit and multi-gigabit networks.</li>
            <li><strong>23 AWG solid bare-copper conductors</strong> for stable performance.</li>
            <li><strong>305 m box</strong> for large installations and pull-through runs.</li>
            <li><strong>250 MHz bandwidth</strong> supporting 10 Gbps over shorter distances.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use this cable for permanent in-wall or in-ceiling runs, patch panel terminations and backbone links. Solid conductors perform best in fixed installations, making this the right choice for structured cabling projects rather than patch leads.</p>
        <p>Buy Cat6 cable in Kenya from Tawa at a competitive price with nationwide delivery.</p>
        HTML;
    }

    protected function cabinet6u(): string
    {
        return <<<HTML
        <h2>6U Wall-Mount Network Cabinet</h2>
        <p>This 6U wall-mount network cabinet keeps switches, patch panels and cabling tidy and secure in small installations. Its steel construction and lockable door protect equipment from dust and tampering in offices, shops and server rooms.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>6U wall-mount</strong> size for compact setups.</li>
            <li><strong>Cold-rolled steel</strong> with a durable finish.</li>
            <li><strong>450 mm depth</strong> to fit standard networking gear.</li>
            <li><strong>Lockable door</strong> for equipment security.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Mount this cabinet on a wall to house a small switch, patch panel and cabling in a clean, professional manner. It is ideal for branch offices, retail stores and home setups where floor space is limited.</p>
        <p>Order a 6U network cabinet in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function poeInjector(): string
    {
        return <<<HTML
        <h2>PoE Injector 48V Gigabit</h2>
        <p>This 48V Gigabit passive PoE injector powers devices such as CPE, IP cameras and access points over a single Ethernet cable where a PoE switch is not available. It passes Gigabit speeds with no signal degradation, making it a simple and reliable power solution.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>48V passive PoE output</strong> for compatible devices.</li>
            <li><strong>Gigabit passthrough</strong> with no speed loss.</li>
            <li><strong>Up to 24 W power</strong> for typical CPE and cameras.</li>
            <li><strong>Plug-and-play</strong>, no configuration needed.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use a PoE injector to power a single device when you don't want to add a full PoE switch. It is perfect for one-off CPE installations, isolated cameras or access points that need power at the device location.</p>
        <p>Buy PoE injectors in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function plcSplitter(): string
    {
        return <<<HTML
        <h2>Fibre Optic PLC Splitter 1x8 SC/APC</h2>
        <p>The 1x8 PLC splitter with SC/APC connectors evenly distributes a single optical signal to eight outputs, making it a core component of FTTH distribution networks. Its low insertion loss and stable performance support clean, reliable fibre rollouts for ISPs and installers.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>1x8 PLC splitter</strong> for passive optical distribution.</li>
            <li><strong>SC/APC connectors</strong> for low reflection and standard compatibility.</li>
            <li><strong>Low insertion loss</strong> (≤ 10.5 dB) for efficient signal sharing.</li>
            <li><strong>Compact, robust housing</strong> for long-term reliability.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the PLC splitter in an FTTH PON network to share a single fibre from the OLT among multiple subscriber ONTs. It is essential for building cost-effective fibre-to-the-home distribution networks.</p>
        <p>Shop PLC splitters in Kenya from Tawa for ISP and installer projects.</p>
        HTML;
    }

    protected function fastConnector(): string
    {
        return <<<HTML
        <h2>SC/APC Fast Connector (Pack of 10)</h2>
        <p>These pre-polished SC/APC fast connectors allow quick field termination of fibre drop cables without the need for splicing, dramatically speeding up FTTH installations. Each pack contains 10 connectors, ready for 0.9&nbsp;mm, 2.0&nbsp;mm and 3.0&nbsp;mm drop cables.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Pre-polished SC/APC</strong> for field assembly in seconds.</li>
            <li><strong>No splicing or polishing required</strong>, saving time and tools.</li>
            <li><strong>Compatible with 0.9/2.0/3.0 mm drop cables</strong>.</li>
            <li><strong>10 connectors per pack</strong> for efficient installs.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Fast connectors are ideal for terminating subscriber drop cables quickly during FTTH rollouts. They let installers finish customer connections on site without a fusion splicer, reducing deployment time and cost.</p>
        <p>Buy SC/APC fast connectors in Kenya from Tawa.</p>
        HTML;
    }

    protected function patchCord(): string
    {
        return <<<HTML
        <h2>Fiber Patch Cord SC/APC to SC/APC 3m</h2>
        <p>This single-mode SC/APC to SC/APC fibre patch cord is 3&nbsp;m long and built to G.657A bend-insensitive standards, ideal for connecting ODFs, ONTs and other fibre equipment in racks and cabinets.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Single-mode G.657A fibre</strong> for low-loss, bend-resistant links.</li>
            <li><strong>SC/APC connectors</strong> on both ends.</li>
            <li><strong>3 m length</strong> for tidy rack connections.</li>
            <li><strong>Low insertion loss</strong> for clean signal quality.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use this patch cord to connect fibre equipment inside a rack or cabinet, such as linking a fibre patch panel to an OLT or ONT. Its bend-insensitive construction protects the link even in tight spaces.</p>
        <p>Order fibre patch cords in Kenya from Tawa with fast delivery.</p>
        HTML;
    }

    protected function dahuaDome(): string
    {
        return <<<HTML
        <h2>Dahua 2MP IP Dome Camera</h2>
        <p>The Dahua 2MP IP dome camera captures clear 1080p video with IR night vision up to 30&nbsp;m, and it is powered through PoE for simple, single-cable installation. It is a reliable indoor surveillance camera for homes, offices and retail spaces.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>2 MP (1080p) resolution</strong> for sharp, detailed video.</li>
            <li><strong>IR night vision up to 30 m</strong> for round-the-clock coverage.</li>
            <li><strong>PoE support (802.3af)</strong> for clean single-cable installation.</li>
            <li><strong>Compact dome design</strong> for discreet ceiling mounting.</li>
            <li><strong>H.265 compression</strong> to save storage and bandwidth.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Install the Dahua dome camera in reception areas, corridors, offices or shops to monitor activity indoors. Its discreet profile and strong night vision make it a versatile choice for everyday security needs.</p>
        <p>Buy the Dahua 2MP IP dome camera in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function zktecoF18(): string
    {
        return <<<HTML
        <h2>ZKTeco F18 Biometric Access Control</h2>
        <p>The ZKTeco F18 is a biometric access control terminal supporting fingerprint, RFID and password verification for up to 3,000 users. Its TCP/IP and USB interfaces make it easy to integrate into office access and time-and-attendance systems.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Fingerprint, RFID and password</strong> verification in one device.</li>
            <li><strong>3,000 fingerprint templates</strong> for medium-sized workforces.</li>
            <li><strong>TCP/IP and USB connectivity</strong> for flexible integration.</li>
            <li><strong>Simple management software</strong> for enrolment and reporting.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the F18 to control door access and track employee attendance in offices, factories and institutions. Its combination of biometric and card verification offers both security and convenience.</p>
        <p>Order the ZKTeco F18 in Kenya from Tawa.</p>
        HTML;
    }

    protected function yeastarS20(): string
    {
        return <<<HTML
        <h2>Yeastar S20 VoIP PBX</h2>
        <p>The Yeastar S20 is a compact IP PBX supporting up to 20 users and 10 concurrent calls, bringing professional VoIP features to small offices. It supports SIP trunks, extensions, IVR and call routing without complex, expensive hardware.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>Up to 20 users and 10 concurrent calls</strong> for small teams.</li>
            <li><strong>SIP trunk and extension support</strong> for modern VoIP.</li>
            <li><strong>IVR and call routing</strong> for professional call handling.</li>
            <li><strong>Compact, reliable hardware</strong> with easy management.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Deploy the S20 in a small office to replace legacy phone lines with a flexible IP phone system. It lowers call costs and gives your team features like auto-attendant, voicemail and call queues.</p>
        <p>Buy the Yeastar S20 in Kenya from Tawa.</p>
        HTML;
    }

    protected function yealinkT31P(): string
    {
        return <<<HTML
        <h2>Yealink T31P IP Phone</h2>
        <p>The Yealink T31P is an entry-level SIP IP phone with two lines, a clear graphical display and PoE support. It is a dependable, affordable desk phone for offices moving to VoIP.</p>
        <h3>Key Features</h3>
        <ul>
            <li><strong>2 SIP accounts</strong> for flexible line handling.</li>
            <li><strong>Graphical LCD display</strong> for clear call information.</li>
            <li><strong>PoE support</strong> for single-cable power and data.</li>
            <li><strong>HD voice quality</strong> for clear conversations.</li>
        </ul>
        <h3>What it's for</h3>
        <p>Use the T31P as an affordable desk phone for employees in any office using a SIP-based PBX. Its simplicity and reliability make it ideal for high-volume, everyday calling.</p>
        <p>Order the Yealink T31P in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }
}
