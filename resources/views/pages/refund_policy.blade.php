@extends('layouts.app')

@section('title', 'Refund, Return & Cancellation Policy - ' . \App\Models\SiteSetting::get('site_name', 'OYL Legacy'))

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 860px;">
        <div class="section-header" style="text-align: left; margin-bottom: 30px;">
            <div class="badge badge-primary">Compliance & Consumer Protection</div>
            <h2>Refund, Return & Cancellation Policy</h2>
            <p>Last updated: {{ date('F Y') }} • Governing Entity: <strong>OYL Legacy LLC</strong></p>
        </div>

        <div style="font-size: 15px; color: var(--text-muted); line-height: 1.8;">
            <p style="margin-bottom: 20px;">
                At <strong>OYL Legacy LLC</strong> ("we," "us," or "our"), customer satisfaction, transparency, and high-standard service delivery are foundational. This Refund, Return & Cancellation Policy explains your rights and procedures regarding service cancellations and refund requests.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">1. Service Onboarding & 30-Day Satisfaction Window</h3>
            <p style="margin-bottom: 20px;">
                For our turnkey e-commerce account setup and dedicated management plans, we provide a <strong>30-day initial onboarding review period</strong>. If within the first 30 days of contract execution our team has failed to deliver the initial account onboarding and product listing milestones outlined in your service agreement, you are eligible to request a refund for management fees.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">2. Non-Refundable Items & Third-Party Direct Costs</h3>
            <p style="margin-bottom: 20px;">
                The following costs are non-refundable once incurred or deployed:
            </p>
            <ul style="margin-left: 20px; margin-bottom: 20px; list-style-type: disc;">
                <li style="margin-bottom: 8px;">Direct marketplace seller fees paid to Amazon, Walmart, eBay, or Shopify.</li>
                <li style="margin-bottom: 8px;">Paid advertising spend deployed directly to ad platforms (Amazon PPC, Meta Ads, Google Ads).</li>
                <li style="margin-bottom: 8px;">Third-party wholesale inventory or sample purchases approved by the client.</li>
            </ul>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">3. Cancellation Process & Notice Period</h3>
            <p style="margin-bottom: 20px;">
                Clients on recurring monthly management agreements may cancel at any time with a <strong>14-day written notice</strong> prior to the next billing cycle. To cancel:
            </p>
            <ol style="margin-left: 20px; margin-bottom: 20px; list-style-type: decimal;">
                <li style="margin-bottom: 8px;">Submit a formal cancellation notice by emailing <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}" style="color: var(--primary); font-weight: 600;">{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}</a> or contacting your Dedicated Account Manager.</li>
                <li style="margin-bottom: 8px;">Our billing desk will confirm receipt and ensure all current reporting deliverables and access credentials are fully transferred to you.</li>
                <li style="margin-bottom: 8px;">No subsequent monthly management charges will occur following the cancellation date.</li>
            </ol>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">4. Refund Processing Timelines & Method</h3>
            <p style="margin-bottom: 20px;">
                Approved refunds will be processed within <strong>5 to 7 business days</strong> back to the original method of payment (credit card, bank transfer, or authorized merchant checkout).
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">5. Contacting Customer Support</h3>
            <p style="margin-bottom: 20px;">
                For any questions regarding billing, invoices, or cancellations, please reach our dedicated support desk at:
            </p>
            <div style="background: var(--surface-alt); padding: 20px; border-radius: 8px; border: 1px solid var(--border-color);">
                <p style="margin-bottom: 6px;"><strong>OYL Legacy LLC • Customer Support Desk</strong></p>
                <p style="margin-bottom: 6px;">Email: <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}" style="color: var(--primary);">{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}</a></p>
                <p style="margin-bottom: 6px;">Hotline: <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" style="color: var(--text-dark);">{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</a></p>
                <p>Address: {{ \App\Models\SiteSetting::get('contact_address', '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
