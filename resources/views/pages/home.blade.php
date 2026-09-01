@extends('layouts.app')

@section('title', \App\Models\SiteSetting::get('site_name', 'OYL Legacy') . ' - Turnkey E-Commerce Operations & Dedicated Account Management')

@section('content')

<!-- ==========================================================================
     HERO BANNER SECTION
     ========================================================================== -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary" style="margin-bottom: 18px;">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>Dedicated Account Management & Institutional Scaling</span>
                </div>
                <h1>
                    Scale Your E-Commerce Store with a <br>
                    <span class="gradient-text">Dedicated Account Director</span> on 100% Autopilot
                </h1>
                <p class="hero-subtitle">
                    <strong>OYL Legacy</strong> provides turnkey e-commerce store operations, data-driven PPC marketing, inventory logistics, and dedicated single-point account management across Amazon FBA, Walmart Marketplace, eBay, and Shopify.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation') }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-rocket"></i>
                        <span>Get Your Dedicated Manager</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
                    </a>
                </div>
                <div class="hero-trust-bar">
                    <div class="trust-rating">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="rating-text">
                            <strong>4.9 / 5.0 Rating</strong> <span>(1,250+ Verified Client Reviews • OYL Legacy)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Lead Intake Form -->
            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <div class="badge badge-glow" style="margin-bottom: 8px;">Direct Manager Assignment</div>
                    <h3>Request Strategy Proposal</h3>
                    <p>Receive a customized ROI calculation and store roadmap.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Homepage Hero Lead Form">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Johnathan Miller" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone / WhatsApp</label>
                        <input type="tel" name="phone" class="form-control" placeholder="+1 (555) 019-2834" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Platform of Interest</label>
                        <select name="service_interested" class="form-control">
                            <option value="Amazon FBA Dedicated Management">Amazon FBA Dedicated Management</option>
                            <option value="Walmart Marketplace WFS">Walmart Marketplace WFS</option>
                            <option value="eBay Multi-Account Automation">eBay Multi-Account Automation</option>
                            <option value="TikTok Shop Creator Scaling">TikTok Shop Creator Scaling</option>
                            <option value="Shopify DTC Brand Scaling">Shopify DTC Brand Scaling</option>
                            <option value="Multi-Channel Expansion">Multi-Channel Global Expansion</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 8px;">
                        <span>Request Account Manager</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PARTNER LOGOS TICKER
     ========================================================================== -->
