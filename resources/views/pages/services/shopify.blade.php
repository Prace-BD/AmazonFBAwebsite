@extends('layouts.app')

@section('title', 'Start Your Shopify Store in UAE - Shopify Automation Agency - AmazonConsultant.ae')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">Direct-To-Consumer</div>
                <h1>
                    UAE’s Best Shopify Store <br>
                    <span class="gradient-text">Automation Service</span> Delivering Higher Profits
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> provides fully automated Shopify stores designed smartly to sell and scale your brand. Connect with our experts and set yourself up for maximum profits without any operational hassle.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'Shopify Automation']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-brands fa-shopify"></i>
                        <span>Launch Your Shopify Store Today</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Get Shopify Store Proposal</h3>
                    <p>High-converting DTC e-commerce setup.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Shopify Automation Page">
                    <input type="hidden" name="service_interested" value="Shopify Store Automation">
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
                        <span>Build My Shopify Store</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Proven Growth Model</div>
            <h2>Start Your Shopify Business Effortlessly With Our End-to-End Solutions</h2>
            <p>We build, design, integrate automated supplier dropship pipelines, and run Meta/Google PPC ad campaigns.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-desktop"></i></div>
                <h3>Custom UI/UX Theme</h3>
                <p>Mobile-optimized, high-converting storefront built on Shopify Plus architecture with 1-click checkout.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-box-open"></i></div>
                <h3>Automated Supplier Sync</h3>
                <p>Real-time stock tracking and automated fulfillment pipelines with trusted US & EU wholesale suppliers.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-bullhorn"></i></div>
                <h3>Paid Traffic & Funnels</h3>
                <p>High-ROI Meta (Facebook/Instagram), TikTok, and Google shopping campaigns to drive profitable customer acquisition.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQs -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <h2>Shopify Automation FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>What is Shopify automation, and how does it work?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Shopify automation is a comprehensive managed service where we create your custom e-commerce brand, connect reliable fast-shipping suppliers, set up automated order tracking, and manage all marketing channels.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Will I have full ownership of my Shopify store?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes. You own 100% of the Shopify account, domain name, customer database, and payment processor payout accounts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
