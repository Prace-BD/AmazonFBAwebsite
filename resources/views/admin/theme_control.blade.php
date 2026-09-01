@extends('layouts.app')

@section('title', 'YL Legacy - Unified Theme Control Center')

@push('styles')
<style>
    .admin-dashboard {
        background: #f1f5f9;
        min-height: 80vh;
        padding: 40px 0 80px;
    }
    .admin-tabs {
        display: flex;
        gap: 8px;
        background: #ffffff;
        padding: 8px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        margin-bottom: 28px;
        overflow-x: auto;
        box-shadow: var(--shadow-sm);
    }
    .admin-tab-btn {
        padding: 12px 20px;
        border-radius: 8px;
        border: none;
        background: transparent;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        transition: var(--transition);
    }
    .admin-tab-btn.active {
        background: var(--primary);
        color: #ffffff;
        box-shadow: 0 4px 12px var(--primary-glow);
    }
    .admin-tab-pane {
        display: none;
    }
    .admin-tab-pane.active {
        display: block;
    }
    .admin-card {
        background: #ffffff;
        border: 1px solid var(--border-color);
        border-radius: var(--card-radius);
        padding: 32px;
        box-shadow: var(--shadow-sm);
        margin-bottom: 28px;
    }
    .admin-card h3 {
        font-size: 19px;
        font-weight: 700;
        color: var(--accent);
        margin-bottom: 20px;
        padding-bottom: 14px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .setting-row {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 20px;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #f8fafc;
    }
    .setting-label {
        font-weight: 600;
        font-size: 13.5px;
        color: var(--text-dark);
    }
    .setting-desc {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 2px;
    }
    .color-picker-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .color-input-preview {
        width: 44px;
        height: 38px;
        border-radius: 6px;
        border: 1px solid var(--border-color);
        padding: 2px;
        cursor: pointer;
    }
    .stats-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 28px;
    }
    .stat-mini-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        box-shadow: var(--shadow-sm);
    }
    .stat-mini-card h4 {
        font-size: 26px;
        font-weight: 800;
        color: var(--accent);
        margin-bottom: 4px;
    }
    .stat-mini-card p {
        font-size: 12.5px;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
    }
    .leads-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }
    .leads-table th {
        background: #f8fafc;
        padding: 12px 14px;
        text-align: left;
        font-weight: 700;
        color: var(--text-muted);
        border-bottom: 1px solid var(--border-color);
    }
    .leads-table td {
        padding: 14px;
        border-bottom: 1px solid var(--border-color);
        vertical-align: top;
    }
    .leads-table tr:hover {
        background: #fdfdfd;
    }
</style>
@endpush

