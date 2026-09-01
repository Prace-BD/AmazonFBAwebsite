@extends('layouts.app')

@section('title', 'Service Delivery & Fulfillment Policy - ' . \App\Models\SiteSetting::get('site_name', 'OYL Legacy'))

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 860px;">
        <div class="section-header" style="text-align: left; margin-bottom: 30px;">
            <div class="badge badge-primary">Fulfillment Standards</div>
            <h2>Service Delivery & Fulfillment Policy</h2>
            <p>Last updated: {{ date('F Y') }} • Governing Entity: <strong>OYL Legacy LLC</strong></p>
        </div>

        <div style="font-size: 15px; color: var(--text-muted); line-height: 1.8;">
            <p style="margin-bottom: 20px;">
                <strong>OYL Legacy LLC</strong> provides turnkey digital services and dedicated account management. This policy outlines how and when our clients receive service onboarding, deliverables, and operational access.
            </p>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">1. Digital Service Delivery Process</h3>
            <p style="margin-bottom: 20px;">
                Upon completing a service order or signing an engagement proposal:
            </p>
            <ol style="margin-left: 20px; margin-bottom: 20px; list-style-type: decimal;">
                <li style="margin-bottom: 8px;"><strong>Instant Order Confirmation:</strong> You will immediately receive an automated email confirmation detailing your chosen package and order summary.</li>
                <li style="margin-bottom: 8px;"><strong>Account Manager Assignment (Within 24 Hours):</strong> Your named Dedicated Account Manager reaches out to initiate your onboarding kickoff call.</li>
                <li style="margin-bottom: 8px;"><strong>Secure Access Onboarding (Days 1 - 3):</strong> We assist in configuring secondary delegated user permissions for Seller Central, Walmart, eBay, or Shopify.</li>
                <li style="margin-bottom: 8px;"><strong>Store Architecture & Listing Setup (Days 4 - 14):</strong> Catalog optimization, keyword indexing, and initial PPC advertising campaigns are deployed.</li>
            </ol>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">2. Expected Timelines & Turnaround</h3>
            <div style="overflow-x: auto; margin-bottom: 24px;">
                <table class="leads-table" style="background: var(--surface-alt); border: 1px solid var(--border-color); border-radius: 8px;">
                    <thead>
                        <tr>
                            <th>Service Line</th>
                            <th>Onboarding Kickoff</th>
                            <th>Initial Live Deliverables</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Amazon FBA Management</strong></td>
                            <td>Within 24 Hours</td>
                            <td>7 - 14 Business Days</td>
                        </tr>
                        <tr>
                            <td><strong>Walmart Marketplace WFS</strong></td>
                            <td>Within 24 Hours</td>
                            <td>10 - 15 Business Days</td>
                        </tr>
                        <tr>
                            <td><strong>eBay Automation Setup</strong></td>
                            <td>Within 24 Hours</td>
                            <td>5 - 10 Business Days</td>
                        </tr>
                        <tr>
                            <td><strong>Shopify DTC Store Build</strong></td>
                            <td>Within 24 Hours</td>
                            <td>7 - 12 Business Days</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">3. Ongoing Management & Monthly Deliverables</h3>
            <p style="margin-bottom: 20px;">
                Active management clients receive:
            </p>
            <ul style="margin-left: 20px; margin-bottom: 20px; list-style-type: disc;">
                <li style="margin-bottom: 8px;">Weekly scheduled strategy & performance review calls.</li>
                <li style="margin-bottom: 8px;">Monthly comprehensive financial P&L reporting.</li>
                <li style="margin-bottom: 8px;">24/7 store health and listing suppression monitoring.</li>
            </ul>

            <h3 style="color: var(--accent); font-size: 19px; margin: 28px 0 12px;">4. Support Inquiries</h3>
            <p style="margin-bottom: 20px;">
                For questions regarding fulfillment status or your onboarding milestones, email <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}" style="color: var(--primary); font-weight: 600;">{{ \App\Models\SiteSetting::get('contact_email', 'support@oyllegacy.com') }}</a>.
            </p>
        </div>
    </div>
</section>
@endsection
