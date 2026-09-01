@extends('layouts.app')

@section('title', 'Contact Us - ' . \App\Models\SiteSetting::get('site_name', 'YL Legacy'))

@section('content')
<section class="section-padding" style="background: radial-gradient(circle at top right, rgba(248, 137, 2, 0.08), transparent 60%), #ffffff;">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Dedicated Client Support</div>
            <h2>Let’s Connect With Us And Scale Your Store</h2>
            <p>Have inquiries, need a custom enterprise quote, or want to speak with an Account Director? Reach out to our dedicated desk.</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 40px; align-items: flex-start;">
            <!-- Contact Details Card -->
            <div style="background: var(--surface-alt); border: 1px solid var(--border-color); border-radius: var(--card-radius); padding: 36px; box-shadow: var(--shadow-sm);">
                <h3 style="font-size: 22px; font-weight: 700; color: var(--accent); margin-bottom: 20px;">
                    👋 Contact YL Legacy
                </h3>
                <p style="font-size: 14.5px; color: var(--text-muted); line-height: 1.7; margin-bottom: 28px;">
                    Need assistance regarding store onboarding, dedicated account directors, or compliance verification? Contact our support team.
                </p>

                <div class="footer-contact-item" style="color: var(--text-dark); margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: var(--text-muted);">Hotline Call</div>
                        <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" style="font-size: 16px; font-weight: 700; color: var(--accent);">{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</a>
                    </div>
                </div>

                <div class="footer-contact-item" style="color: var(--text-dark); margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: var(--text-muted);">Email Inquiries</div>
                        <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}" style="font-size: 15px; font-weight: 600; color: var(--accent);">{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}</a>
                    </div>
                </div>

                <div class="footer-contact-item" style="color: var(--text-dark); margin-bottom: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: var(--text-muted);">Operating Headquarters</div>
                        <div style="font-size: 14px; font-weight: 500; color: var(--text-dark);">{{ \App\Models\SiteSetting::get('contact_address', '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA') }}</div>
                    </div>
                </div>

                <div class="footer-contact-item" style="color: var(--text-dark);">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: var(--text-muted);">Operating Hours</div>
                        <div style="font-size: 14px; font-weight: 500; color: var(--text-dark);">{{ \App\Models\SiteSetting::get('contact_hours', 'Mon - Fri: 8am - 8pm EST (24/7 Monitoring)') }}</div>
                    </div>
                </div>
            </div>

            <!-- Mail Forwarding Contact Form -->
            <div class="lead-intake-card">
                <div class="lead-card-header" style="text-align: left;">
                    <h3>Send Us A Direct Message</h3>
                    <p>Submissions are automatically routed to our senior account directors.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Contact Us Page">
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="Johnathan Miller" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label class="form-label">Phone / WhatsApp</label>
                            <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 019-2834">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Service Category</label>
                            <select name="service_interested" class="form-control">
                                <option value="Amazon FBA Dedicated Management">Amazon FBA Dedicated Management</option>
                                <option value="Walmart Marketplace WFS">Walmart Marketplace WFS</option>
                                <option value="eBay Multi-Account Automation">eBay Multi-Account Automation</option>
                                <option value="TikTok Shop Scaling">TikTok Shop Scaling</option>
                                <option value="Shopify DTC Brand Scaling">Shopify DTC Brand Scaling</option>
                                <option value="Multi-Channel Expansion">Multi-Channel Expansion</option>
                                <option value="General Partnership">General Partnership Inquiry</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Estimated Working Capital Budget (USD)</label>
                        <select name="budget" class="form-control">
                            <option value="$1,000 - $3,000">$1,000 - $3,000 USD (Starter)</option>
                            <option value="$3,000 - $7,000">$3,000 - $7,000 USD (Growth)</option>
                            <option value="$7,000 - $15,000">$7,000 - $15,000 USD (Scale)</option>
                            <option value="$15,000+">$15,000+ USD (Enterprise / Multi-Store)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Your Message or Strategy Inquiries</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Tell us about your business goals, target channels, or specific requirements..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Submit Inquiry & Forward to Directors</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