@section('content')
<div class="admin-dashboard">
    <div class="container">
        <!-- Control Center Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 14px;">
            <div>
                <div class="badge badge-primary" style="margin-bottom: 6px;">YL Legacy Admin Panel</div>
                <h1 style="font-size: 28px; font-weight: 800; color: var(--accent);">Unified Theme Control Center</h1>
                <p style="font-size: 14px; color: var(--text-muted);">Manage global branding, theme colors, package USD pricing, mail forwarding, and lead inquiries in real time.</p>
            </div>
            <div style="display: flex; align-items: center; gap: 10px;">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline btn-sm">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Preview Live Site</span>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-sm" style="background: #ef4444; color: #ffffff; border: none; border-radius: 8px; font-weight: 600; padding: 8px 14px; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="stats-card-grid">
            <div class="stat-mini-card">
                <p>Total Leads</p>
                <h4>{{ $leadStats['total'] }}</h4>
            </div>
            <div class="stat-mini-card">
                <p>New Inquiries</p>
                <h4 style="color: var(--primary);">{{ $leadStats['new'] }}</h4>
            </div>
            <div class="stat-mini-card">
                <p>Mail Forwarded</p>
                <h4 style="color: #10b981;">{{ $leadStats['forwarded'] }}</h4>
            </div>
            <div class="stat-mini-card">
                <p>Active Packages</p>
                <h4>{{ count($packages) }}</h4>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="admin-tabs">
            <button class="admin-tab-btn active" data-admin-tab="theme-tab">
                <i class="fa-solid fa-palette"></i>
                <span>Theme & Styling</span>
            </button>
            <button class="admin-tab-btn" data-admin-tab="contact-tab">
                <i class="fa-solid fa-address-book"></i>
                <span>Hotline & Contact</span>
            </button>
            <button class="admin-tab-btn" data-admin-tab="pricing-tab">
                <i class="fa-solid fa-tags"></i>
                <span>Packages & USD Pricing</span>
            </button>
            <button class="admin-tab-btn" data-admin-tab="mail-tab">
                <i class="fa-solid fa-paper-plane"></i>
                <span>Mail Forwarding</span>
            </button>
            <button class="admin-tab-btn" data-admin-tab="leads-tab">
                <i class="fa-solid fa-inbox"></i>
                <span>Inbound Leads ({{ $leadStats['total'] }})</span>
            </button>
            <button class="admin-tab-btn" data-admin-tab="security-tab">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Security & Password</span>
            </button>
        </div>

        <!-- TAB 1: THEME & STYLING -->
        <div class="admin-tab-pane active" id="theme-tab">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="admin-card">
                    <h3>
                        <span>🎨 Global Dynamic Theme Controls</span>
                        <span class="badge badge-primary">Instant Global Update</span>
                    </h3>
                    <p style="color: var(--text-muted); font-size: 13.5px; margin-bottom: 20px;">
                        Modifications made here are dynamically written to the database cache and instantly rendered across all page headers, footers, buttons, and badges.
                    </p>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Primary Brand Color</div>
                            <div class="setting-desc">Main brand accent (buttons, glowing tags, highlights)</div>
                        </div>
                        <div class="color-picker-group">
                            <input type="color" name="theme_primary_color" id="primaryPicker" value="{{ \App\Models\SiteSetting::get('theme_primary_color', '#f88902') }}" class="color-input-preview" onchange="document.getElementById('primaryHex').value = this.value">
                            <input type="text" id="primaryHex" value="{{ \App\Models\SiteSetting::get('theme_primary_color', '#f88902') }}" class="form-control" style="width: 140px;" oninput="document.getElementById('primaryPicker').value = this.value">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Primary Hover Color</div>
                            <div class="setting-desc">Interactive hover state for buttons and links</div>
                        </div>
                        <div class="color-picker-group">
                            <input type="color" name="theme_primary_hover" id="hoverPicker" value="{{ \App\Models\SiteSetting::get('theme_primary_hover', '#e07800') }}" class="color-input-preview" onchange="document.getElementById('hoverHex').value = this.value">
                            <input type="text" id="hoverHex" value="{{ \App\Models\SiteSetting::get('theme_primary_hover', '#e07800') }}" class="form-control" style="width: 140px;" oninput="document.getElementById('hoverPicker').value = this.value">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Accent Dark Color</div>
                            <div class="setting-desc">Primary typography and dark container backgrounds</div>
                        </div>
                        <div class="color-picker-group">
                            <input type="color" name="theme_accent_color" id="accentPicker" value="{{ \App\Models\SiteSetting::get('theme_accent_color', '#0f172a') }}" class="color-input-preview" onchange="document.getElementById('accentHex').value = this.value">
                            <input type="text" id="accentHex" value="{{ \App\Models\SiteSetting::get('theme_accent_color', '#0f172a') }}" class="form-control" style="width: 140px;" oninput="document.getElementById('accentPicker').value = this.value">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Footer Background Color</div>
                            <div class="setting-desc">Global background for the persistent footer</div>
                        </div>
                        <div class="color-picker-group">
                            <input type="color" name="theme_footer_bg" id="footerPicker" value="{{ \App\Models\SiteSetting::get('theme_footer_bg', '#0b1120') }}" class="color-input-preview" onchange="document.getElementById('footerHex').value = this.value">
                            <input type="text" id="footerHex" value="{{ \App\Models\SiteSetting::get('theme_footer_bg', '#0b1120') }}" class="form-control" style="width: 140px;" oninput="document.getElementById('footerPicker').value = this.value">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Font Family</div>
                            <div class="setting-desc">Global Google Font typography CSS string</div>
                        </div>
                        <div>
                            <input type="text" name="theme_font_family" value="{{ \App\Models\SiteSetting::get('theme_font_family', 'Poppins, sans-serif') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Card Border Radius</div>
                            <div class="setting-desc">Border radius for cards, forms, and containers (e.g. 14px)</div>
                        </div>
                        <div>
                            <input type="text" name="theme_card_radius" value="{{ \App\Models\SiteSetting::get('theme_card_radius', '14px') }}" class="form-control" style="width: 140px;">
                        </div>
                    </div>

                    <div style="margin-top: 24px; text-align: right;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Theme Settings</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- TAB 2: HOTLINE & CONTACT -->
        <div class="admin-tab-pane" id="contact-tab">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="admin-card">
                    <h3>
                        <span>📞 Phone Hotline & Contact Information</span>
                        <span class="badge badge-primary">Header & Footer Sync</span>
                    </h3>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Hotline Phone Display</div>
                            <div class="setting-desc">Human-readable phone format shown on header & buttons</div>
                        </div>
                        <div>
                            <input type="text" name="contact_phone" value="{{ \App\Models\SiteSetting::get('contact_phone', '+1 (888) 695-0199') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Hotline Dial Number</div>
                            <div class="setting-desc">Raw digits for tel: links (e.g. 18886950199)</div>
                        </div>
                        <div>
                            <input type="text" name="contact_phone_raw" value="{{ \App\Models\SiteSetting::get('contact_phone_raw', '18886950199') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Official Contact Email</div>
                            <div class="setting-desc">Displayed on contact page and topbar</div>
                        </div>
                        <div>
                            <input type="email" name="contact_email" value="{{ \App\Models\SiteSetting::get('contact_email', 'support@yllegacy.com') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Operating Headquarters Address</div>
                            <div class="setting-desc">Address shown on contact page and footer</div>
                        </div>
                        <div>
                            <input type="text" name="contact_address" value="{{ \App\Models\SiteSetting::get('contact_address', '100 Enterprise Way, Suite 400, Wilmington, DE 19801, USA') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Topbar Announcement Message</div>
                            <div class="setting-desc">Notice displayed at the very top of all pages</div>
                        </div>
                        <div>
                            <input type="text" name="topbar_announcement" value="{{ \App\Models\SiteSetting::get('topbar_announcement', '⚡ Institutional E-Commerce Management & Dedicated Account Directors') }}" class="form-control">
                        </div>
                    </div>

                    <div style="margin-top: 24px; text-align: right;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Contact Settings</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- TAB 3: PACKAGES & USD PRICING -->
        <div class="admin-tab-pane" id="pricing-tab">
            <div class="admin-card">
                <h3>
                    <span>💵 Active Packages (US Dollars Pricing)</span>
                    <span class="badge badge-primary">USD ($) Currency</span>
                </h3>
                <p style="color: var(--text-muted); font-size: 13.5px; margin-bottom: 24px;">
                    Update package pricing, discount tags, popular badges, and feature lists. Changes immediately reflect on the homepage and pricing grids.
                </p>

                <div style="display: grid; gap: 24px;">
                    @foreach($packages as $pkg)
                        <div style="background: var(--surface-alt); border: 1px solid var(--border-color); border-radius: 10px; padding: 24px;">
                            <form action="{{ route('admin.packages.update', $pkg->id) }}" method="POST">
                                @csrf
                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                                    <div>
                                        <label class="form-label">Package Name</label>
                                        <input type="text" name="name" value="{{ $pkg->name }}" class="form-control" required>
                                    </div>
                                    <div>
                                        <label class="form-label">Platform</label>
                                        <select name="platform" class="form-control">
                                            <option value="amazon" {{ $pkg->platform == 'amazon' ? 'selected' : '' }}>Amazon</option>
                                            <option value="walmart" {{ $pkg->platform == 'walmart' ? 'selected' : '' }}>Walmart</option>
                                            <option value="ebay" {{ $pkg->platform == 'ebay' ? 'selected' : '' }}>eBay</option>
                                            <option value="tiktok" {{ $pkg->platform == 'tiktok' ? 'selected' : '' }}>TikTok</option>
                                            <option value="shopify" {{ $pkg->platform == 'shopify' ? 'selected' : '' }}>Shopify</option>
                                            <option value="multi" {{ $pkg->platform == 'multi' ? 'selected' : '' }}>Multi-Channel</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">Price (USD $)</label>
                                        <input type="number" step="1" name="price_usd" value="{{ $pkg->price_usd }}" class="form-control" required>
                                    </div>
                                    <div>
                                        <label class="form-label">Original Price (Strike)</label>
                                        <input type="number" step="1" name="original_price_usd" value="{{ $pkg->original_price_usd }}" class="form-control">
                                    </div>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                                    <div>
                                        <label class="form-label">Discount Badge</label>
                                        <input type="text" name="discount_badge" value="{{ $pkg->discount_badge }}" class="form-control" placeholder="Save 40%!">
                                    </div>
                                    <div>
                                        <label class="form-label">Top Ribbon Badge</label>
                                        <input type="text" name="badge_text" value="{{ $pkg->badge_text }}" class="form-control" placeholder="MOST POPULAR 🔥">
                                    </div>
                                    <div>
                                        <label class="form-label">CTA Button Label</label>
                                        <input type="text" name="cta_text" value="{{ $pkg->cta_text }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Features (1 feature per line)</label>
                                    <textarea name="features_raw" class="form-control" rows="4">{{ is_array($pkg->features) ? implode("\n", $pkg->features) : '' }}</textarea>
                                </div>

                                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                                    <div style="display: flex; gap: 16px;">
                                        <label style="display: flex; align-items: center; gap: 6px; font-size: 13px; cursor: pointer;">
                                            <input type="checkbox" name="is_popular" value="1" {{ $pkg->is_popular ? 'checked' : '' }}>
                                            <span>Highlight as Featured / Popular</span>
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 6px; font-size: 13px; cursor: pointer;">
                                            <input type="checkbox" name="is_active" value="1" {{ $pkg->is_active ? 'checked' : '' }}>
                                            <span>Active (Visible on Site)</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        <span>Update Package</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- TAB 4: MAIL FORWARDING -->
        <div class="admin-tab-pane" id="mail-tab">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="admin-card">
                    <h3>
                        <span>📨 Mail Forwarding System Settings</span>
                        <span class="badge badge-primary">Lead Automation</span>
                    </h3>
                    <p style="color: var(--text-muted); font-size: 13.5px; margin-bottom: 20px;">
                        When visitors fill out the Contact Us or Free Strategy forms, leads are stored in the database and automatically dispatched via mail to your designated email addresses.
                    </p>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Forward Inquiries To Email(s)</div>
                            <div class="setting-desc">Comma-separated email addresses to receive instant lead notifications</div>
                        </div>
                        <div>
                            <input type="text" name="mail_forward_to_email" value="{{ \App\Models\SiteSetting::get('mail_forward_to_email', 'support@yllegacy.com') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Email Notification Subject Template</div>
                            <div class="setting-desc">Use [service] and [name] tags for automated subject lines</div>
                        </div>
                        <div>
                            <input type="text" name="mail_subject_template" value="{{ \App\Models\SiteSetting::get('mail_subject_template', 'New YL Legacy Client Inquiry: [service] - [name]') }}" class="form-control">
                        </div>
                    </div>

                    <div class="setting-row">
                        <div>
                            <div class="setting-label">Auto-Reply to Client</div>
                            <div class="setting-desc">Send immediate styled confirmation email to the client</div>
                        </div>
                        <div>
                            <select name="mail_auto_reply_enabled" class="form-control" style="width: 140px;">
                                <option value="1" {{ \App\Models\SiteSetting::get('mail_auto_reply_enabled') == '1' ? 'selected' : '' }}>Enabled</option>
                                <option value="0" {{ \App\Models\SiteSetting::get('mail_auto_reply_enabled') == '0' ? 'selected' : '' }}>Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-top: 24px; text-align: right;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save Mail Settings</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- TAB 5: INBOUND LEADS -->
        <div class="admin-tab-pane" id="leads-tab">
            <div class="admin-card" style="padding: 0; overflow: hidden;">
                <div style="padding: 24px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center;">
                    <h3 style="margin: 0; padding: 0; border: none;">
                        <span>📥 Inbound Lead Submissions ({{ $leadStats['total'] }})</span>
                    </h3>
                </div>

                <div style="overflow-x: auto;">
                    <table class="leads-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Contact Info</th>
                                <th>Service / Budget</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leads as $lead)
                                <tr>
                                    <td style="white-space: nowrap; color: var(--text-muted);">
                                        {{ $lead->created_at->format('M d, Y') }}<br>
                                        <span style="font-size: 11.5px;">{{ $lead->created_at->format('h:i A') }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $lead->name }}</strong><br>
                                        <a href="mailto:{{ $lead->email }}" style="color: var(--primary);">{{ $lead->email }}</a><br>
                                        <a href="tel:{{ $lead->phone }}" style="color: var(--text-muted); font-size: 12.5px;">{{ $lead->phone }}</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-dark" style="font-size: 11px;">{{ $lead->service_interested ?? 'General Inquiry' }}</span>
                                        @if($lead->budget)
                                            <div style="font-size: 12px; margin-top: 4px; color: var(--text-muted);">Budget: <strong>{{ $lead->budget }}</strong></div>
                                        @endif
                                    </td>
                                    <td style="max-width: 320px; font-size: 12.5px; color: var(--text-dark);">
                                        {{ $lead->message ?? 'No additional notes provided.' }}
                                        <div style="font-size: 11px; color: var(--text-muted); margin-top: 4px;">Source: {{ $lead->source_page }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-control" style="font-size: 12px; padding: 4px 8px;" onchange="this.form.submit()">
                                                <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>🟢 New</option>
                                                <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>🔵 Contacted</option>
                                                <option value="in_progress" {{ $lead->status == 'in_progress' ? 'selected' : '' }}>🟡 In Progress</option>
                                                <option value="completed" {{ $lead->status == 'completed' ? 'selected' : '' }}>✅ Closed</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Delete this lead record?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background:none; border:none; color: #ef4444; cursor:pointer; font-size: 15px;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                        No lead inquiries received yet. Submit a test form on the contact page to see entries here!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div style="padding: 16px 24px;">
                    {{ $leads->links() }}
                </div>
            </div>
        </div>

        <!-- TAB 6: SECURITY & PASSWORD (DATABASE SYNCED) -->
        <div class="admin-tab-pane" id="security-tab">
            <div class="admin-card">
                <h3>
                    <span><i class="fa-solid fa-lock" style="color: var(--primary);"></i> Admin Security & Generic Password</span>
                    <span class="badge badge-primary"><i class="fa-solid fa-database"></i> Database Synced</span>
                </h3>
                <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 24px;">
                    The YL Legacy Admin Panel is secured behind a database-synced generic password. You can change your password below at any time, which immediately updates the <code>users</code> database record.
                </p>

                <div style="background: var(--surface-alt); padding: 18px 22px; border-radius: 8px; border: 1px solid var(--border-color); margin-bottom: 28px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
                    <div>
                        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; color: var(--text-muted);">Current Admin Identity</div>
                        <div style="font-size: 15px; font-weight: 700; color: var(--accent);">{{ auth()->user()->email ?? 'admin@yllegacy.com' }}</div>
                    </div>
                    <span class="badge badge-success"><i class="fa-solid fa-circle-check"></i> Active Session</span>
                </div>

                <form action="{{ route('admin.password.update') }}" method="POST" style="max-width: 520px;">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Current Admin Password</label>
                        <input type="password" name="current_password" class="form-control" required placeholder="Enter current password (default: admin123)">
                    </div>

                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" required placeholder="Enter new password (minimum 6 characters)">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required placeholder="Repeat new password">
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-top: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>Update Password in Database</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const adminTabBtns = document.querySelectorAll('.admin-tab-btn');
        const adminTabPanes = document.querySelectorAll('.admin-tab-pane');

        adminTabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-admin-tab');

                adminTabBtns.forEach(b => b.classList.remove('active'));
                adminTabPanes.forEach(p => p.classList.remove('active'));

                btn.classList.add('active');
                document.getElementById(targetId)?.classList.add('active');
            });
        });
    });
</script>
@endpush
