@extends('layouts.app')

@section('title', 'Guaranteed Amazon KDP Book Publishing Service In UAE - AmazonConsultant.ae')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="badge badge-primary">Guaranteed KDP Publishing</div>
                <h1>
                    UAE's Amazon Book Publishing <br>
                    <span class="gradient-text">Give Your Stories</span> the Exposure They Need
                </h1>
                <p class="hero-subtitle">
                    <strong>AmazonConsultant.ae</strong> is the #1 Amazon book publisher with a proven record of launching 2,000+ stories as bestsellers. Catering to 150+ genres, we release your book on Amazon in a single attempt with zero rejection risk.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('consultation', ['service' => 'Amazon Book Publishing']) }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-book"></i>
                        <span>Publish My Book on Amazon</span>
                    </a>
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '00971562906253') }}" class="btn btn-outline btn-lg">
                        <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+971 562 906 253') }}</span>
                    </a>
                </div>
            </div>

            <div class="lead-intake-card">
                <div class="lead-card-header">
                    <h3>Start KDP Publishing</h3>
                    <p>Submit manuscript details for a quick quote.</p>
                </div>
                <form action="{{ route('lead.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source_page" value="Amazon Book Publishing Page">
                    <input type="hidden" name="service_interested" value="Amazon KDP Book Publishing">
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
                    <div class="form-group">
                        <label class="form-label">Book Genre / Format</label>
                        <input type="text" name="budget" class="form-control" placeholder="e.g. Non-Fiction, Fiction, Ebook & Paperback">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <span>Get Instant Publishing Plan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">End-To-End Solution</div>
            <h2>Our Amazon Self-Publishing Service Handles Everything</h2>
            <p>From professional interior layout and custom cover design to global print-on-demand distribution.</p>
        </div>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-pen-nib"></i></div>
                <h3>Formatting & Typesetting</h3>
                <p>Meticulously formatted files for Kindle Mobi/Epub, paperback PDF, and hardcover specifications.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-palette"></i></div>
                <h3>Bestseller Cover Design</h3>
                <p>High-converting thumbnail aesthetics designed by award-winning graphic artists tailored for your genre.</p>
            </div>
            <div class="service-card">
                <div class="service-card-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                <h3>Keyword & Category Ranking</h3>
                <p>Strategic indexing in low-competition, high-volume Amazon categories to maximize organic discoverability.</p>
            </div>
        </div>
    </div>
</section>

<!-- Packages Section -->
@if(isset($packages) && count($packages) > 0)
<section class="section-padding section-bg-alt">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">Publishing Packages</div>
            <h2>Select Your Publishing Plan (USD)</h2>
            <p>100% Royalties Belong to You. No Hidden Fees.</p>
        </div>
        <div class="pricing-grid">
            @foreach($packages as $pkg)
                <div class="pricing-card {{ $pkg->is_popular ? 'featured' : '' }}">
                    @if($pkg->is_popular)
                        <div class="pricing-ribbon"><span class="badge badge-glow">{{ $pkg->badge_text ?? 'BEST VALUE' }}</span></div>
                    @endif
                    <div class="pricing-card-header">
                        <h3>{{ $pkg->name }}</h3>
                        <p>{{ $pkg->subtitle }}</p>
                        <div class="pricing-amount-box">
                            <span class="pricing-currency">{{ \App\Models\SiteSetting::get('currency_symbol', '$') }}</span>
                            <span class="pricing-amount">{{ number_format($pkg->price_usd, 0) }}</span>
                            @if($pkg->discount_badge)
                                <span class="pricing-discount-tag">{{ $pkg->discount_badge }}</span>
                            @endif
                        </div>
                    </div>
                    <ul class="pricing-features-list">
                        @if(is_array($pkg->features))
                            @foreach($pkg->features as $feat)
                                <li><i class="fa-solid fa-circle-check"></i> <span>{{ $feat }}</span></li>
                            @endforeach
                        @endif
                    </ul>
                    <a href="{{ route('consultation', ['package' => $pkg->name]) }}" class="btn {{ $pkg->is_popular ? 'btn-primary' : 'btn-outline' }}" style="width: 100%;">
                        <span>{{ $pkg->cta_text }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- FAQ -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <h2>KDP Publishing FAQs</h2>
        </div>
        <div class="faq-accordion">
            <div class="faq-item active">
                <button class="faq-question">
                    <span>What cost is involved in publishing my book on Amazon?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Our publishing tiers start at $699 USD for complete formatting, cover design, and category indexing. There are no ongoing commission splits—you keep 100% of your Amazon royalties.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>How long do you take to publish my book in the UAE?</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Standard publishing timelines range between 7 to 14 business days once manuscript and assets are submitted.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
