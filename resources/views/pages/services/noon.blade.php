@extends('layouts.app')

@section('title', 'Open and Run Your Noon Store With Professional Support in UAE - AmazonConsultant.ae')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">Middle East Leader</div>
                <h1>
                    Start Your Noon Store and <br>
                    <span class="gradient-text">Watch It Succeed</span> with UAE’s Top Specialists
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> is a top-rated agency that launches and manages your Noon store for your business. We handle everything from registration, trade license compliance, cataloging, and Fulfilled by Noon (FBN) until our automation scales your business by 4x.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'Noon Store Automation']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Launch Your Noon Store Today</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Get Noon Store Quote</h3>
                    <p>UAE & KSA Marketplace Launch.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Noon Store Page">
                    <input type="hidden" name="service_interested" value="Noon Store Automation">
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
                        <span>Request Noon Proposal</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">GCC Market Acceleration</div>
            <h2>Dominate Noon Sales with Our Automation in UAE and Beyond</h2>
            <p>We leverage Noon's vast customer base in Dubai, Abu Dhabi, Riyadh, and Jeddah for your business.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-store"></i></div>
                <h3>Noon Seller Registration</h3>
                <p>Fast-track onboarding with UAE VAT documentation, trade license verification, and brand registry clearance.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-warehouse"></i></div>
                <h3>Fulfilled by Noon (FBN)</h3>
                <p>Direct inventory transfers to Noon fulfillment centers for Express delivery badges and higher customer trust.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <h3>Buy Now Price Optimization</h3>
                <p>Algorithmic repricing to capture and maintain the Noon Buy Now box with healthy profit margins.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <h2>Noon Store FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>How long do you take to launch my Noon store?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Once your UAE business documents are verified, account onboarding and initial product cataloging take approximately 5 to 10 business days.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Do you handle product research and listing for Noon?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes. Our team conducts extensive Middle East market research to identify high-demand, low-competition products with strong daily search volume.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