<section class="partner-section">
    <div class="container">
        <div class="partner-title">Institutional Multi-Platform Store Management</div>
        <div class="partner-grid">
            <div class="partner-item"><i class="fa-brands fa-amazon"></i> Amazon FBA</div>
            <div class="partner-item"><i class="fa-solid fa-store"></i> Walmart WFS</div>
            <div class="partner-item"><i class="fa-brands fa-ebay"></i> eBay Scale</div>
            <div class="partner-item"><i class="fa-brands fa-tiktok"></i> TikTok Shop</div>
            <div class="partner-item"><i class="fa-brands fa-shopify"></i> Shopify Plus</div>
            <div class="partner-item"><i class="fa-solid fa-chart-line"></i> Multi-Channel</div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICES OVERVIEW SECTION
     ========================================================================== -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Full-Service Turnkey Coverage</div>
            <h2>Institutional Solutions for High-Growth E-Commerce Marketplaces</h2>
            <p>From algorithmic repricing and supplier procurement to PPC management and Buy Box retention, your assigned account manager runs every operational detail.</p>
        </div>

        <div class="services-grid">
            <!-- Service 1: Amazon FBA Management -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-brands fa-amazon"></i></div>
                    <h3>Amazon FBA Management</h3>
                    <p>End-to-end Seller Central management with algorithmic Buy Box repricing, A+ content, and high-ROI PPC campaigns.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> Assigned Senior Account Director</li>
                        <li><i class="fa-solid fa-check-circle"></i> Negative keyword harvesting & PPC scaling</li>
                        <li><i class="fa-solid fa-check-circle"></i> 100% store ownership & direct bank payouts</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.amazon-book') }}" class="service-link">
                        <span>Explore Amazon FBA</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Service 2: TikTok Shop -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-brands fa-tiktok"></i></div>
                    <h3>TikTok Shop Automation</h3>
                    <p>Tap into explosive short-form video commerce with viral product curation and top creator affiliate outreach.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> Trending product sourcing & sample logistics</li>
                        <li><i class="fa-solid fa-check-circle"></i> Creator affiliate outreach & commission architecture</li>
                        <li><i class="fa-solid fa-check-circle"></i> 24-hour order dispatch & tracking synchronization</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.tiktok') }}" class="service-link">
                        <span>Explore TikTok Shop</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Service 3: Walmart Automation -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-solid fa-store"></i></div>
                    <h3>Walmart Marketplace WFS</h3>
                    <p>Establish high-margin dropshipping and WFS store operations on Walmart Marketplace with guaranteed approval assistance.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> Corporate application & marketplace clearance</li>
                        <li><i class="fa-solid fa-check-circle"></i> WFS 2-day delivery badge onboarding</li>
                        <li><i class="fa-solid fa-check-circle"></i> Automated catalog indexing & price optimization</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.walmart') }}" class="service-link">
                        <span>Explore Walmart WFS</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Service 4: Shopify DTC -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-brands fa-shopify"></i></div>
                    <h3>Shopify DTC Scaling</h3>
                    <p>Own an independent direct-to-consumer digital asset with bespoke custom storefront design and automated supplier sync.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> High-converting mobile UI/UX architecture</li>
                        <li><i class="fa-solid fa-check-circle"></i> Automated supplier stock & fulfillment integration</li>
                        <li><i class="fa-solid fa-check-circle"></i> Meta, TikTok & Google ad funnel management</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.shopify') }}" class="service-link">
                        <span>Explore Shopify DTC</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Service 5: eBay Multi-Account -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-brands fa-ebay"></i></div>
                    <h3>eBay Multi-Account Automation</h3>
                    <p>Scale multi-account eBay stores across global markets with 1,000+ optimized listings and automated shipping pipelines.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> Multi-tier eBay seller account setup</li>
                        <li><i class="fa-solid fa-check-circle"></i> Top Rated Seller status maintenance</li>
                        <li><i class="fa-solid fa-check-circle"></i> 24/7 buyer messaging & dispute resolution</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.ebay') }}" class="service-link">
                        <span>Explore eBay Store</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Service 6: Multi-Channel Scaling -->
            <div class="service-card">
                <div>
                    <div class="service-card-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <h3>Multi-Channel Scaling</h3>
                    <p>Expand brand presence across regional and international digital channels with unified inventory and centralized P&L reporting.</p>
                    <ul class="service-card-perks">
                        <li><i class="fa-solid fa-check-circle"></i> Multi-channel inventory & repricing sync</li>
                        <li><i class="fa-solid fa-check-circle"></i> 3PL warehouse coordination & freight forwarding</li>
                        <li><i class="fa-solid fa-check-circle"></i> Weekly unified multi-platform executive reports</li>
                    </ul>
                </div>
                <div class="service-card-action">
                    <a href="{{ route('services.noon') }}" class="service-link">
                        <span>Explore Multi-Channel</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PACKAGES & PRICING SECTION (IN US DOLLARS $)
     ========================================================================== -->
