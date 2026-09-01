@extends('layouts.app')

@section('title', $post->title . ' - AmazonConsultant.ae')

@section('content')
<section class="section-padding" style="background: #ffffff;">
    <div class="container" style="max-width: 860px;">
        <div style="margin-bottom: 24px;">
            <a href="{{ route('blog.index') }}" class="service-link" style="margin-bottom: 16px; display: inline-flex;">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back to Blogs</span>
            </a>
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 12px;">
                <span class="badge badge-primary">{{ $post->category }}</span>
                <span style="font-size: 13px; color: var(--text-muted);"><i class="fa-regular fa-clock"></i> {{ $post->read_time }}</span>
                <span style="font-size: 13px; color: var(--text-muted);"><i class="fa-regular fa-calendar"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
            </div>
            <h1 style="font-size: 36px; font-weight: 800; color: var(--accent); line-height: 1.25; margin-bottom: 20px;">
                {{ $post->title }}
            </h1>
            <div style="font-size: 14px; color: var(--text-muted); padding-bottom: 20px; border-bottom: 1px solid var(--border-color);">
                By <strong>{{ $post->author_name }}</strong> • E-Commerce Strategy Division
            </div>
        </div>

        <!-- Article Content -->
        <article style="font-size: 16px; color: var(--text-dark); line-height: 1.8; margin-bottom: 60px;">
            {!! $post->content !!}
        </article>

        <!-- Pre-Footer CTA -->
        <div style="background: var(--surface-alt); border: 1px solid var(--border-color); border-radius: var(--card-radius); padding: 36px; text-align: center;">
            <h3 style="font-size: 22px; font-weight: 700; color: var(--accent); margin-bottom: 10px;">Want to Automate Your Store Like a Pro?</h3>
            <p style="font-size: 14.5px; color: var(--text-muted); margin-bottom: 20px;">Speak with our senior e-commerce consultants today and launch your turnkey automated store.</p>
            <a href="{{ route('consultation') }}" class="btn btn-primary">
                <span>Request Free Consultation</span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection
