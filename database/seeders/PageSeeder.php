<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->pages() as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }

    protected function pages(): array
    {
        return [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'type' => 'page',
                'meta_title' => 'About Tawa | Networking Equipment Supplier in Kenya',
                'meta_description' => 'Tawa is a networking equipment supplier in Kenya serving ISPs, installers and businesses with routers, switches, wireless and fibre optic equipment.',
                'description' => $this->about(),
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'type' => 'page',
                'meta_title' => 'Contact Tawa | Networking Equipment in Kenya',
                'meta_description' => 'Contact Tawa for networking equipment in Kenya. Reach us by phone, email or WhatsApp for product enquiries, quotes and bulk orders.',
                'description' => $this->contact(),
            ],
            [
                'title' => 'Delivery Information',
                'slug' => 'delivery-information',
                'type' => 'page',
                'meta_title' => 'Delivery Information | Tawa Networking Equipment Kenya',
                'meta_description' => 'Learn how Tawa delivers networking equipment across Kenya, including delivery times to Nairobi, Mombasa, Kisumu, Nakuru and other towns.',
                'description' => $this->delivery(),
            ],
            [
                'title' => 'Warranty',
                'slug' => 'warranty',
                'type' => 'page',
                'meta_title' => 'Warranty Policy | Tawa Networking Equipment Kenya',
                'meta_description' => 'Our warranty policy covers genuine networking equipment sold by Tawa. Learn about manufacturer warranties and how to make a claim.',
                'description' => $this->warranty(),
            ],
            [
                'title' => 'Returns & Refunds',
                'slug' => 'returns-refunds',
                'type' => 'page',
                'meta_title' => 'Returns & Refunds Policy | Tawa Networking Equipment Kenya',
                'meta_description' => 'Read the Tawa returns and refunds policy for networking equipment purchased in Kenya, including eligibility and how to request a return.',
                'description' => $this->returns(),
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'type' => 'page',
                'meta_title' => 'Privacy Policy | Tawa Networking Equipment Kenya',
                'meta_description' => 'Read how Tawa collects, uses and protects your personal information when you shop for networking equipment on our website.',
                'description' => $this->privacy(),
            ],
            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms-conditions',
                'type' => 'page',
                'meta_title' => 'Terms & Conditions | Tawa Networking Equipment Kenya',
                'meta_description' => 'Read the terms and conditions that apply when you purchase networking equipment from Tawa in Kenya.',
                'description' => $this->terms(),
            ],
            [
                'title' => 'Networking Equipment Suppliers in Kenya',
                'slug' => 'networking-equipment-suppliers-kenya',
                'type' => 'page',
                'meta_title' => 'Networking Equipment Suppliers in Kenya | Tawa',
                'meta_description' => 'Tawa is a trusted networking equipment supplier in Kenya for ISPs, installers and businesses. Shop MikroTik, Ubiquiti and TP-Link with nationwide delivery.',
                'description' => $this->suppliers(),
            ],
            [
                'title' => 'Networking Shop in Nairobi',
                'slug' => 'networking-shop-nairobi',
                'type' => 'page',
                'meta_title' => 'Networking Shop Nairobi | Routers, Switches & Fibre | Tawa',
                'meta_description' => 'Shop networking equipment in Nairobi from Tawa. Routers, switches, access points, fibre optic and CCTV equipment with same-day dispatch.',
                'description' => $this->nairobi(),
            ],
            [
                'title' => 'Best Networking Equipment for ISPs in Kenya',
                'slug' => 'best-networking-equipment-for-isps-kenya',
                'type' => 'post',
                'meta_title' => 'Best Networking Equipment for ISPs in Kenya | Tawa',
                'meta_description' => 'A practical guide to choosing routers, switches and CPE for internet service providers in Kenya, covering MikroTik, Ubiquiti and TP-Link.',
                'description' => $this->ispGuide(),
            ],
            [
                'title' => 'Cat5e vs Cat6 Cable: Which Should You Buy in Kenya?',
                'slug' => 'cat5e-vs-cat6-cable-kenya',
                'type' => 'post',
                'meta_title' => 'Cat5e vs Cat6 Cable: Which Should You Buy in Kenya? | Tawa',
                'meta_description' => 'Cat5e vs Cat6 Ethernet cable explained for Kenyan installers and offices, including speed, price and when to choose each cable.',
                'description' => $this->catGuide(),
            ],
        ];
    }

    protected function about(): string
    {
        return <<<HTML
        <p>Tawa is a networking equipment supplier based in Kenya, helping internet service providers, WISPs, CCTV installers, IT companies and businesses get the hardware they need to build and maintain reliable networks.</p>
        <p>We stock a focused range of networking products — routers, switches, wireless access points, outdoor CPE, fibre optic equipment, structured cabling and security systems — from manufacturers that Kenyan engineers trust, including MikroTik, Ubiquiti, TP-Link, D-Link, Huawei, V-SOL, Dahua and more.</p>
        <p>Our goal is simple: to make quality networking equipment accessible across Kenya at competitive prices, with honest advice and dependable delivery.</p>
        HTML;
    }

    protected function contact(): string
    {
        return <<<HTML
        <p>Need help choosing the right router, switch or wireless link? Contact the Tawa team and we'll help you find the right equipment for your project.</p>
        <ul>
        <li><strong>Phone:</strong> +254 743 720 551</li>
        <li><strong>Email:</strong> info@tawa.co.ke</li>
        <li><strong>Address:</strong> Kijabe Street, Nairobi</li>
        <li><strong>Hours:</strong> 9:00 - 18:00, Monday to Saturday</li>
        </ul>
        <p>For ISPs and installers placing bulk orders, reach out for project pricing and delivery timelines.</p>
        HTML;
    }

    protected function delivery(): string
    {
        return <<<HTML
        <p>We deliver networking equipment across Kenya. Most orders are dispatched within one to two business days once payment is confirmed.</p>
        <ul>
        <li><strong>Nairobi:</strong> same-day to 1 day</li>
        <li><strong>Mombasa, Kisumu, Nakuru and other major towns:</strong> 1–3 business days</li>
        <li><strong>Other regions:</strong> up to 5 business days</li>
        </ul>
        <p>Delivery costs depend on the size of your order and destination. We will confirm the exact cost and timeline when you place your order.</p>
        HTML;
    }

    protected function warranty(): string
    {
        return <<<HTML
        <p>All networking equipment sold by Tawa is genuine and, where applicable, covered by the manufacturer's warranty. The length and terms of the warranty vary by brand and product.</p>
        <p>If you experience a fault with an item within its warranty period, contact us with your order details and we will guide you through the warranty process, including repair or replacement where covered.</p>
        HTML;
    }

    protected function returns(): string
    {
        return <<<HTML
        <p>We want you to be satisfied with your purchase. If an item arrives damaged or faulty, contact us within 48 hours of delivery and we will arrange a return, repair or replacement where applicable.</p>
        <p>Please note that items must be returned in their original condition and packaging. Custom-configured or specially ordered items may not be eligible for return.</p>
        HTML;
    }

    protected function privacy(): string
    {
        return <<<HTML
        <p>We respect your privacy. Tawa collects only the information needed to process your orders and improve your shopping experience, such as your name, contact details and delivery address.</p>
        <p>We do not sell or share your personal information with third parties, except where required to fulfil your order or comply with the law.</p>
        HTML;
    }

    protected function terms(): string
    {
        return <<<HTML
        <p>By placing an order with Tawa, you agree to these terms. Prices are quoted in Kenya Shillings and may change without notice. Product availability is subject to stock on hand.</p>
        <p>Payment is required before dispatch unless otherwise agreed. We accept M-Pesa and other agreed payment methods. Please review the delivery and returns policies before ordering.</p>
        HTML;
    }

    protected function suppliers(): string
    {
        return <<<HTML
        <h2>Networking Equipment Suppliers in Kenya</h2>
        <p>Finding a reliable networking equipment supplier in Kenya matters, whether you are an ISP building out a wireless network, an installer wiring a new office, or a business upgrading its security. Tawa supplies the networking hardware Kenyan professionals depend on — routers, switches, wireless access points, outdoor CPE, fibre optic equipment and structured cabling — from brands such as MikroTik, Ubiquiti, TP-Link, D-Link and Huawei.</p>
        <h3>What to look for in a networking supplier</h3>
        <ul>
        <li><strong>Genuine products</strong> — always buy authentic equipment from trusted brands.</li>
        <li><strong>Fair pricing</strong> — competitive rates with no hidden costs.</li>
        <li><strong>Availability</strong> — a supplier that keeps popular models in stock.</li>
        <li><strong>Support</strong> — help choosing the right hardware for your project.</li>
        </ul>
        <p>Browse our catalogue or contact us for a quote on bulk and project orders. We deliver networking equipment across Kenya.</p>
        HTML;
    }

    protected function nairobi(): string
    {
        return <<<HTML
        <h2>Networking Shop in Nairobi</h2>
        <p>If you are looking for a networking shop in Nairobi, Tawa supplies routers, network switches, wireless access points, outdoor CPE, fibre optic equipment, Ethernet cable, network cabinets and CCTV systems for same-day or next-day dispatch within Nairobi.</p>
        <p>From a single MikroTik router for a small office to a full set of Ubiquiti CPE and PoE switches for an ISP rollout, we can help you get the right equipment quickly. Order online and we'll confirm delivery to your Nairobi location.</p>
        <p>For bulk and project enquiries, contact us on +254 743 720 551 or email info@tawa.co.ke.</p>
        HTML;
    }

    protected function ispGuide(): string
    {
        return <<<HTML
        <p>Building a network for an internet service provider in Kenya means choosing equipment that is reliable, scalable and cost-effective. Here is a practical overview of the key components to consider.</p>
        <h3>Core routers</h3>
        <p>For ISP core routing, the MikroTik CCR series (such as the CCR2004) offers high throughput with multiple 10G SFP+ ports at a fraction of the cost of traditional carrier routers.</p>
        <h3>Distribution and access switches</h3>
        <p>Managed PoE switches power access points and customer CPE while providing VLAN segmentation for different subscribers. Look for Gigabit PoE models with enough budget for your edge devices.</p>
        <h3>Wireless CPE and base stations</h3>
        <p>Ubiquiti airMAX CPE (LiteBeam, NanoStation, NanoBeam) and MikroTik SXT/BaseBox devices are widely used for point-to-point and point-to-multipoint links in Kenya.</p>
        <p>Need help planning your network? Contact Tawa and we'll help you choose the right equipment.</p>
        HTML;
    }

    protected function catGuide(): string
    {
        return <<<HTML
        <p>Choosing between Cat5e and Cat6 Ethernet cable is one of the most common decisions when wiring an office or home in Kenya. Both support Gigabit Ethernet, but there are important differences.</p>
        <h3>Cat5e cable</h3>
        <p>Cat5e supports speeds up to 1 Gbps over 100 metres and is the budget-friendly option for most basic installations.</p>
        <h3>Cat6 cable</h3>
        <p>Cat6 supports 10 Gbps over shorter distances (up to 55 metres) and has better shielding against crosstalk, making it the better choice for new installations and multi-gigabit networks.</p>
        <h3>Which should you buy?</h3>
        <p>If you are wiring a new building, Cat6 is the safer long-term investment. If you are extending an existing Cat5e network or working on a tight budget, Cat5e remains perfectly adequate for 1 Gbps.</p>
        <p>Shop Cat6 and Cat5e cable in Kenya from Tawa with nationwide delivery.</p>
        HTML;
    }
}