<section class="section-padding section-bg-alt" id="pricing">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Transparent Pricing in USD ($)</div>
            <h2>Turnkey Management Plans with Dedicated Account Directors</h2>
            <p>{{ \App\Models\SiteSetting::get('pricing_disclaimer', 'All package fees displayed in US Dollars (USD). Custom enterprise agreements and milestone billing available.') }}</p>
            
            <!-- Platform Filter Tabs -->
            <div style="display: flex; justify-content: center; gap: 10px; margin-top: 24px; flex-wrap: wrap;">
                <button class="btn btn-primary btn-sm" data-platform-tab="all">All Packages</button>
                <button class="btn btn-outline btn-sm" data-platform-tab="amazon">Amazon FBA</button>
                <button class="btn btn-outline btn-sm" data-platform-tab="walmart">Walmart</button>
                <button class="btn btn-outline btn-sm" data-platform-tab="ebay">eBay</button>
            </div>
        </div>

        <div class="pricing-grid">
            @foreach($packages as $pkg)
                <div class="pricing-card {{ $pkg->is_popular ? 'featured' : '' }}" data-package-platform="{{ $pkg->platform }}">
                    @if($pkg->is_popular)
                        <div class="pricing-ribbon">
                            <span class="badge badge-glow">{{ $pkg->badge_text ?? 'MOST POPULAR 🔥' }}</span>
                        </div>
                    @elseif($pkg->badge_text)
                        <div class="pricing-ribbon">
                            <span class="badge badge-dark">{{ $pkg->badge_text }}</span>
                        </div>
                    @endif

                    <div class="pricing-card-header">
                        <h3>{{ $pkg->name }}</h3>
                        <p>{{ $pkg->subtitle }}</p>

                        <div class="pricing-amount-box">
                            <span class="pricing-currency">{{ \App\Models\SiteSetting::get('currency_symbol', '$') }}</span>
                            <span class="pricing-amount">{{ number_format($pkg->price_usd, 0) }}</span>
                            @if($pkg->original_price_usd)
                                <span class="pricing-original">{{ \App\Models\SiteSetting::get('currency_symbol', '$') }}{{ number_format($pkg->original_price_usd, 0) }}</span>
                            @endif
                            @if($pkg->discount_badge)
                                <span class="pricing-discount-tag">{{ $pkg->discount_badge }}</span>
                            @endif
                        </div>
                    </div>

                    <ul class="pricing-features-list">
                        @if(is_array($pkg->features))
                            @foreach($pkg->features as $feat)
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>{{ $feat }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <div>
                        <a href="{{ route('consultation', ['package' => $pkg->name]) }}" class="btn {{ $pkg->is_popular ? 'btn-primary' : 'btn-outline' }}" style="width: 100%; margin-bottom: 10px;">
                            <span>{{ $pkg->cta_text }}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                        <div style="text-align: center; font-size: 12.5px; color: var(--text-muted);">
                            <i class="fa-solid fa-phone" style="color: var(--primary);"></i> Hotline: <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" style="color: var(--text-dark); font-weight: 600;">{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     3-STEP AUTOPILOT PROCESS ROADMAP
     ========================================================================== -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Seamless Onboarding</div>
            <h2>A Clear Roadmap to E-Commerce Scalability</h2>
            <p>Our institutional framework ensures your store is verified, stocked, and optimized with institutional precision.</p>
        </div>

        <div class="roadmap-grid">
            <div class="roadmap-card">
                <div class="roadmap-number">01</div>
                <h3>Manager Pairing & Setup</h3>
                <p>You are paired with a dedicated named Account Manager who coordinates seller account verification and permission onboarding.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">02</div>
                <h3>Cataloging & Sourcing</h3>
                <p>Our analytics team curates high-margin winning items, configures SEO listings, and routes inventory to fulfillment centers.</p>
            </div>
            <div class="roadmap-card">
                <div class="roadmap-number">03</div>
                <h3>Turnkey Management</h3>
                <p>We manage advertising, Buy Box repricing, customer support, and weekly margin reporting while you retain 100% store equity.</p>
            </div>
        </div>

        <!-- STATS BAR -->
        <div class="stats-banner">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>12,000+</h3>
                    <p>Automated Stores Managed</p>
                </div>
                <div class="stat-item">
                    <h3>$50M+</h3>
                    <p>Client Gross Merchandise Value</p>
                </div>
                <div class="stat-item">
                    <h3>45+</h3>
                    <p>Dedicated Account Directors</p>
                </div>
                <div class="stat-item">
                    <h3>99.4%</h3>
                    <p>Client Retention & Satisfaction</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TESTIMONIALS SECTION
     ========================================================================== -->
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Client Success Stories</div>
            <h2>Trusted by High-Performing E-Commerce Investors Globally</h2>
            <p>Read real experiences from partners who scaled their marketplace digital assets with OYL Legacy.</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">"Having a named Dedicated Account Manager made all the difference. Our Amazon FBA store went from $4,000 to over $42,000 in monthly GMV with steady 28% net margins."</p>
                <div class="testimonial-user">
                    <div class="user-avatar">JM</div>
                    <div class="user-info">
                        <h4>Johnathan Miller</h4>
                        <p>Dallas, TX • Amazon FBA Investor</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">"The Walmart WFS onboarding process was completely seamless. OYL Legacy handled seller registration, cataloging, and inventory routing without any delay."</p>
                <div class="testimonial-user">
                    <div class="user-avatar">SC</div>
                    <div class="user-info">
                        <h4>Sarah Chen</h4>
                        <p>Seattle, WA • Multi-Channel Store Owner</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">"Their transparency in USD pricing and weekly 1-on-1 strategy calls provided total peace of mind. Truly institutional management."</p>
                <div class="testimonial-user">
                    <div class="user-avatar">DR</div>
                    <div class="user-info">
                        <h4>David Reynolds</h4>
                        <p>Chicago, IL • E-Commerce Entrepreneur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     FREQUENTLY ASKED QUESTIONS (ACCORDION)
     ========================================================================== -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Underwriting & Compliance Transparency</div>
            <h2>Frequently Asked Questions About OYL Legacy Services</h2>
            <p>Everything you need to know about our dedicated account management, fees, security, and onboarding.</p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>What is the role of the Dedicated Account Manager?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Every OYL Legacy client is assigned a named, senior Dedicated Account Director. Your director serves as your single point of operational contact, conducting weekly strategy calls, managing PPC ad spend, optimizing Buy Box share, and monitoring 24/7 store health.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>How does pricing and billing work?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>All service package fees are fixed and clearly denominated in US Dollars ($ USD), starting at $699 USD. There are no hidden fees or surprise setup costs. Clients also allocate working capital for inventory purchases directly to verified manufacturers.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Who owns the store and payouts?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>You retain 100% legal ownership of your seller account, brand trademarks, and bank account links. You grant our management team delegated secondary access permissions to execute daily operations.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>What is your cancellation and refund policy?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We provide a 30-day initial onboarding review window. Month-to-month management plans can be cancelled at any time with 14 days written notice. Full details are published in our <a href="{{ route('refund-policy') }}" style="color: var(--primary); font-weight: 600;">Refund & Cancellation Policy</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     LATEST BLOG & ADVICE INSIGHTS
     ========================================================================== -->
@if(isset($blogs) && count($blogs) > 0)
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">E-Commerce Knowledge</div>
            <h2>Latest Insights & Strategy Guides</h2>
            <p>Institutional analysis on marketplace algorithms, dedicated account manager ROI, and compliance standards.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 28px;">
            @foreach($blogs as $blog)
                <div class="service-card">
                    <div>
                        <span class="page-badge">{{ $blog->category }}</span>
                        <h3 style="font-size: 18px; line-height: 1.4; margin: 10px 0;">{{ $blog->title }}</h3>
                        <p style="font-size: 13.5px;">{{ $blog->excerpt }}</p>
                    </div>
                    <div class="service-card-action">
                        <span style="font-size: 12px; color: var(--text-muted);"><i class="fa-regular fa-clock"></i> {{ $blog->read_time }}</span>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="service-link">Read Article <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ==========================================================================
     PRE-FOOTER CALL TO ACTION BANNER
     ========================================================================== -->
<section class="cta-banner-section">
    <div class="container">
        <div class="cta-banner-content">
            <h2>Ready to Scale with a Dedicated Account Director?</h2>
            <p>Book a free 30-minute strategic consultation with our management team today and receive a custom store scaling roadmap.</p>
            <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                <a href="{{ route('consultation') }}" class="btn btn-primary btn-lg">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Schedule Strategy Call</span>
                </a>
                <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="btn btn-white btn-lg">
                    <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                    <span>Call Hotline: {{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
