<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'name' => 'MikroTik',
                'slug' => 'mikrotik',
                'short_description' => 'Powerful and affordable routers, switches and wireless devices for ISPs, hotspots and enterprise networks.',
                'description' => $this->mikrotik(),
                'meta_title' => 'MikroTik Products in Kenya | Routers, Switches & Wireless | Tawa',
                'meta_description' => 'Buy MikroTik routers, switches and wireless devices in Kenya. Competitive MikroTik prices in Nairobi with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Ubiquiti',
                'slug' => 'ubiquiti',
                'short_description' => 'airMAX CPE, NanoStation, NanoBeam and UniFi access points for wireless ISPs and managed networks.',
                'description' => $this->ubiquiti(),
                'meta_title' => 'Ubiquiti Products in Kenya | Access Points & CPE | Tawa',
                'meta_description' => 'Shop Ubiquiti networking equipment in Kenya including airMAX CPE, NanoStation and UniFi access points. Fast delivery from Tawa.',
            ],
            [
                'name' => 'TP-Link',
                'slug' => 'tp-link',
                'short_description' => 'Reliable routers, access points, CPE and switches for homes, offices and ISPs.',
                'description' => $this->tpLink(),
                'meta_title' => 'TP-Link Products in Kenya | Routers, CPE & Access Points | Tawa',
                'meta_description' => 'Buy TP-Link routers, CPE210, CPE510, EAP access points and switches in Kenya. Competitive TP-Link prices with nationwide delivery.',
            ],
            [
                'name' => 'Tenda',
                'slug' => 'tenda',
                'short_description' => 'Affordable home and SMB networking — routers, extenders and access points.',
                'description' => $this->tenda(),
                'meta_title' => 'Tenda Products in Kenya | Routers & Extenders | Tawa',
                'meta_description' => 'Shop Tenda routers, WiFi extenders and access points in Kenya at affordable prices. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'D-Link',
                'slug' => 'd-link',
                'short_description' => 'Managed and unmanaged switches for reliable business and enterprise networks.',
                'description' => $this->dlink(),
                'meta_title' => 'D-Link Products in Kenya | Network Switches | Tawa',
                'meta_description' => 'Buy D-Link network switches in Kenya including PoE and managed Gigabit switches. Delivery in Nairobi and across Kenya from Tawa.',
            ],
            [
                'name' => 'Dahua',
                'slug' => 'dahua',
                'short_description' => 'IP and analog CCTV cameras, NVRs and access control for security installers.',
                'description' => $this->dahua(),
                'meta_title' => 'Dahua CCTV & Security Products in Kenya | Tawa',
                'meta_description' => 'Shop Dahua CCTV cameras, NVRs and access control systems in Kenya. Quality security equipment with nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Netlink',
                'slug' => 'netlink',
                'short_description' => 'Fibre optic media converters, SFP modules and ONUs for FTTH networks.',
                'description' => $this->netlink(),
                'meta_title' => 'Netlink Products in Kenya | Fibre & Media Converters | Tawa',
                'meta_description' => 'Buy Netlink media converters, SFP modules and fibre optic equipment in Kenya. Ideal for ISPs and installers. Delivery from Tawa.',
            ],
            [
                'name' => 'Panasonic',
                'slug' => 'panasonic',
                'short_description' => 'PBX telephone systems and IP/DECT phones for business communications.',
                'description' => $this->panasonic(),
                'meta_title' => 'Panasonic PBX & Phones in Kenya | Tawa',
                'meta_description' => 'Shop Panasonic PBX systems and phones in Kenya for reliable business communication. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'short_description' => 'Enterprise routers, switches and optical networking equipment.',
                'description' => $this->huawei(),
                'meta_title' => 'Huawei Products in Kenya | Routers & Switches | Tawa',
                'meta_description' => 'Buy Huawei networking equipment in Kenya including routers and switches. Enterprise-grade hardware delivered nationwide by Tawa.',
            ],
            [
                'name' => 'V-SOL',
                'slug' => 'vsol',
                'short_description' => 'GPON OLTs, ONUs and fibre optic equipment for ISP networks.',
                'description' => $this->vsol(),
                'meta_title' => 'V-SOL Products in Kenya | GPON & Fibre | Tawa',
                'meta_description' => 'Shop V-SOL GPON OLTs, ONUs and fibre optic equipment in Kenya. Trusted by ISPs. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'Mercusys',
                'slug' => 'mercusys',
                'short_description' => 'Budget-friendly WiFi routers and range extenders for home users.',
                'description' => $this->mercusys(),
                'meta_title' => 'Mercusys Products in Kenya | Routers & Extenders | Tawa',
                'meta_description' => 'Buy Mercusys WiFi routers and range extenders in Kenya at budget-friendly prices. Nationwide delivery from Tawa.',
            ],
            [
                'name' => 'ZKTeco',
                'slug' => 'zkteco',
                'short_description' => 'Biometric, RFID and time-attendance access control systems.',
                'description' => $this->zkteco(),
                'meta_title' => 'ZKTeco Access Control in Kenya | Tawa',
                'meta_description' => 'Shop ZKTeco biometric and RFID access control and time attendance systems in Kenya. Nationwide delivery from Tawa.',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(['slug' => $brand['slug']], $brand);
        }
    }

    protected function mikrotik(): string
    {
        return <<<HTML
        <p>MikroTik is the go-to brand for Kenyan ISPs, WISPs and network engineers who need powerful, flexible networking at a fair price. Its RouterBOARD routers, Cloud Core Router (CCR) series and CRS switches combine RouterOS — one of the most capable router operating systems available — with hardware built to handle hotspot, routing, firewall and VPN workloads.</p>
        <h3>Popular MikroTik products in Kenya</h3>
        <ul><li><strong>Routers</strong> — RB4011iGS+RM, RB5009, CCR2004 and hEX series.</li><li><strong>Switches</strong> — CRS and CSS series with PoE options.</li><li><strong>Wireless</strong> — SXT, BaseBox and LHG for point-to-point links.</li></ul>
        <p>Buy MikroTik equipment in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function ubiquiti(): string
    {
        return <<<HTML
        <p>Ubiquiti is known for its airMAX line of wireless CPE and its UniFi range of managed access points, giving Kenyan wireless ISPs and IT teams dependable point-to-point and point-to-multipoint connectivity.</p>
        <h3>Popular Ubiquiti products in Kenya</h3>
        <ul><li><strong>airMAX CPE</strong> — LiteBeam M5, NanoStation M2/M5, NanoBeam AC and PowerBeam.</li><li><strong>Access points</strong> — UniFi U6 and UAP series.</li><li><strong>Antennas</strong> — AM-5G19-120 sector antennas.</li></ul>
        <p>Shop Ubiquiti networking equipment in Kenya from Tawa for competitive prices and fast delivery.</p>
        HTML;
    }

    protected function tpLink(): string
    {
        return <<<HTML
        <p>TP-Link delivers dependable, affordable networking for homes, offices and wireless ISPs. Its CPE210 and CPE510 outdoor radios are a staple for Kenyan point-to-point links, while the EAP and Omada series serve growing business WiFi needs.</p>
        <h3>Popular TP-Link products in Kenya</h3>
        <ul><li><strong>Outdoor CPE</strong> — CPE210 and CPE510.</li><li><strong>Access points</strong> — EAP115, EAP225 and Omada.</li><li><strong>Routers &amp; switches</strong> — TL-WR840N, media converters and PoE switches.</li></ul>
        <p>Buy TP-Link equipment in Kenya from Tawa with delivery in Nairobi and across the country.</p>
        HTML;
    }

    protected function tenda(): string
    {
        return <<<HTML
        <p>Tenda offers budget-friendly home and small-business networking. Its routers and WiFi extenders are a popular choice for Kenyan homes and small offices that need reliable coverage without a large investment.</p>
        <p>Buy Tenda routers and range extenders in Kenya from Tawa with fast, nationwide delivery.</p>
        HTML;
    }

    protected function dlink(): string
    {
        return <<<HTML
        <p>D-Link is a long-standing networking brand whose DES and DGS switch lines are widely used in Kenyan offices, schools and ISP networks. From unmanaged desktop switches to managed PoE switches, D-Link covers a broad range of business needs.</p>
        <h3>Popular D-Link products in Kenya</h3>
        <ul><li><strong>Switches</strong> — DES-1016D, DES-1024D, DGS-1210 PoE series.</li></ul>
        <p>Shop D-Link switches in Kenya from Tawa for competitive prices and nationwide delivery.</p>
        HTML;
    }

    protected function dahua(): string
    {
        return <<<HTML
        <p>Dahua is a leading global security brand, offering IP and analog CCTV cameras, network video recorders (NVRs) and access control systems. Kenyan installers choose Dahua for reliable, feature-rich surveillance at a sensible price.</p>
        <p>Buy Dahua CCTV cameras and security equipment in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function netlink(): string
    {
        return <<<HTML
        <p>Netlink manufactures fibre optic media converters, SFP modules and optical network units used across Kenyan FTTH and enterprise networks. It is a cost-effective choice for bridging copper and fibre links.</p>
        <p>Shop Netlink fibre and media conversion products in Kenya from Tawa.</p>
        HTML;
    }

    protected function panasonic(): string
    {
        return <<<HTML
        <p>Panasonic has a long heritage in business telephony. Its PBX systems and DECT/IP phones remain a dependable choice for Kenyan offices that need robust voice communications.</p>
        <p>Buy Panasonic PBX systems and phones in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function huawei(): string
    {
        return <<<HTML
        <p>Huawei provides enterprise-grade routing, switching and optical networking equipment used by carriers and large organisations worldwide. Its hardware is built for high availability and heavy traffic loads.</p>
        <p>Shop Huawei networking equipment in Kenya from Tawa for enterprise and ISP projects.</p>
        HTML;
    }

    protected function vsol(): string
    {
        return <<<HTML
        <p>V-SOL specialises in GPON fibre equipment, including OLTs, ONUs and optical network terminals. Kenyan ISPs use V-SOL for cost-effective FTTH deployments.</p>
        <p>Buy V-SOL GPON and fibre optic equipment in Kenya from Tawa.</p>
        HTML;
    }

    protected function mercusys(): string
    {
        return <<<HTML
        <p>Mercusys is a value-focused brand offering simple, affordable WiFi routers and range extenders ideal for home users on a budget.</p>
        <p>Shop Mercusys routers and extenders in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }

    protected function zkteco(): string
    {
        return <<<HTML
        <p>ZKTeco is a leading maker of biometric and RFID access control and time-and-attendance systems. Kenyan businesses use ZKTeco for secure entry management and workforce tracking.</p>
        <p>Buy ZKTeco access control systems in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }
}
