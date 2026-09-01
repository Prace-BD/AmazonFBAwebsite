<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiteSetting;
use App\Models\Package;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with OYL Legacy compliant data.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@oyllegacy.com'],
            [
                'name' => 'OYL Legacy Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Global Site & Theme Settings (Unified Theme Control Center)
        $settings = [
            // Branding & Identity
            ['key' => 'site_name', 'value' => 'OYL Legacy', 'group' => 'branding', 'type' => 'text', 'label' => 'Site Name'],
            ['key' => 'site_tagline', 'value' => 'Turnkey E-Commerce Operations & Dedicated Account Management', 'group' => 'branding', 'type' => 'text', 'label' => 'Tagline'],
            ['key' => 'site_logo_text', 'value' => 'OYL Legacy', 'group' => 'branding', 'type' => 'text', 'label' => 'Logo Text'],
            ['key' => 'site_logo_url', 'value' => '', 'group' => 'branding', 'type' => 'text', 'label' => 'Custom Logo Image URL'],
            ['key' => 'site_favicon_url', 'value' => '', 'group' => 'branding', 'type' => 'text', 'label' => 'Favicon URL'],
            
            // Unified Theming & Colors
            ['key' => 'theme_primary_color', 'value' => '#f88902', 'group' => 'theme', 'type' => 'color', 'label' => 'Primary Brand Color (Orange)'],
            ['key' => 'theme_primary_hover', 'value' => '#e07800', 'group' => 'theme', 'type' => 'color', 'label' => 'Primary Hover Color'],
            ['key' => 'theme_accent_color', 'value' => '#0f172a', 'group' => 'theme', 'type' => 'color', 'label' => 'Accent Dark Color'],
            ['key' => 'theme_secondary_color', 'value' => '#ff9900', 'group' => 'theme', 'type' => 'color', 'label' => 'Secondary Glow Color'],
            ['key' => 'theme_header_bg', 'value' => '#ffffff', 'group' => 'theme', 'type' => 'color', 'label' => 'Navbar Background'],
            ['key' => 'theme_topbar_bg', 'value' => '#f8fafc', 'group' => 'theme', 'type' => 'color', 'label' => 'Topbar Background'],
            ['key' => 'theme_footer_bg', 'value' => '#0b1120', 'group' => 'theme', 'type' => 'color', 'label' => 'Footer Background'],
            ['key' => 'theme_font_family', 'value' => "'Poppins', sans-serif", 'group' => 'theme', 'type' => 'text', 'label' => 'Main Font Family'],
            ['key' => 'theme_card_radius', 'value' => '14px', 'group' => 'theme', 'type' => 'text', 'label' => 'Card Border Radius'],
            
            // Contact & Hotline
            ['key' => 'contact_phone', 'value' => '+1 (888) 695-0199', 'group' => 'contact', 'type' => 'text', 'label' => 'Phone Hotline'],
            ['key' => 'contact_phone_raw', 'value' => '18886950199', 'group' => 'contact', 'type' => 'text', 'label' => 'Phone Dial Number'],
            ['key' => 'contact_email', 'value' => 'support@oyllegacy.com', 'group' => 'contact', 'type' => 'text', 'label' => 'Contact Email'],
            ['key' => 'contact_whatsapp', 'value' => '+18886950199', 'group' => 'contact', 'type' => 'text', 'label' => 'WhatsApp Number'],
            ['key' => 'contact_address', 'value' => '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA', 'group' => 'contact', 'type' => 'text', 'label' => 'Office Address'],
            ['key' => 'contact_hours', 'value' => 'Monday - Friday: 8:00 AM - 8:00 PM EST (24/7 Monitoring)', 'group' => 'contact', 'type' => 'text', 'label' => 'Working Hours'],
            
            // Currency & Package Pricing Control
            ['key' => 'currency_symbol', 'value' => '$', 'group' => 'pricing', 'type' => 'text', 'label' => 'Currency Symbol'],
            ['key' => 'currency_code', 'value' => 'USD', 'group' => 'pricing', 'type' => 'text', 'label' => 'Currency Code (USD)'],
            ['key' => 'pricing_disclaimer', 'value' => 'All package fees displayed in US Dollars (USD). Custom enterprise agreements and milestone billing available.', 'group' => 'pricing', 'type' => 'text', 'label' => 'Pricing Note'],
            
            // Header & Navigation
            ['key' => 'topbar_announcement', 'value' => '⚡ Institutional E-Commerce Management & Dedicated Account Directors', 'group' => 'header', 'type' => 'text', 'label' => 'Topbar Banner Message'],
            ['key' => 'header_cta_text', 'value' => 'Get Dedicated Manager', 'group' => 'header', 'type' => 'text', 'label' => 'Header CTA Button Text'],
            ['key' => 'header_cta_link', 'value' => '/free-consultation', 'group' => 'header', 'type' => 'text', 'label' => 'Header CTA Link'],
            
            // Mail Forwarding System
            ['key' => 'mail_forwarding_enabled', 'value' => '1', 'group' => 'mail', 'type' => 'boolean', 'label' => 'Enable Mail Forwarding'],
            ['key' => 'mail_forward_to_email', 'value' => 'support@oyllegacy.com, team@oyllegacy.com', 'group' => 'mail', 'type' => 'text', 'label' => 'Forward Inquiries To (Email Address)'],
            ['key' => 'mail_auto_reply_enabled', 'value' => '1', 'group' => 'mail', 'type' => 'boolean', 'label' => 'Send Auto-Reply Confirmation to Customer'],
            ['key' => 'mail_subject_template', 'value' => 'New OYL Legacy Client Inquiry: [service] - [name]', 'group' => 'mail', 'type' => 'text', 'label' => 'Forwarded Email Subject Template'],
            
            // Footer & Socials
            ['key' => 'footer_about_text', 'value' => 'OYL Legacy is a premier turnkey e-commerce operations and dedicated account management agency. We provide end-to-end store scaling across Amazon FBA, Walmart WFS, eBay, TikTok Shop, and Shopify DTC brands.', 'group' => 'footer', 'type' => 'textarea', 'label' => 'Footer About Text'],
            ['key' => 'footer_copyright', 'value' => '© ' . date('Y') . ' OYL Legacy LLC. All rights reserved.', 'group' => 'footer', 'type' => 'text', 'label' => 'Copyright Text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com', 'group' => 'social', 'type' => 'text', 'label' => 'Facebook URL'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com', 'group' => 'social', 'type' => 'text', 'label' => 'Instagram URL'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com', 'group' => 'social', 'type' => 'text', 'label' => 'LinkedIn URL'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com', 'group' => 'social', 'type' => 'text', 'label' => 'X / Twitter URL'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com', 'group' => 'social', 'type' => 'text', 'label' => 'TikTok URL'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // 3. E-Commerce Packages (In USD Currency with clear deliverables)
        $packages = [
            [
                'name' => 'Amazon Launch & Manage',
                'platform' => 'amazon',
                'subtitle' => 'Turnkey account launch with dedicated specialist oversight and algorithmic optimization.',
                'price_usd' => 699.00,
                'original_price_usd' => 1165.00,
                'discount_badge' => 'Save 40%!',
                'features' => [
                    'Assigned Dedicated Account Specialist',
                    'Complete Seller Central Setup & Optimization',
                    'Up To 40 Optimized Product Listings (SEO & A+ Content)',
                    'PPC Ad Campaign Architecture & Bid Management',
                    'Monthly Detailed P&L and Sales Insights',
                    '24/7 Account Health & Policy Monitoring',
                    'Direct Email & Ticket Support (24h SLA)'
                ],
                'is_popular' => false,
                'badge_text' => 'STARTER SCALE',
                'cta_text' => 'Launch My Amazon Store',
                'order' => 1,
            ],
            [
                'name' => 'Amazon Dedicated Pro',
                'platform' => 'amazon',
                'subtitle' => 'Full-service management with a Senior Dedicated Account Manager and weekly strategy reviews.',
                'price_usd' => 999.00,
                'original_price_usd' => 1665.00,
                'discount_badge' => 'Save 40%!',
                'features' => [
                    'Senior Dedicated Account Manager (Named Individual)',
                    'Weekly 1-on-1 Strategy & Performance Calls',
                    'Manage Up To 100 Winning Product Listings',
                    'High-ROI Sponsored Products, Brands & Video Ads',
                    'Automated Buy Box Repricing & Stock Replenishment',
                    'Verified Supplier Database & Sourcing Assistance',
                    'A/B Listing Experimentation & Conversion Audits',
                    'Direct Phone & WhatsApp Support Channel'
                ],
                'is_popular' => true,
                'badge_text' => 'MOST POPULAR 🔥',
                'cta_text' => 'Get Dedicated Manager',
                'order' => 2,
            ],
            [
                'name' => 'Enterprise Multi-Store',
                'platform' => 'amazon',
                'subtitle' => 'Institutional 7-figure scaling solution with a Dedicated Growth Team and multi-channel expansion.',
                'price_usd' => 1399.00,
                'original_price_usd' => 2330.00,
                'discount_badge' => 'Save 40%!',
                'features' => [
                    'Dedicated Account Director & 3-Person Specialist Team',
                    'Unlimited Product Cataloging & Multi-Marketplace Sync',
                    'Real-Time Live Financial Dashboard & Daily P&L',
                    'Global Supply Chain & 3PL Logistics Management',
                    'Custom DSP & Multi-Channel Video Ad Campaigns',
                    'Brand Protection, Hijacker Removal & Trademark Defense',
                    'Priority 1-Hour SLA Emergency Escalation',
                    'Quarterly Executive Business Reviews (QBRs)'
                ],
                'is_popular' => false,
                'badge_text' => 'ENTERPRISE SUITE',
                'cta_text' => 'Partner With OYL Legacy',
                'order' => 3,
            ],
            [
                'name' => 'Walmart Marketplace WFS',
                'platform' => 'walmart',
                'subtitle' => 'Turnkey Walmart Marketplace onboarding, WFS inventory pipelines, and automated fulfillment.',
                'price_usd' => 1199.00,
                'original_price_usd' => 1999.00,
                'discount_badge' => 'Save 40%!',
                'features' => [
                    'Assigned Walmart Account Specialist',
                    'Corporate Seller Application & Verification',
                    'WFS (Walmart Fulfillment Services) Inbound Coordination',
                    'High-Velocity Product Listing & Buy Box Repricing',
                    'Walmart Sponsored Products Advertising Setup',
                    'Bi-Weekly Financial Statements & Margin Tracking'
                ],
                'is_popular' => false,
                'badge_text' => 'WALMART VERIFIED',
                'cta_text' => 'Start Walmart Management',
                'order' => 4,
            ],
            [
                'name' => 'eBay Multi-Account Pro',
                'platform' => 'ebay',
                'subtitle' => 'Scale high-volume automated eBay stores with supplier integration and 24/7 buyer support.',
                'price_usd' => 899.00,
                'original_price_usd' => 1499.00,
                'discount_badge' => 'Save 40%!',
                'features' => [
                    'Dedicated eBay Channel Manager',
                    'Multi-Tier Seller Account Setup & Verification',
                    '1,000+ Automated Product Listings with High-Ranking SEO',
                    'Supplier API Sync & Automated Order Routing',
                    'Top Rated Seller Status Maintenance & Dispute Handling',
                    'Round-the-Clock Buyer Inquiry Support'
                ],
                'is_popular' => false,
                'badge_text' => 'TOP RATED SELLER',
                'cta_text' => 'Start eBay Management',
                'order' => 5,
            ]
        ];

        foreach ($packages as $pkg) {
            Package::updateOrCreate(
                ['name' => $pkg['name'], 'platform' => $pkg['platform']],
                $pkg
            );
        }

        // 4. Real Blog Articles (OYL Legacy Branding)
        $blogs = [
            [
                'title' => 'Why Having a Dedicated Account Manager Multiplies E-Commerce Valuation',
                'slug' => 'why-dedicated-account-manager-multiplies-ecommerce-valuation',
                'category' => 'Account Management',
                'read_time' => '5 min read',
                'excerpt' => 'Discover how a dedicated account director optimizes Buy Box share, eliminates stockouts, and scales marketplace revenue sustainably.',
                'content' => '<p>Managing an Amazon or multi-channel store requires rapid adaptation to algorithm shifts, compliance audits, PPC bidding wars, and inventory lead times. When brand owners assign a named Dedicated Account Manager, operations shift from reactive troubleshooting to proactive institutional growth.</p><h3>The Power of Single-Point Ownership</h3><p>At OYL Legacy, every client is paired with an experienced Dedicated Account Manager who oversees daily operations, PPC architecture, and inventory forecasting. This structure ensures clear accountability, weekly strategic milestones, and rapid issue resolution.</p><ul><li>Consistent Buy Box retention above 92% through algorithmic repricing.</li><li>Reduction in ACoS through negative keyword harvesting and dayparting.</li><li>Weekly executive reporting with clear gross-to-net margin visibility.</li></ul>',
                'author_name' => 'OYL Legacy Strategy Team',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'The ROI of Institutional Amazon & Multi-Channel Consulting',
                'slug' => 'roi-of-institutional-amazon-multichannel-consulting',
                'category' => 'E-Commerce Growth',
                'read_time' => '6 min read',
                'excerpt' => 'A comprehensive breakdown of cost vs. return when partnering with a full-service turnkey e-commerce agency.',
                'content' => '<p>Building an internal team with PPC managers, listing copywriters, graphic designers, and supply chain coordinators often exceeds $180,000 annually. Partnering with a turnkey agency like OYL Legacy provides immediate access to seasoned specialists at a fraction of the overhead.</p>',
                'author_name' => 'FBA Operations Director',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'How to Scale Walmart Marketplace Alongside Amazon FBA',
                'slug' => 'how-to-scale-walmart-marketplace-alongside-amazon-fba',
                'category' => 'Multi-Channel',
                'read_time' => '7 min read',
                'excerpt' => 'Learn how multi-channel sellers capture incremental US retail market share using Walmart Fulfillment Services (WFS).',
                'content' => '<p>Walmart is expanding its e-commerce market share rapidly. By leveraging existing Amazon inventory pipelines and listing catalog assets on Walmart Marketplace, brands unlock 25% to 40% additional monthly revenue with low customer acquisition costs.</p>',
                'author_name' => 'Marketplace Growth Lead',
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => '7 Principles of E-Commerce Compliance & Payment Processor Approval',
                'slug' => '7-principles-of-ecommerce-compliance-and-payment-processor-approval',
                'category' => 'Compliance',
                'read_time' => '8 min read',
                'excerpt' => 'Essential guidelines for preparing digital storefronts for seamless bank, payment processor, and marketplace underwriting.',
                'content' => '<p>Transparent pricing in US Dollars, clear refund policies, verifiable contact details, and secure checkout architecture are fundamental requirements for passing payment gateway and merchant underwriting reviews.</p>',
                'author_name' => 'Compliance Operations Desk',
                'is_published' => true,
                'published_at' => now()->subDays(25),
            ]
        ];

        foreach ($blogs as $b) {
            BlogPost::updateOrCreate(['slug' => $b['slug']], $b);
        }
    }
}
