@extends('layouts.app')

@section('title', "UAE's Tiktok Shop Automation Services - Start Selling On TikTok - AmazonConsultant.ae")

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">Viral Commerce</div>
                <h1>
                    Start Your TikTok Shop with <br>
                    <span class="gradient-text">UAE’s Top-Rated Agency</span>
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> builds successful, turnkey automated TikTok shops in no time. Proven for delivering 10,000+ impactful e-commerce projects, we help you set up, automate, and grow your business at affordable rates.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'TikTok Shop Automation']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-brands fa-tiktok"></i>
                        <span>Launch Your TikTok Shop</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Get TikTok Shop Quote</h3>
                    <p>Unlock viral e-commerce sales today.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="TikTok Shop Automation Page">
                    <input type="hidden" name="service_interested" value="TikTok Shop Automation">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone / WhatsApp</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+971 50 123 4567" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <span>Launch TikTok Automation</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Roadmap -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Turnkey Framework</div>
            <h2>Roadmap To Get An Automated TikTok Shop</h2>
            <p>We combine viral product curation, creator affiliate networks, and automated fulfillment.</p>
        </div>
        <div class="roadmap-grid">
            <div class="roadmap-card">
                <div class="roadmap-number">01</div>
                <h3>Shop Setup & Approval</h3>
                <p>Register official TikTok Seller Center business account with full KYC verification and payment gateway integration.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">02</div>
                <h3>Viral Product Sourcing</h3>
                <p>Data-driven curation of trending TikTok products with rapid US/UAE domestic shipping channels.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">03</div>
                <h3>Creator Affiliate Outreach</h3>
                <p>Connect with hundreds of verified TikTok creators who post video reviews and drive massive organic sales.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQs -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <h2>TikTok Shop FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>How does TikTok Shop automation streamline my business?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We manage product listings, creator affiliate commissions, inventory sync, and customer order processing completely, turning viral viewership into predictable daily revenue.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Can I automate product sourcing and order fulfillment on TikTok?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes. Our warehouse network automatically fulfills orders within 24-48 hours and uploads real-time tracking directly to TikTok Shop.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
