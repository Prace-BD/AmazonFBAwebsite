@extends('layouts.app')

@section('title', 'About Us - ' . \App\Models\SiteSetting::get('site_name', 'YL Legacy'))

@section('content')
<!-- About Hero -->
<section class="section-padding" style="background: radial-gradient(circle at top right, rgba(248, 137, 2, 0.08), transparent 60%), #ffffff;">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Institutional E-Commerce</div>
            <h2>About YL Legacy</h2>
            <p>Turnkey E-Commerce Operations & Dedicated Account Management</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; margin-bottom: 60px;">
            <div>
                <h3 style="font-size: 28px; font-weight: 800; color: var(--accent); line-height: 1.3; margin-bottom: 20px;">
                    When it comes to institutional marketplace management, <span style="color: var(--primary);">we lead the standard</span>.
                </h3>
                <p style="font-size: 15.5px; color: var(--text-muted); line-height: 1.8; margin-bottom: 20px;">
                    <strong>YL Legacy LLC</strong> is a premier e-commerce operations agency pairing investors and brand owners with dedicated, senior account managers to build, manage, and scale high-yielding digital assets across Amazon, Walmart, eBay, and Shopify.
                </p>
                <p style="font-size: 15px; color: var(--text-muted); line-height: 1.8; margin-bottom: 28px;">
                    With over a decade of industry expertise, our turnkey management model eliminates the daily friction of inventory planning, PPC bidding wars, Buy Box repricing, and marketplace compliance.
                </p>
                <div style="display: flex; gap: 14px;">
                    <a href="{{ route('consultation') }}" class="btn btn-primary">
                        <i class="fa-solid fa-user-shield"></i>
                        <span>Get Dedicated Manager</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="btn btn-outline">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
                    </a>
                </div>
            </div>
            <div style="background: var(--surface-alt); border: 1px solid var(--border-color); border-radius: var(--card-radius); padding: 36px; box-shadow: var(--shadow-md);">
                <h4 style="font-size: 20px; font-weight: 700; color: var(--accent); margin-bottom: 16px;">Our Core Mission</h4>
                <p style="font-size: 14.5px; color: var(--text-muted); line-height: 1.7; margin-bottom: 24px;">
                    Our mission is simple: <strong>Deliver institutional-grade e-commerce operations that scale client wealth on autopilot while maintaining 100% transparency, compliance, and asset ownership.</strong>
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div style="background: #ffffff; padding: 18px; border-radius: 10px; border: 1px solid var(--border-color);">
                        <h4 style="font-size: 26px; color: var(--primary); font-weight: 800;">10+</h4>
                        <p style="font-size: 13px; color: var(--text-dark); font-weight: 600;">Years E-Commerce Mastery</p>
                    </div>
                    <div style="background: #ffffff; padding: 18px; border-radius: 10px; border: 1px solid var(--border-color);">
                        <h4 style="font-size: 26px; color: var(--primary); font-weight: 800;">45+</h4>
                        <p style="font-size: 13px; color: var(--text-dark); font-weight: 600;">Dedicated Account Directors</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pillar Cards -->
        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-user-check"></i></div>
                <h3>Named Dedicated Manager</h3>
                <p>A single point of operational contact who knows your store catalog, margins, and strategy inside-out.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <h3>Transparent P&L Reporting</h3>
                <p>Weekly performance calls and monthly net-margin profit statements with zero hidden fees.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <h3>100% Client Asset Ownership</h3>
                <p>You retain full legal ownership of your seller accounts, trademark registrations, and direct merchant payouts.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner-section">
    <div class="container">
        <div class="cta-banner-content">
            <h2>Ready to Scale with YL Legacy?</h2>
            <p>Connect with our leadership team today to review your store potential and receive a customized growth roadmap.</p>
            <a href="{{ route('consultation') }}" class="btn btn-primary btn-lg">
                <span>Request Strategic Consultation</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection
