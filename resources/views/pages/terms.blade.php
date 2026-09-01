@extends('layouts.app')

@section('title', 'Terms and Conditions - ' . \App\Models\SiteSetting::get('site_name', 'OYL Legacy'))

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 860px;">
        <div class="section-header" style="text-align: left; margin-bottom: 30px;">
            <div class="badge badge-primary">Legal Terms & SLA</div>
            <h2>Terms and Conditions</h2>
            <p>Last updated: {{ date('F Y') }} • Legal Entity: <strong>OYL Legacy LLC</strong></p>
        </div>

        <div style="font-size: 15px; color: var(--text-muted); line-height: 1.8;">
            <p style="margin-bottom: 20px;">
                Welcome to <strong>OYL Legacy LLC</strong> ("Company," "we," "our," or "us"). These Terms and Conditions govern your access to our website, dedicated account management services, e-commerce consulting agreements, and digital turnkey store solutions.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">1. Dedicated Management & Scope</h3>
            <p style="margin-bottom: 20px;">
                OYL Legacy provides dedicated operational management, listing architecture, advertising optimization, and fulfillment coordination across Amazon, Walmart, eBay, TikTok Shop, and Shopify. The client retains 100% legal ownership of their merchant accounts, trademarks, and payout accounts.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">2. Payment Terms & Currencies</h3>
            <p style="margin-bottom: 20px;">
                All service fees are denominated and billed in <strong>US Dollars ($ USD)</strong>. Invoices and recurring milestone retainers must be settled through authorized merchant payment methods.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">3. Governing Law & Jurisdiction</h3>
            <p style="margin-bottom: 20px;">
                These Terms and Conditions and any separate agreements shall be governed by and construed in accordance with the laws of the <strong>State of Delaware, United States</strong>, without regard to conflict of law principles.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">4. Contact & Legal Notices</h3>
            <p style="margin-bottom: 20px;">
                Legal notices may be submitted to <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}" style="color: var(--primary); font-weight: 600;">{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}</a> or mailed to:
            </p>
            <div style="background: var(--surface-alt); padding: 18px; border-radius: 8px; border: 1px solid var(--border-color);">
                <strong>OYL Legacy LLC • Legal Department</strong><br>
                {{ \App\Models\SiteSetting::get('contact_address', '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA') }}
            </div>
        </div>
    </div>
</section>
@endsection
