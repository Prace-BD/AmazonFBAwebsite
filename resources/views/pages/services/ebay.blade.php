@extends('layouts.app')

@section('title', 'Top-Rated EBay Automation Agency - Amazon Consultant UAE')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">eBay Global Marketplace</div>
                <h1>
                    Start Your eBay Store and <br>
                    <span class="gradient-text">Sell Without Limit</span> with Turnkey Automation
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> has launched thousands of automated eBay stores across the UAE and Gulf, helping businesses boost sales and thrive. Our eBay automation is the key to smoother operations and stronger revenue growth.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'eBay Automation']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-brands fa-ebay"></i>
                        <span>Launch Your eBay Store</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Get eBay Automation Plan</h3>
                    <p>Multi-account scaling strategy.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="eBay Automation Page">
                    <input type="hidden" name="service_interested" value="eBay Store Automation">
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
                        <span>Request eBay Proposal</span>
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
            <div class="badge badge-primary">3-Step Execution</div>
            <h2>Getting An Automated eBay Store Is A Matter Of Three Steps</h2>
            <p>We build, list, and manage everything so you can scale safely without risk of restrictions.</p>
        </div>
        <div class="roadmap-grid">
            <div class="roadmap-card">
                <div class="roadmap-number">01</div>
                <h3>Account Setup & Verification</h3>
                <p>Register verified eBay business accounts with upgraded listing limits and direct bank payouts.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">02</div>
                <h3>1,000+ Automated Listings</h3>
                <p>Upload trending products with optimized title keywords, competitive pricing, and fast shipping policies.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">03</div>
                <h3>Automated Order Processing</h3>
                <p>24/7 order fulfillment, tracking number updates, and proactive customer message management.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <h2>eBay Automation FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>Are your eBay automation services suitable for beginners?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes. Our team handles 100% of the technical setup, inventory management, customer service, and order routing, making it ideal for both beginners and experienced investors.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>How much does it cost to automate my eBay store?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Our complete eBay automation package is $899 USD, including full store onboarding, listing creation, and automated order fulfillment.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
