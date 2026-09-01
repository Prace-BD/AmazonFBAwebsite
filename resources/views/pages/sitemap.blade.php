@extends('layouts.app')

@section('title', 'Sitemap - ' . \App\Models\SiteSetting::get('site_name', 'YL Legacy'))

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 960px;">
        <div class="section-header" style="text-align: left; margin-bottom: 30px;">
            <div class="badge badge-primary">Structured Sitemap</div>
            <h2>Website Sitemap</h2>
            <p>Overview of all public routes, services, and compliance resources on YL Legacy.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 36px;">
            <div style="background: var(--surface-alt); padding: 28px; border-radius: var(--card-radius); border: 1px solid var(--border-color);">
                <h3 style="font-size: 18px; color: var(--accent); margin-bottom: 16px; font-weight: 700;">Company Pages</h3>
                <ul class="footer-links" style="font-size: 14.5px;">
                    <li style="margin-bottom: 12px;"><a href="{{ route('home') }}" style="color: var(--text-dark); font-weight: 500;">Homepage</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('pages.index') }}" style="color: var(--text-dark); font-weight: 500;">Page List Directory</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('about') }}" style="color: var(--text-dark); font-weight: 500;">About Us</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('contact') }}" style="color: var(--text-dark); font-weight: 500;">Contact Us</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('consultation') }}" style="color: var(--text-dark); font-weight: 500;">Free Strategy Proposal</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('blog.index') }}" style="color: var(--text-dark); font-weight: 500;">Blog & Insights</a></li>
                </ul>
            </div>

            <div style="background: var(--surface-alt); padding: 28px; border-radius: var(--card-radius); border: 1px solid var(--border-color);">
                <h3 style="font-size: 18px; color: var(--accent); margin-bottom: 16px; font-weight: 700;">Services Pages</h3>
                <ul class="footer-links" style="font-size: 14.5px;">
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.amazon-book') }}" style="color: var(--text-dark); font-weight: 500;">Amazon FBA Management</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.tiktok') }}" style="color: var(--text-dark); font-weight: 500;">TikTok Shop Automation</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.walmart') }}" style="color: var(--text-dark); font-weight: 500;">Walmart Marketplace WFS</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.shopify') }}" style="color: var(--text-dark); font-weight: 500;">Shopify DTC Scaling</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.ebay') }}" style="color: var(--text-dark); font-weight: 500;">eBay Store Operations</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('services.noon') }}" style="color: var(--text-dark); font-weight: 500;">Multi-Channel Expansion</a></li>
                </ul>
            </div>

            <div style="background: var(--surface-alt); padding: 28px; border-radius: var(--card-radius); border: 1px solid var(--border-color);">
                <h3 style="font-size: 18px; color: var(--accent); margin-bottom: 16px; font-weight: 700;">Compliance & Policies</h3>
                <ul class="footer-links" style="font-size: 14.5px;">
                    <li style="margin-bottom: 12px;"><a href="{{ route('terms') }}" style="color: var(--text-dark); font-weight: 500;">Terms & Conditions</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('privacy') }}" style="color: var(--text-dark); font-weight: 500;">Privacy Policy</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('refund-policy') }}" style="color: var(--text-dark); font-weight: 500;">Refund & Cancellation Policy</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('fulfillment-policy') }}" style="color: var(--text-dark); font-weight: 500;">Fulfillment & Delivery Policy</a></li>
                    <li style="margin-bottom: 12px;"><a href="{{ route('sitemap') }}" style="color: var(--text-dark); font-weight: 500;">HTML Sitemap</a></li>
                    @auth
                        <li style="margin-bottom: 12px;"><a href="{{ route('admin.theme-control') }}" style="color: var(--primary); font-weight: 700;">Unified Theme Center</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
