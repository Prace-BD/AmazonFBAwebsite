@extends('layouts.app')

@section('title', 'Automate Walmart Dropshipping with Amazon Consultants UAE - AmazonConsultant.ae')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">Walmart Marketplace</div>
                <h1>
                    Get Walmart's <br>
                    <span class="gradient-text">‘Done For You’ Store</span> in the UAE & Gulf
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> specializes in setting up, optimizing, and scaling your Walmart business with powerful automation. We grow your e-commerce effortlessly, running it on 100% autopilot for maximum convenience.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'Walmart Automation']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-store"></i>
                        <span>Launch Your Walmart Store</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Get Walmart Proposal</h3>
                    <p>Approval-backed Walmart store setup.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Walmart Automation Page">
                    <input type="hidden" name="service_interested" value="Walmart Marketplace Automation">
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
                        <span>Request Walmart Blueprint</span>
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
            <div class="badge badge-primary">Turn Your Store into a 7-Figure Success</div>
            <h2>The Process That Leads To 100% Automated Walmart Stores</h2>
            <p>We handle strict seller approvals, WFS fulfillment, Buy Box optimization, and round-the-clock store management.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-file-signature"></i></div>
                <h3>Guaranteed Walmart Approval</h3>
                <p>We submit comprehensive corporate applications with proven approval credentials to clear Walmart Seller verification fast.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
                <h3>WFS Logistics Setup</h3>
                <p>Integrate directly with Walmart Fulfillment Services (WFS) for 2-day delivery badges and prioritized Buy Box placement.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-arrows-rotate"></i></div>
                <h3>Dynamic Repricing</h3>
                <p>Algorithmic repricing software ensures your products win the Buy Box while protecting gross profit margins 24/7.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <h2>Walmart Automation FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>What is Walmart automation, and is it available across the UAE?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Walmart automation is a turnkey service where our team establishes and manages an official Walmart US Marketplace store on your behalf. As an investor located in the UAE or Gulf, you enjoy passive monthly profit distributions.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>How much does it cost to automate my Walmart store?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Our turnkey Walmart management package is $1,199 USD, including full store onboarding, listing creation, and initial advertising campaigns.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
