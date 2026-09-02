<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            'site_name' => 'Tawa',
            'theme' => 'lucare',
            'hero_header_title' => 'Networking Equipment in Kenya',
            'hero_header_description' => 'Shop networking equipment in Kenya from Tawa, including MikroTik routers, Ubiquiti access points, TP-Link devices, switches, fibre optic equipment, network cabinets and structured cabling.',
            'hero_image' => '',
            'logo' => '',
            'favicon' => '',
            'products_section_title' => 'Featured Networking Equipment',
            'why_choose_title' => 'Why Buy Networking Equipment from Tawa',
            'why_choose_description' => 'Tawa is a networking equipment specialist for the Kenyan market, supplying ISPs, installers and businesses with routers, switches, access points, fibre optic and CCTV equipment from leading brands at competitive prices with nationwide delivery.',
            'contact_phone' => '+254 743 720 551',
            'contact_email' => 'info@tawa.co.ke',
            'address' => 'Kijabe Street, Nairobi',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://twitter.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'currency_sign' => 'KSh',
            'chat' => $this->whatsappWidget(),
            'homepage_description' => $this->homepageDescription(),
        ];

        foreach ($options as $key => $value) {
            Option::updateOrCreate(
                ['option_key' => $key],
                ['option_value' => $value]
            );
        }
    }

    protected function homepageDescription(): string
    {
        return <<<HTML
        <h2>Networking Equipment in Kenya</h2>
        <p>Tawa is a specialist supplier of networking equipment in Kenya, serving internet service providers, WISPs, CCTV installers, IT companies and businesses across the country. We stock a focused range of routers, switches, wireless access points, outdoor CPE, fibre optic equipment, structured cabling and security products from the brands installers trust most.</p>
        <h3>What we supply</h3>
        <ul>
        <li><strong>Routers</strong> — MikroTik, TP-Link and Tenda routers for homes, offices and ISP networks.</li>
        <li><strong>Wireless</strong> — Ubiquiti and TP-Link outdoor CPE, access points and point-to-point antennas.</li>
        <li><strong>Switches</strong> — managed, unmanaged and PoE switches from MikroTik, TP-Link and D-Link.</li>
        <li><strong>Fibre optic</strong> — cables, PLC splitters, enclosures, fast connectors and patch cords.</li>
        <li><strong>Structured cabling</strong> — Ethernet cable, network cabinets, media converters and PoE injectors.</li>
        <li><strong>Security</strong> — CCTV cameras and access control systems.</li>
        </ul>
        <h3>Trusted brands</h3>
        <p>We partner with leading manufacturers including MikroTik, Ubiquiti, TP-Link, Tenda, D-Link, Huawei, V-SOL, Dahua, Netlink, Panasonic and ZKTeco so you get genuine equipment backed by our support.</p>
        <h3>Delivery across Kenya</h3>
        <p>Order networking equipment online from Tawa and we deliver in Nairobi and across Kenya. For ISPs and installers placing bulk orders, contact us for competitive project pricing.</p>
        HTML;
    }

    protected function whatsappWidget(): string
    {
        return <<<HTML
        <a href="https://wa.me/254743720551" target="_blank" rel="noopener" class="whatsapp-float" aria-label="Chat with us on WhatsApp">
          <i class="fab fa-whatsapp"></i>
        </a>
        HTML;
    }
}
