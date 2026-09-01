<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', \App\Models\SiteSetting::get('site_name', 'YL Legacy') . ' - ' . \App\Models\SiteSetting::get('site_tagline', 'Turnkey E-Commerce Operations & Dedicated Account Management'))</title>
    <meta name="description" content="@yield('meta_description', 'YL Legacy provides turnkey e-commerce store operations, dedicated account directors, and institutional growth across Amazon FBA, Walmart, eBay, TikTok Shop, and Shopify.')">
    
    <!-- Dynamic Favicon -->
    @if(\App\Models\SiteSetting::get('site_favicon_url'))
        <link rel="icon" href="{{ \App\Models\SiteSetting::get('site_favicon_url') }}" type="image/x-icon">
    @else
        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚡</text></svg>">
    @endif

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Base Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <!-- Dynamic Theme Custom Properties (Injected Globally from Unified Theme Control Center) -->
    <style>
        :root {
            --primary: {{ \App\Models\SiteSetting::get('theme_primary_color', '#f88902') }};
            --primary-hover: {{ \App\Models\SiteSetting::get('theme_primary_hover', '#e07800') }};
            --accent: {{ \App\Models\SiteSetting::get('theme_accent_color', '#0f172a') }};
            --secondary: {{ \App\Models\SiteSetting::get('theme_secondary_color', '#ff9900') }};
            --header-bg: {{ \App\Models\SiteSetting::get('theme_header_bg', '#ffffff') }};
            --topbar-bg: {{ \App\Models\SiteSetting::get('theme_topbar_bg', '#f8fafc') }};
            --footer-bg: {{ \App\Models\SiteSetting::get('theme_footer_bg', '#0b1120') }};
            --font-family: {!! \App\Models\SiteSetting::get('theme_font_family', "'Poppins', sans-serif") !!};
            --card-radius: {{ \App\Models\SiteSetting::get('theme_card_radius', '14px') }};
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- TOPBAR -->
    <div class="site-topbar">
        <div class="container">
            <div class="topbar-wrapper">
                <div class="topbar-badge">
                    <i class="fa-solid fa-shield-check"></i>
                    <span>{{ \App\Models\SiteSetting::get('topbar_announcement', '⚡ Institutional E-Commerce Management & Dedicated Account Directors') }}</span>
                </div>
                <div class="topbar-contact-items">
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="topbar-link">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
                    </a>
                    <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}" class="topbar-link">
                        <i class="fa-solid fa-envelope"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (PERSISTS ON ALL PAGES) -->
    <header class="site-header">
        <div class="container">
            <div class="nav-container">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="brand-logo">
                    @if(\App\Models\SiteSetting::get('site_logo_url'))
                        <img src="{{ \App\Models\SiteSetting::get('site_logo_url') }}" alt="{{ \App\Models\SiteSetting::get('site_name', 'YL Legacy') }}" height="38">
                    @else
                        <div class="brand-logo-icon"><i class="fa-solid fa-bolt"></i></div>
                        <div>YL<span>Legacy</span><span style="font-size: 13px; color: var(--text-muted); font-weight: 500;">.com</span></div>
                    @endif
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="nav-menu">
                    <div class="nav-item">
                        <a href="{{ route('pages.index') }}" class="nav-link {{ request()->routeIs('pages.index') ? 'active' : '' }}">
                            <i class="fa-solid fa-table-cells" style="color: var(--primary); font-size: 12px;"></i>
                            <span>Page List</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <span>Homepage</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                            <span>About Us</span>
                        </a>
                    </div>
                    <div class="nav-item has-dropdown">
                        <a href="#" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">
                            <span>Services</span>
                            <i class="fa-solid fa-chevron-down" style="font-size: 11px; margin-left: 2px;"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('services.amazon-book') }}" class="dropdown-link">
                                <i class="fa-brands fa-amazon"></i>
                                <span>Amazon FBA & Account Management</span>
                            </a>
                            <a href="{{ route('services.tiktok') }}" class="dropdown-link">
                                <i class="fa-brands fa-tiktok"></i>
                                <span>TikTok Shop Automation</span>
                            </a>
                            <a href="{{ route('services.walmart') }}" class="dropdown-link">
                                <i class="fa-solid fa-store"></i>
                                <span>Walmart Marketplace WFS</span>
                            </a>
                            <a href="{{ route('services.shopify') }}" class="dropdown-link">
                                <i class="fa-brands fa-shopify"></i>
                                <span>Shopify DTC Brand Scaling</span>
                            </a>
                            <a href="{{ route('services.ebay') }}" class="dropdown-link">
                                <i class="fa-brands fa-ebay"></i>
                                <span>eBay Multi-Account Automation</span>
                            </a>
                            <a href="{{ route('services.noon') }}" class="dropdown-link">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>Multi-Channel Scaling</span>
                            </a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <span>Contact Us</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                            <span>Blog</span>
                        </a>
                    </div>
                </nav>

                <!-- Actions / Phone CTA -->
                <div class="nav-actions">
                    <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="phone-quick-btn">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
                    </a>
                    <a href="{{ route('consultation') }}" class="btn btn-primary btn-sm">
                        <span>{{ \App\Models\SiteSetting::get('header_cta_text', 'Get Dedicated Manager') }}</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <button class="mobile-toggle" id="mobileToggle" aria-label="Open Navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- FLASH MESSAGES (GLOBAL) -->
    <div class="container" style="margin-top: 15px;">
        @if(session('success'))
            <div class="alert alert-success alert-auto-dismiss">
                <i class="fa-solid fa-circle-check"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error alert-auto-dismiss">
                <i class="fa-solid fa-circle-exclamation"></i>
                <div>{{ session('error') }}</div>
            </div>
        @endif
    </div>

    <!-- DYNAMIC MIDDLE PAGE CONTENT (CHANGES PER ROUTE) -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER (PERSISTS ON ALL PAGES) -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Col 1: About & Entity Info -->
                <div class="footer-col">
                    <div class="brand-logo" style="color: #ffffff; margin-bottom: 16px;">
                        <div class="brand-logo-icon"><i class="fa-solid fa-bolt"></i></div>
                        <div>YL<span>Legacy</span><span style="font-size: 13px; color: #94a3b8;">.com</span></div>
                    </div>
                    <p style="color: #94a3b8; font-size: 13.5px; line-height: 1.6; margin-bottom: 20px;">
                        {{ \App\Models\SiteSetting::get('footer_about_text', 'YL Legacy is a premier turnkey e-commerce operations and dedicated account management agency providing store scaling across Amazon FBA, Walmart WFS, eBay, and Shopify.') }}
                    </p>
                    <div class="footer-social-links">
                        @if(\App\Models\SiteSetting::get('social_facebook'))
                            <a href="{{ \App\Models\SiteSetting::get('social_facebook') }}" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if(\App\Models\SiteSetting::get('social_instagram'))
                            <a href="{{ \App\Models\SiteSetting::get('social_instagram') }}" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if(\App\Models\SiteSetting::get('social_linkedin'))
                            <a href="{{ \App\Models\SiteSetting::get('social_linkedin') }}" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        @endif
                        @if(\App\Models\SiteSetting::get('social_twitter'))
                            <a href="{{ \App\Models\SiteSetting::get('social_twitter') }}" target="_blank" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        @endif
                    </div>
                </div>

                <!-- Col 2: Services -->
                <div class="footer-col">
                    <h4>Management Services</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('services.amazon-book') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> Amazon FBA Management</a></li>
                        <li><a href="{{ route('services.tiktok') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> TikTok Shop Automation</a></li>
                        <li><a href="{{ route('services.walmart') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> Walmart Marketplace WFS</a></li>
                        <li><a href="{{ route('services.shopify') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> Shopify DTC Brand Scaling</a></li>
                        <li><a href="{{ route('services.ebay') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> eBay Store Management</a></li>
                        <li><a href="{{ route('services.noon') }}"><i class="fa-solid fa-angle-right" style="font-size: 11px; margin-right: 6px; color: var(--primary);"></i> Multi-Channel Expansion</a></li>
                    </ul>
                </div>

                <!-- Col 3: Company & Compliance -->
                <div class="footer-col">
                    <h4>Company & Policies</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('pages.index') }}">Page List Directory</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('consultation') }}">Get Free Strategy Proposal</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                        <li><a href="{{ route('refund-policy') }}">Refund & Cancellation Policy</a></li>
                        <li><a href="{{ route('fulfillment-policy') }}">Fulfillment & Delivery Policy</a></li>
                        <li><a href="{{ route('sitemap') }}">HTML Sitemap</a></li>
                        @auth
                            <li><a href="{{ route('admin.theme-control') }}" style="color: var(--primary); font-weight: 600;"><i class="fa-solid fa-sliders" style="margin-right: 5px;"></i> Unified Theme Center</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Col 4: Contact & Office -->
                <div class="footer-col">
                    <h4>Contact Support</h4>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-building"></i>
                        <span>YL Legacy LLC</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_address', '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA') }}</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}">{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}">{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}</a>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fa-solid fa-clock"></i>
                        <span>{{ \App\Models\SiteSetting::get('contact_hours', 'Mon - Fri: 8am - 8pm EST (24/7 Monitoring)') }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Bar -->
            <div class="footer-bottom">
                <div>
                    {{ \App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' YL Legacy LLC. All rights reserved.') }}
                </div>
                <div class="footer-policy-links">
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="{{ route('terms') }}">Terms and Conditions</a>
                    <a href="{{ route('refund-policy') }}">Refund Policy</a>
                    <a href="{{ route('fulfillment-policy') }}">Fulfillment Policy</a>
                    <a href="{{ route('sitemap') }}">Sitemap</a>
                    @auth
                        <a href="{{ route('admin.theme-control') }}" style="color: var(--primary);"><i class="fa-solid fa-lock"></i> Admin Panel</a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>

    <!-- MOBILE NAVIGATION DRAWER -->
    <div class="mobile-drawer-overlay" id="drawerOverlay"></div>
    <div class="mobile-drawer" id="mobileDrawer">
        <div class="mobile-drawer-header">
            <div class="brand-logo">
                <div class="brand-logo-icon"><i class="fa-solid fa-bolt"></i></div>
                <div>YL<span>Legacy</span><span style="font-size:12px; color:var(--text-muted);">.com</span></div>
            </div>
            <button id="closeDrawer" style="background:none; border:none; font-size:22px; cursor:pointer;"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="mobile-nav-links">
            <a href="{{ route('pages.index') }}" class="mobile-nav-link"><i class="fa-solid fa-table-cells" style="color:var(--primary); margin-right: 8px;"></i> Page List Directory</a>
            <a href="{{ route('home') }}" class="mobile-nav-link">Homepage</a>
            <a href="{{ route('about') }}" class="mobile-nav-link">About Us</a>
            <div style="font-weight: 700; font-size: 13px; text-transform: uppercase; color: var(--text-muted); margin-top: 10px;">Management Services:</div>
            <a href="{{ route('services.amazon-book') }}" class="mobile-nav-link" style="padding-left: 10px;">Amazon FBA Management</a>
            <a href="{{ route('services.tiktok') }}" class="mobile-nav-link" style="padding-left: 10px;">TikTok Shop Automation</a>
            <a href="{{ route('services.walmart') }}" class="mobile-nav-link" style="padding-left: 10px;">Walmart Marketplace WFS</a>
            <a href="{{ route('services.shopify') }}" class="mobile-nav-link" style="padding-left: 10px;">Shopify DTC Scaling</a>
            <a href="{{ route('services.ebay') }}" class="mobile-nav-link" style="padding-left: 10px;">eBay Store Operations</a>
            <a href="{{ route('services.noon') }}" class="mobile-nav-link" style="padding-left: 10px;">Multi-Channel Expansion</a>
            <div style="height: 1px; background: var(--border-color); margin: 10px 0;"></div>
            <a href="{{ route('refund-policy') }}" class="mobile-nav-link">Refund & Cancellation Policy</a>
            <a href="{{ route('fulfillment-policy') }}" class="mobile-nav-link">Fulfillment Policy</a>
            <a href="{{ route('contact') }}" class="mobile-nav-link">Contact Us</a>
            <a href="{{ route('blog.index') }}" class="mobile-nav-link">Blog & Insights</a>
            @auth
                <a href="{{ route('admin.theme-control') }}" class="mobile-nav-link" style="color: var(--primary);"><i class="fa-solid fa-sliders"></i> Unified Theme Center</a>
            @endauth
        </div>
        <div style="margin-top: auto;">
            <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="btn btn-outline" style="width: 100%; margin-bottom: 10px;">
                <i class="fa-solid fa-phone" style="color: var(--primary);"></i>
                <span>{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}</span>
            </a>
            <a href="{{ route('consultation') }}" class="btn btn-primary" style="width: 100%;">
                <span>Get Dedicated Manager</span>
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/theme.js') }}"></script>
    @stack('scripts')
</body>
</html>
