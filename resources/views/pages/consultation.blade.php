@extends('layouts.app')

@section('title', 'Get Free Quote & Consultation - ' . \App\Models\SiteSetting::get('site_name', 'Amazon Consultant AE'))

@section('content')
<section class="section-padding" style="background: radial-gradient(circle at top, rgba(248, 137, 2, 0.08), transparent 70%), #ffffff;">
    <div class="container" style="max-width: 900px;">
        <div class="section-header">
            <div class="badge badge-primary">Launch My Store</div>
            <h2>Get a Quick and Hassle-Free E-Commerce Store Quote!</h2>
            <p>Tell us about your target platform and goals to receive a customized ROI roadmap and turnaround timeframe.</p>
        </div>

        <div class="lead-intake-card" style="padding: 40px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; padding-bottom: 24px; border-bottom: 1px solid var(--border-color);">
                <div style="text-align: center;">
                    <div style="font-size: 24px; color: var(--primary); margin-bottom: 6px;"><i class="fa-solid fa-calculator"></i></div>
                    <h4 style="font-size: 14px; font-weight: 700; color: var(--accent);">Customized Pricing</h4>
                    <p style="font-size: 12.5px; color: var(--text-muted);">Tailored specifically to your store requirements.</p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 24px; color: var(--primary); margin-bottom: 6px;"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                    <h4 style="font-size: 14px; font-weight: 700; color: var(--accent);">Transparent Rates</h4>
                    <p style="font-size: 12.5px; color: var(--text-muted);">No hidden fees—fair USD rates for turnkey execution.</p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 24px; color: var(--primary); margin-bottom: 6px;"><i class="fa-solid fa-bolt"></i></div>
                    <h4 style="font-size: 14px; font-weight: 700; color: var(--accent);">Instant Response</h4>
                    <p style="font-size: 12.5px; color: var(--text-muted);">Our senior team responds within 15 minutes.</p>
                </div>
            </div>

            <form action="{{ route('lead.store') }}" method="POST">
                @csrf
                <input type="hidden" name="source_page" value="Free Consultation Page">

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">Your Full Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="Tariq Mansoor" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" placeholder="tariq@example.com" required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">Phone / WhatsApp *</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+971 50 123 4567" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Selected Automation Service</label>
                        <select name="service_interested" class="form-control">
                            <option value="Amazon FBA Automation" {{ request('package') == 'Amazon Launch' || request('package') == 'Amazon Growth' || request('package') == 'Complete Seller Solution' ? 'selected' : '' }}>Amazon FBA Automation</option>
                            <option value="Walmart Automation" {{ request('service') == 'Walmart Automation' ? 'selected' : '' }}>Walmart Automation</option>
                            <option value="eBay Automation" {{ request('service') == 'eBay Automation' ? 'selected' : '' }}>eBay Automation</option>
                            <option value="TikTok Shop Automation" {{ request('service') == 'TikTok Shop Automation' ? 'selected' : '' }}>TikTok Shop Automation</option>
                            <option value="Shopify Automation" {{ request('service') == 'Shopify Automation' ? 'selected' : '' }}>Shopify Automation</option>
                            <option value="Noon Store Automation" {{ request('service') == 'Noon Store Automation' ? 'selected' : '' }}>Noon Store Automation</option>
                            <option value="Amazon Book Publishing" {{ request('service') == 'Amazon Book Publishing' ? 'selected' : '' }}>Amazon Book Publishing</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Investment / Working Capital Range (USD)</label>
                    <select name="budget" class="form-control">
                        <option value="$1,000 - $3,000">$1,000 - $3,000 USD (Starter Plan)</option>
                        <option value="$3,000 - $7,000" selected>$3,000 - $7,000 USD (Growth Plan)</option>
                        <option value="$7,000 - $15,000">$7,000 - $15,000 USD (Scale Plan)</option>
                        <option value="$15,000+">$15,000+ USD (Enterprise / Multi-Store)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Additional Requirements or Questions</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Tell us if you have existing accounts, trade licenses, or specific products in mind..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                    <i class="fa-solid fa-rocket"></i>
                    <span>Submit & Request Store Consultation</span>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
