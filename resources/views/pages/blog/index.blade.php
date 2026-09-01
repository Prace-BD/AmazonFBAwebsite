@extends('layouts.app')

@section('title', 'Blogs & E-Commerce Advice - ' . \App\Models\SiteSetting::get('site_name', 'Amazon Consultant AE'))

@section('content')
<section class="section-padding" style="background: radial-gradient(circle at top right, rgba(248, 137, 2, 0.08), transparent 60%), #ffffff;">
    <div class="container">
        <div class="section-header">
            <div class="badge badge-primary">E-Commerce Intelligence</div>
            <h2>Blogs & Strategic E-Commerce Advice</h2>
            <p>Expert articles on marketplace algorithms, Noon seller guides, Amazon PPC tactics, and KDP publishing insights.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 32px;">
            @foreach($blogs as $b)
                <div class="service-card" style="padding: 28px;">
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                            <span class="page-badge">{{ $b->category }}</span>
                            <span style="font-size: 12px; color: var(--text-muted);"><i class="fa-regular fa-clock"></i> {{ $b->read_time }}</span>
                        </div>
                        <h3 style="font-size: 19px; font-weight: 700; line-height: 1.4; margin-bottom: 12px; color: var(--accent);">
                            <a href="{{ route('blog.show', $b->slug) }}">{{ $b->title }}</a>
                        </h3>
                        <p style="font-size: 14px; color: var(--text-muted); line-height: 1.6; margin-bottom: 20px;">
                            {{ $b->excerpt }}
                        </p>
                    </div>
                    <div class="service-card-action">
                        <span style="font-size: 12.5px; color: var(--text-muted);"><i class="fa-solid fa-user-pen" style="color: var(--primary);"></i> {{ $b->author_name }}</span>
                        <a href="{{ route('blog.show', $b->slug) }}" class="service-link">
                            <span>Read Article</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 40px; display: flex; justify-content: center;">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
