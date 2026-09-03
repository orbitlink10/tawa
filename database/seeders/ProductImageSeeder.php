<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Curated product image URLs, keyed by SKU.
     *
     * Prefer official manufacturer images; use reference catalog images where
     * they are the available source for imported/curated catalog products.
     */
    protected array $images = [
        // Ubiquiti / UniFi
        'LBE-M5-23' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/12/ubiquiti-litebeam-m5-23dbi.jpg',
        'LOCO M5' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/Ubiquiti-Networks-NanoStation-locoM5-airMAX-CPE.jpg',
        'NANOSTATION M2' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/Ubiquiti-NanoStation-M2-NSM2.jpg',
        'NBE-5AC-GEN2' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/12/UBNT-Nanobeam-M5AC-19.jpg',
        'AM-5G19-120' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/12/UBNT-5GHZ-MIMOSECTOR-AIRMAX-120-19DBI.jpg',
        'U6+' => 'https://ctcsolutions.co.ke/wp-content/uploads/2024/06/ubiquiti_networks_u6_us_unifi_u6_access_point_1780284.webp',

        // MikroTik (cdn.mikrotik.com)
        'RB4011IGS+RM' => 'https://cdn.mikrotik.com/web-assets/rb_images/1633_lg.webp',
        'RB5009UG+S+IN' => 'https://cdn.mikrotik.com/web-assets/rb_images/2065_lg.webp',
        'CCR2004-1G-12S+2XS' => 'https://cdn.mikrotik.com/web-assets/rb_images/1935_lg.webp',
        'RB941-2ND' => 'https://ctcsolutions.co.ke/wp-content/uploads/2019/05/Mikrotik-RB941-2nD-hAP-Lite-Access-Points-kenya.jpg',
        'RBSXTSQG-5ACD' => 'https://cdn.mikrotik.com/web-assets/rb_images/1374_lg.webp',
        'RB912UAG-5HPND-OUT' => 'https://ctcsolutions.co.ke/wp-content/uploads/2019/05/Mikrotik-BaseBox-5-RB912UAG-5HPnD-OUT-5GHz-Outdoor-Wireless-AP-Kenya.jpg',
        'RB260GSP' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/12/Mikrotik-RB260GSP.jpg',

        // TP-Link
        'CPE210' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/tp-link-cpe210.jpg',
        'CPE510' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/TP-Link-CPE510-Outdoor-CPE-5GHz-300Mbps-13dBi.jpg',
        'EAP225' => 'https://ctcsolutions.co.ke/wp-content/uploads/2025/08/EAP225-indoor.jpg',
        'MC210CS' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/12/TL-MC210.jpg',
        'TL-WA801ND' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/300Mbps-Tp-Link-TL-WA801ND-Wireless-Access-Point.jpg',
        'POE-48V-GBE' => 'https://ctcsolutions.co.ke/wp-content/uploads/2018/10/tl-poe150s.jpg',

        // D-Link
        'DES-1016D' => 'https://ctcsolutions.co.ke/wp-content/uploads/2020/03/DGS-1016D1_800x.jpg',
        'DES-1024D' => 'https://ctcsolutions.co.ke/wp-content/uploads/2020/03/D-Link-des-1024d-24-Port.png',
        'DGS-1210-28P' => 'https://ctcsolutions.co.ke/wp-content/uploads/2020/03/dgs-1210-28p-removebg-preview.png',
        'DGS-F1010P-E' => 'https://ctcsolutions.co.ke/wp-content/uploads/2021/12/dgs-f1010p-e.jpg',

        // Fibre, cabling, CCTV, and telephony
        'CAT6-UTP-305M' => 'https://ctcsolutions.co.ke/wp-content/uploads/2020/07/Easenet-Cat6-Indoor-Ethernet-Cable.png',
        'CAB-6U' => 'https://ctcsolutions.co.ke/wp-content/uploads/2019/03/6u-450mm-Deep-Wall-Mounted-Data-Cabinet-600mm-by-450mm-300x300.jpg',
        'PLC-1X8-SC-APC' => 'https://ctcsolutions.co.ke/wp-content/uploads/2025/11/1x8-plc-sc-pc-optical-fiber-plc-splitter.webp',
        'FC-SC-APC-10' => 'https://ctcsolutions.co.ke/wp-content/uploads/2021/07/Fast_connector_SC_APC-removebg-preview-1.png',
        'PC-SC-SC-3M' => 'https://ctcsolutions.co.ke/wp-content/uploads/2021/07/PATCH-CORDS-2MM-2M-SC-APC-SC-UPC.jpg',
        'IPC-HDBW2231R' => 'https://ctcsolutions.co.ke/wp-content/uploads/2024/12/Dahua-DH-HDBW1230E-S5-Dome-IP-Camera.webp',
        'S20' => 'https://www.yeastar.com/wp-content/uploads/2019/10/s20.png',
        'T31P' => 'https://www.yealink.com/website-service/attachment/product/image/20220412/20220412034059226efefcb5e44e7863a6ee573eae373.png',
        'CTC-DHIPCTIE20P0280B' => 'https://ctcsolutions.co.ke/wp-content/uploads/2024/12/DAHUA-DH-IPC-T1E20.jpeg',
    ];

    public function run(): void
    {
        foreach ($this->images as $sku => $imageUrl) {
            Product::where('sku', $sku)->update(['image_url' => $imageUrl]);
        }
    }
}
