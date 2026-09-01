@extends('layouts.app')

@section('title', 'Privacy Policy - ' . \App\Models\SiteSetting::get('site_name', 'YL Legacy'))

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 860px;">
        <div class="section-header" style="text-align: left; margin-bottom: 30px;">
            <div class="badge badge-primary">Data Privacy & Security</div>
            <h2>Privacy Policy</h2>
            <p>Last updated: {{ date('F Y') }} • Entity: <strong>YL Legacy LLC</strong></p>
        </div>

        <div style="font-size: 15px; color: var(--text-muted); line-height: 1.8;">
            <p style="margin-bottom: 20px;">
                <strong>YL Legacy LLC</strong> ("we," "our," or "us") is dedicated to protecting your privacy. This Privacy Policy details how we collect, handle, and safeguard your personal information when you browse our site or use our dedicated account management services.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">1. Information We Collect</h3>
            <p style="margin-bottom: 20px;">
                We collect contact information (such as name, email address, phone number) provided via our consultation forms, as well as technical analytics data related to website interactions and IP addresses. We never collect payment card numbers through unencrypted contact forms.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">2. How Information is Used</h3>
            <p style="margin-bottom: 20px;">
                Information is utilized to provide tailored e-commerce proposals, assign dedicated account managers, facilitate mail forwarding alerts to senior directors, and improve site security and performance.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">3. Data Security & GDPR/CCPA Rights</h3>
            <p style="margin-bottom: 20px;">
                We enforce industry-standard security protocols and SSL encryption to protect your data. You may request data access, rectification, or deletion by contacting our privacy officer at <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}" style="color: var(--primary); font-weight: 600;">{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}</a>.
            </p>
        </div>
    </div>
</section>
@endsection
