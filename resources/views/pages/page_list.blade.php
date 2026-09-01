@extends('layouts.app')

@section('title', 'Page List Directory & Sitemap - ' . \App\Models\SiteSetting::get('site_name', 'YL Legacy'))

@section('content')
<section class="section-padding" style="background: radial-gradient(circle at top, rgba(248, 137, 2, 0.05), transparent 70%), #ffffff;">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">System Index</div>
            <h2>Complete Website Page Directory</h2>
            <p>Direct navigation access to all website templates, platform services, and legal compliance policies.</p>
        </div>

        <div class="pages-directory-grid">
            @foreach($pages as $p)
                <div class="page-directory-card">
                    <div>
                        <span class="page-badge">{{ $p['badge'] }}</span>
                        <h3 style="font-size: 18px; font-weight: 700; color: var(--accent); margin-bottom: 8px;">{{ $p['title'] }}</h3>
                        <p style="font-size: 13.5px; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">
                            {{ $p['desc'] }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ $p['url'] }}" class="btn btn-outline btn-sm" style="width: 100%;">
                            <span>Open Page</span>
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
