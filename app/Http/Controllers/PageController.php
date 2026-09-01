<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Package;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Homepage
     */
    public function home()
    {
        $packages = Package::active()->get();
        $blogs = BlogPost::published()->take(3)->get();
        return view('pages.home', compact('packages', 'blogs'));
    }

    /**
     * Page List Directory / Visual Sitemap
     */
    public function pageList()
    {
        $pages = [
            ['title' => 'Homepage', 'route' => 'home', 'url' => route('home'), 'badge' => 'Main Entry', 'desc' => 'Primary landing page with dedicated account manager hero, platform overview, USD pricing, process, and FAQs.'],
            ['title' => 'Page List Directory', 'route' => 'pages.index', 'url' => route('pages.index'), 'badge' => 'Navigation', 'desc' => 'Interactive visual map of all YL Legacy templates, services, and legal compliance policies.'],
            ['title' => 'About Us', 'route' => 'about', 'url' => route('about'), 'badge' => 'Company', 'desc' => 'Company background, dedicated account management philosophy, institutional framework, and team.'],
            ['title' => 'Amazon FBA & Account Management', 'route' => 'services.amazon-book', 'url' => route('services.amazon-book'), 'badge' => 'Service', 'desc' => 'Turnkey Amazon FBA store setup, Buy Box repricing, PPC advertising, and dedicated manager oversight.'],
            ['title' => 'TikTok Shop Automation', 'route' => 'services.tiktok', 'url' => route('services.tiktok'), 'badge' => 'Service', 'desc' => 'Viral product sourcing, creator affiliate network management, and 24-48h automated fulfillment.'],
            ['title' => 'Walmart Marketplace WFS', 'route' => 'services.walmart', 'url' => route('services.walmart'), 'badge' => 'Service', 'desc' => 'Walmart marketplace store approval, WFS fulfillment setup, dropshipping, and price optimization.'],
            ['title' => 'Shopify DTC Brand Growth', 'route' => 'services.shopify', 'url' => route('services.shopify'), 'badge' => 'Service', 'desc' => 'Custom high-converting Shopify storefront, automated supplier integration, and multi-channel ad funnels.'],
            ['title' => 'eBay Multi-Account Automation', 'route' => 'services.ebay', 'url' => route('services.ebay'), 'badge' => 'Service', 'desc' => 'Done-for-you eBay store setup, multi-account scaling, 1,000+ optimized listings, and 24/7 buyer support.'],
            ['title' => 'Multi-Channel Marketplace Scaling', 'route' => 'services.noon', 'url' => route('services.noon'), 'badge' => 'Service', 'desc' => 'Expansion across global regional marketplaces with cataloging, warehouse logistics, and sales acceleration.'],
            ['title' => 'Contact Us', 'route' => 'contact', 'url' => route('contact'), 'badge' => 'Support', 'desc' => 'Dedicated hotline, business email, physical office address, and real-time mail forwarding lead form.'],
            ['title' => 'Free Strategy Consultation', 'route' => 'consultation', 'url' => route('consultation'), 'badge' => 'Lead Gen', 'desc' => 'Interactive quote calculator and customized e-commerce scaling roadmap request form.'],
            ['title' => 'Blog & Advice Archive', 'route' => 'blog.index', 'url' => route('blog.index'), 'badge' => 'Content', 'desc' => 'E-commerce operational advice, dedicated account manager ROI, and compliance readiness guides.'],
            ['title' => 'Refund, Return & Cancellation Policy', 'route' => 'refund-policy', 'url' => route('refund-policy'), 'badge' => 'Compliance', 'desc' => 'Underwriting-compliant 30-day onboarding window, cancellation process, and refund timelines.'],
            ['title' => 'Service Delivery & Fulfillment Policy', 'route' => 'fulfillment-policy', 'url' => route('fulfillment-policy'), 'badge' => 'Compliance', 'desc' => 'Digital service delivery roadmap, project milestones, and turnaround schedules.'],
            ['title' => 'Terms and Conditions', 'route' => 'terms', 'url' => route('terms'), 'badge' => 'Legal', 'desc' => 'YL Legacy LLC entity identification, service level agreements, and governing law.'],
            ['title' => 'Privacy Policy', 'route' => 'privacy', 'url' => route('privacy'), 'badge' => 'Legal', 'desc' => 'Data privacy standards, consumer rights, cookie disclosures, and GDPR/CCPA compliance.'],
            ['title' => 'HTML Sitemap', 'route' => 'sitemap', 'url' => route('sitemap'), 'badge' => 'SEO', 'desc' => 'Full structured URL sitemap of all public routes.'],
        ];

        if (Auth::check()) {
            $pages[] = [
                'title' => 'Unified Theme Control Center',
                'route' => 'admin.theme-control',
                'url' => route('admin.theme-control'),
                'badge' => 'Admin Only',
                'desc' => 'Real-time dashboard to control site colors, hotline, USD package prices, forwarding emails, and lead inbox.'
            ];
        }

        return view('pages.page_list', compact('pages'));
    }

    /**
     * About Us
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Amazon FBA & Account Management Service
     */
    public function amazonBook()
    {
        $packages = Package::forPlatform('amazon')->get();
        return view('pages.services.amazon_book', compact('packages'));
    }

    /**
     * TikTok Shop Automation
     */
    public function tiktok()
    {
        $packages = Package::active()->get();
        return view('pages.services.tiktok', compact('packages'));
    }

    /**
     * Walmart Automation
     */
    public function walmart()
    {
        $packages = Package::forPlatform('walmart')->get();
        if ($packages->isEmpty()) {
            $packages = Package::active()->take(3)->get();
        }
        return view('pages.services.walmart', compact('packages'));
    }

    /**
     * Shopify Automation
     */
    public function shopify()
    {
        $packages = Package::active()->get();
        return view('pages.services.shopify', compact('packages'));
    }

    /**
     * eBay Automation
     */
    public function ebay()
    {
        $packages = Package::forPlatform('ebay')->get();
        if ($packages->isEmpty()) {
            $packages = Package::active()->take(3)->get();
        }
        return view('pages.services.ebay', compact('packages'));
    }

    /**
     * Multi-Channel Marketplace Scaling
     */
    public function noon()
    {
        $packages = Package::active()->get();
        return view('pages.services.noon', compact('packages'));
    }

    /**
     * Contact Us Page
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Free Consultation / Get Quote Page
     */
    public function consultation()
    {
        return view('pages.consultation');
    }

    /**
     * Terms and Conditions
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Privacy Policy
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Refund, Return & Cancellation Policy
     */
    public function refundPolicy()
    {
        return view('pages.refund_policy');
    }

    /**
     * Service Delivery & Fulfillment Policy
     */
    public function fulfillmentPolicy()
    {
        return view('pages.fulfillment_policy');
    }

    /**
     * Sitemap
     */
    public function sitemap()
    {
        return view('pages.sitemap');
    }

    /**
     * Blog Index
     */
    public function blogIndex()
    {
        $blogs = BlogPost::published()->paginate(9);
        return view('pages.blog.index', compact('blogs'));
    }

    /**
     * Single Blog Post
     */
    public function blogShow($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $recentPosts = BlogPost::where('id', '!=', $post->id)->published()->take(4)->get();
        return view('pages.blog.show', compact('post', 'recentPosts'));
    }
}
