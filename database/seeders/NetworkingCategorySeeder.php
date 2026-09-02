<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class NetworkingCategorySeeder extends Seeder
{
    /**
     * Networking/ICT taxonomy modelled on the reference catalog structure.
     *
     * @var array<string, array{slug:string, meta_title:string, meta_description:string, seo_content:string, subcategories:array<string, array{slug:string, meta_description:string}>}>
     */
    protected array $categories = [];

    public function __construct()
    {
        $this->categories = $this->build();
    }

    public function run(): void
    {
        foreach ($this->categories as $name => $data) {
            $category = Category::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $name,
                    'meta_title' => $data['meta_title'],
                    'meta_description' => $data['meta_description'],
                    'seo_content' => $data['seo_content'],
                ]
            );

            foreach ($data['subcategories'] as $subName => $subData) {
                SubCategory::updateOrCreate(
                    ['slug' => $subData['slug']],
                    [
                        'name' => $subName,
                        'category_id' => $category->id,
                    ]
                );
            }
        }
    }

    protected function build(): array
    {
        return [
            'Wireless Devices' => [
                'slug' => 'wireless-devices',
                'meta_title' => 'Wireless Networking Devices in Kenya | Routers, APs & CPE | Tawa',
                'meta_description' => 'Shop wireless networking devices in Kenya including outdoor CPE, access points, routers, switches and antennas from MikroTik, Ubiquiti and TP-Link. Nationwide delivery.',
                'seo_content' => $this->wirelessDevicesContent(),
                'subcategories' => [
                    'Wireless Outdoor CPE' => ['slug' => 'wireless-outdoor-cpe', 'meta_description' => 'Buy wireless outdoor CPE in Kenya from Ubiquiti, MikroTik and TP-Link for point-to-point and point-to-multipoint links.'],
                    'Wireless Access Points' => ['slug' => 'wireless-access-points', 'meta_description' => 'Indoor and outdoor wireless access points in Kenya from Ubiquiti, TP-Link and MikroTik for homes, offices, hotels and schools.'],
                    'Routers' => ['slug' => 'routers', 'meta_description' => 'Routers price in Kenya. Buy MikroTik, TP-Link, Tenda and Ubiquiti home, ISP and enterprise routers with nationwide delivery.'],
                    'Network Switches' => ['slug' => 'network-switches', 'meta_description' => 'Network switches in Kenya including PoE, managed and unmanaged Gigabit switches from MikroTik, TP-Link and D-Link.'],
                    'Range Extenders' => ['slug' => 'range-extenders', 'meta_description' => 'WiFi range extenders and repeaters in Kenya from TP-Link, Tenda and Mercusys to extend wireless coverage.'],
                    'USB WiFi Adapters' => ['slug' => 'usb-wifi-adapters', 'meta_description' => 'USB WiFi adapters in Kenya for desktops and laptops from TP-Link, Tenda and D-Link. Fast nationwide delivery.'],
                    'Point-to-Point Antennas' => ['slug' => 'point-to-point-antennas', 'meta_description' => 'Point-to-point antennas in Kenya from Ubiquiti and MikroTik for long-range wireless links between buildings.'],
                ],
            ],
            'Structured Cabling' => [
                'slug' => 'structured-cabling',
                'meta_title' => 'Structured Cabling Equipment in Kenya | Cables & Cabinets | Tawa',
                'meta_description' => 'Structured cabling products in Kenya: Ethernet cables, network cabinets, media converters, PoE injectors and cabinet accessories. Buy online at Tawa.',
                'seo_content' => $this->structuredCablingContent(),
                'subcategories' => [
                    'Ethernet Cables' => ['slug' => 'ethernet-cables', 'meta_description' => 'Ethernet cables in Kenya including Cat5e and Cat6 network cables. Competitive Cat6 cable prices with nationwide delivery.'],
                    'Network Cabinets' => ['slug' => 'network-cabinets', 'meta_description' => 'Network cabinets and racks in Kenya in 6U, 9U, 12U and wall-mount sizes for structured cabling and server rooms.'],
                    'Media Converters' => ['slug' => 'media-converters', 'meta_description' => 'Fibre media converters in Kenya from TP-Link, Netlink and V-SOL for converting copper Ethernet to fibre optic.'],
                    'PoE Injectors' => ['slug' => 'poe-injectors', 'meta_description' => 'Power over Ethernet (PoE) injectors in Kenya for powering access points, cameras and CPE devices.'],
                    'Cabinet Shelves' => ['slug' => 'cabinet-shelves', 'meta_description' => 'Network cabinet shelves and accessories in Kenya for tidy rack-mount installations.'],
                ],
            ],
            'Fibre Optic Solutions' => [
                'slug' => 'fibre-optic-solutions',
                'meta_title' => 'Fibre Optic Equipment in Kenya | Cables & Splitters | Tawa',
                'meta_description' => 'Fibre optic equipment in Kenya: fibre cables, PLC splitters, enclosures, fast connectors, patch cords and ODFs. Ideal for ISPs and installers.',
                'seo_content' => $this->fibreContent(),
                'subcategories' => [
                    'Fiber Optic Cables' => ['slug' => 'fiber-optic-cables', 'meta_description' => 'Fiber optic cables in Kenya — single-mode and multi-mode for FTTH and backbone links. Competitive prices.'],
                    'Fibre Optic PLC Splitters' => ['slug' => 'plc-splitters', 'meta_description' => 'Fibre optic PLC splitters in Kenya (1x4, 1x8, 1x16, 1x32) for FTTH distribution networks.'],
                    'Fiber Optic Enclosures' => ['slug' => 'fiber-optic-enclosures', 'meta_description' => 'Fiber optic enclosures and joint boxes in Kenya for safe FTTH splicing and termination.'],
                    'Fast Connectors' => ['slug' => 'fast-connectors', 'meta_description' => 'SC/APC fast connectors in Kenya for quick field termination of fibre drop cables.'],
                    'Fiber Patch Cords & Pigtails' => ['slug' => 'patch-cords-pigtails', 'meta_description' => 'Fibre patch cords and pigtails in Kenya — SC, LC, FC and ST in single-mode and multi-mode.'],
                    'Optical Distribution Frames' => ['slug' => 'optical-distribution-frames', 'meta_description' => 'Optical distribution frames (ODF) in Kenya for rack-mount fibre termination and management.'],
                ],
            ],
            'Security & Surveillance' => [
                'slug' => 'security-surveillance',
                'meta_title' => 'CCTV & Security Equipment in Kenya | Cameras & Access Control | Tawa',
                'meta_description' => 'CCTV cameras, NVRs, DVRs and access control systems in Kenya from Dahua and other leading security brands. Buy online with delivery.',
                'seo_content' => $this->securityContent(),
                'subcategories' => [
                    'CCTV Security Cameras' => ['slug' => 'cctv-cameras', 'meta_description' => 'CCTV security cameras in Kenya — IP, analog, indoor and outdoor cameras from Dahua and other brands.'],
                    'Access Control' => ['slug' => 'access-control', 'meta_description' => 'Access control systems in Kenya from ZKTeco and Dahua including biometric and RFID readers.'],
                ],
            ],
            'PBX & IP Telephony' => [
                'slug' => 'pbx-ip-telephony',
                'meta_title' => 'PBX Systems & IP Phones in Kenya | Yeastar, Yealink, Panasonic | Tawa',
                'meta_description' => 'PBX systems and IP phones in Kenya from Yeastar, Yealink, Fanvil, Panasonic and Grandstream for offices and call centres.',
                'seo_content' => $this->pbxContent(),
                'subcategories' => [
                    'Yeastar PBX Systems' => ['slug' => 'yeastar-pbx', 'meta_description' => 'Yeastar PBX systems in Kenya for VoIP and unified communications in offices.'],
                    'Yealink IP Phones' => ['slug' => 'yealink-ip-phones', 'meta_description' => 'Yealink IP phones in Kenya for VoIP and SIP telephony in offices and call centres.'],
                    'Fanvil IP Phones' => ['slug' => 'fanvil-ip-phones', 'meta_description' => 'Fanvil IP phones in Kenya — affordable SIP phones for business voice.'],
                    'Panasonic PBX' => ['slug' => 'panasonic-pbx', 'meta_description' => 'Panasonic PBX telephone systems in Kenya for business communications.'],
                    'Panasonic Phones' => ['slug' => 'panasonic-phones', 'meta_description' => 'Panasonic phones in Kenya including DECT cordless and IP telephones.'],
                    'Grandstream' => ['slug' => 'grandstream', 'meta_description' => 'Grandstream IP phones and gateways in Kenya for VoIP deployments.'],
                ],
            ],
        ];
    }

    protected function wirelessDevicesContent(): string
    {
        return <<<HTML
        <h2>Wireless Networking Devices in Kenya</h2>
        <p>Wireless devices are the backbone of modern connectivity in Kenya, powering everything from home WiFi to long-range ISP links. At Tawa we stock a focused range of <strong>wireless outdoor CPE, access points, routers, switches and antennas</strong> from brands trusted by installers and internet service providers, including MikroTik, Ubiquiti and TP-Link.</p>
        <h3>Choosing the right wireless device</h3>
        <p>A <strong>router</strong> routes traffic between your network and the internet. An <strong>access point</strong> extends WiFi to more devices, while an <strong>outdoor CPE</strong> connects a building to a wireless ISP tower over long distances. <strong>Point-to-point antennas</strong> link two locations, and <strong>range extenders</strong> boost coverage in larger homes and offices.</p>
        <h3>Trusted brands we stock</h3>
        <ul><li><strong>MikroTik</strong> — powerful, flexible routers and switches for ISPs and hotspots.</li><li><strong>Ubiquiti</strong> — airMAX CPE, NanoStation and UniFi access points.</li><li><strong>TP-Link</strong> — dependable CPE210/CPE510 radios, EAP access points and routers.</li></ul>
        <p>Order wireless equipment online from Tawa and we deliver in Nairobi and across Kenya.</p>
        HTML;
    }

    protected function structuredCablingContent(): string
    {
        return <<<HTML
        <h2>Structured Cabling Equipment in Kenya</h2>
        <p>Reliable networks start with solid cabling. Tawa supplies the structured cabling essentials that Kenyan installers, ISPs and IT teams use every day — from <strong>Ethernet cables</strong> and <strong>network cabinets</strong> to <strong>media converters</strong> and <strong>PoE injectors</strong>.</p>
        <h3>Ethernet cables</h3>
        <p>Choose <strong>Cat6 cable</strong> for Gigabit and multi-gigabit networks or <strong>Cat5e</strong> for budget-friendly 1 Gbps links. We keep bulk and pre-terminated options for every project size.</p>
        <h3>Network cabinets &amp; accessories</h3>
        <p>Wall-mount and floor-standing cabinets in common sizes keep switches, patch panels and servers organised and secure. Pair them with cabinet shelves for a tidy rack.</p>
        <h3>Media converters &amp; PoE injectors</h3>
        <p>Media converters bridge copper and fibre, while PoE injectors power access points and cameras where PoE switches aren't available.</p>
        <p>Shop structured cabling from Tawa for competitive prices and nationwide delivery in Kenya.</p>
        HTML;
    }

    protected function fibreContent(): string
    {
        return <<<HTML
        <h2>Fibre Optic Equipment in Kenya</h2>
        <p>Fibre optic networks deliver the speed and reliability that Kenyan homes and businesses demand. Tawa stocks a complete range of <strong>fibre optic cables, PLC splitters, enclosures, fast connectors, patch cords and optical distribution frames</strong> for FTTH rollouts and backbone links.</p>
        <h3>For ISPs and installers</h3>
        <ul><li><strong>PLC splitters</strong> — 1x4, 1x8, 1x16 and 1x32 for passive optical distribution.</li><li><strong>Fast connectors</strong> — quick SC/APC field termination without splicing.</li><li><strong>Enclosures &amp; ODFs</strong> — protect splices and manage fibre in racks.</li></ul>
        <p>Buy fibre optic equipment in Kenya from Tawa and get the components you need for a clean, high-performance network.</p>
        HTML;
    }

    protected function securityContent(): string
    {
        return <<<HTML
        <h2>CCTV &amp; Security Equipment in Kenya</h2>
        <p>Protect your home, office or business with security equipment from Tawa. We supply <strong>CCTV cameras</strong> and <strong>access control systems</strong> from leading brands such as Dahua and ZKTeco.</p>
        <h3>CCTV cameras</h3>
        <p>From IP cameras to analog and outdoor bullet or dome cameras, choose the right surveillance for your site. Pair cameras with NVRs for recording and remote viewing.</p>
        <h3>Access control</h3>
        <p>Biometric, RFID and PIN-based access control systems manage who enters your premises, with time-and-attendance reporting for businesses.</p>
        <p>Shop security and surveillance equipment in Kenya with delivery from Tawa.</p>
        HTML;
    }

    protected function pbxContent(): string
    {
        return <<<HTML
        <h2>PBX Systems &amp; IP Phones in Kenya</h2>
        <p>Give your business a professional voice system with PBX and IP telephony equipment from Tawa. We stock <strong>Yeastar PBX systems</strong>, <strong>Yealink, Fanvil, Panasonic and Grandstream phones</strong> for offices, call centres and hotels.</p>
        <h3>Why IP telephony?</h3>
        <p>IP PBX systems lower call costs and unify voice across branches, while SIP IP phones deliver clear, feature-rich calling. Choose a PBX that scales from a few extensions to thousands.</p>
        <p>Order PBX systems and IP phones in Kenya from Tawa with fast, nationwide delivery.</p>
        HTML;
    }
}
