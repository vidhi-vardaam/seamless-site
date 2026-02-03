@extends('layouts.app')

@section('title', 'About - Seamless')

@push('styles')
<style>
    :root {
        --primary: 220 90% 56%;
        --secondary: 280 70% 60%;
        --accent: 340 80% 58%;
        --background: 0 0% 100%;
        --foreground: 222.2 84% 4.9%;
        --card: 0 0% 100%;
        --muted: 210 40% 96.1%;
        --border: 214.3 31.8% 91.4%;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: hsl(var(--background));
        color: hsl(var(--foreground));
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
    }

    .font-display {
        font-family: 'Georgia', 'Times New Roman', serif;
        font-weight: 700;
    }

    .container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* Animations */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-up {
        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .animate-delay-100 {
        animation-delay: 0.1s;
    }

    .animate-delay-150 {
        animation-delay: 0.15s;
    }

    .animate-delay-200 {
        animation-delay: 0.2s;
    }

    .animate-delay-300 {
        animation-delay: 0.3s;
    }

    /* Scroll Animation Observer */
    .scroll-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        padding-top: 8rem;
        padding-bottom: 6rem;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        margin-bottom: 1.5rem;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .text-accent {
        color: hsl(var(--accent));
    }

    /* Buttons */
    .btn-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
        color: white;
        border-radius: 9999px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        border-radius: 9999px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
    }

    /* Decorative backgrounds */
    .gradient-blob-1 {
        position: absolute;
        top: 0;
        right: 0;
        width: 500px;
        height: 500px;
        background: linear-gradient(to bottom left, hsla(var(--primary), 0.05), transparent);
        border-radius: 50%;
        filter: blur(80px);
    }

    .gradient-blob-2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 400px;
        height: 400px;
        background: linear-gradient(to top right, hsla(var(--secondary), 0.05), transparent);
        border-radius: 50%;
        filter: blur(80px);
    }

    /* Belief Box */
    .belief-box {
        position: relative;
        padding: 2.5rem;
        border-radius: 1.5rem;
        background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
        width: 100%;
    }

    .belief-box-glow {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 5rem;
        height: 5rem;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(40px);
    }

    .belief-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-shrink: 0;
        text-decoration: none;
    }

    .belief-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }

    .belief-link:hover .belief-icon {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .belief-link:hover .belief-text {
        color: white;
    }

    .belief-text {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.875rem;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    /* Pattern background */
    .dot-pattern {
        position: absolute;
        inset: 0;
        opacity: 0.02;
        background-image: radial-gradient(circle at 1px 1px, hsl(var(--foreground)) 1px, transparent 0);
        background-size: 32px 32px;
    }

    /* Card styles */
    .value-card {
        position: relative;
        height: 100%;
    }

    .value-card-glow {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, hsla(var(--primary), 0.2), hsla(var(--secondary), 0.2));
        border-radius: 1rem;
        opacity: 0;
        transition: opacity 0.5s ease;
        filter: blur(30px);
    }

    .value-card:hover .value-card-glow {
        opacity: 1;
    }

    .value-card-content {
        position: relative;
        height: 100%;
        background-color: hsl(var(--card));
        border: 1px solid hsla(var(--border), 0.5);
        border-radius: 1rem;
        padding: 2rem;
        transition: all 0.5s ease;
    }

    .value-card:hover .value-card-content {
        border-color: hsla(var(--primary), 0.3);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transform: translateY(-4px);
    }

    .value-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--secondary)));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .value-card:hover .value-icon {
        transform: scale(1.1);
    }

    /* Benefit items */
    .benefit-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background-color: hsl(var(--card));
        border-radius: 0.75rem;
        border: 1px solid hsla(var(--border), 0.5);
    }

    .benefit-icon {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background-color: hsla(var(--accent), 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: hsl(var(--accent));
        flex-shrink: 0;
    }

    /* CTA Section */
    .cta-section {
        position: relative;
        padding: 6rem 0;
        overflow: hidden;
    }

    .cta-gradient {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, hsl(var(--primary)), hsl(var(--primary)), hsl(var(--secondary)));
    }

    .cta-glow-1 {
        position: absolute;
        top: 0;
        right: 0;
        width: 24rem;
        height: 24rem;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        filter: blur(80px);
    }

    .cta-glow-2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 20rem;
        height: 20rem;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        filter: blur(80px);
    }

    .btn-white {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        background-color: white;
        color: hsl(var(--primary));
        border-radius: 9999px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-white:hover {
        background-color: rgba(255, 255, 255, 0.9);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transform: translateY(-2px);
    }

    .btn-white:hover .arrow-icon {
        transform: translateX(4px);
    }

    .arrow-icon {
        transition: transform 0.3s ease;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding-top: 6rem;
            padding-bottom: 4rem;
        }

        .belief-box {
            padding: 2rem;
        }

        .belief-link {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    /* Icon styles */
    .lucide {
        width: 1.5rem;
        height: 1.5rem;
        stroke-width: 2;
    }

    .lucide-sm {
        width: 1.25rem;
        height: 1.25rem;
    }

    .lucide-lg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
    <div class="container" style="position: relative; z-index: 10;">
        <div class="scroll-animate" style="max-width: 64rem; margin: 0 auto; text-align: center;">
            <h1 class="hero-title font-display" style="color: white;">
                Built for Membership —
                <span class="text-accent">Not Compromise</span>
            </h1>
            <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.8); line-height: 1.75; margin-bottom: 2rem; max-width: 48rem; margin-left: auto; margin-right: auto;">
                Seamless was created to solve a problem most associations quietly live with every day:
                <span style="color: white; font-weight: 500;"> systems that work, but don't work together.</span>
            </p>
            <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center; align-items: center;">
                <a href="{{ route('request-demo') }}" class="btn-cta">
                    Request a Demo
                </a>
                <a href="{{ route('pricing') }}" class="btn-secondary">
                    See How Pricing Works
                    <svg class="lucide-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Intro Section -->
<section style="padding: 7rem 0; position: relative; overflow: hidden;">
    <!-- Decorative background -->
    <div class="gradient-blob-1"></div>
    <div class="gradient-blob-2"></div>
    
    <div class="container" style="position: relative;">
        <div style="max-width: 80rem; margin: 0 auto; display: flex; flex-direction: column; gap: 3rem;">
            <!-- Problem Statement -->
            <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
                <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7); line-height: 1.75;">
                    For years, AMS platforms have forced organizations into trade-offs — powerful backends paired with 
                    outdated websites, modern design layered on top of disconnected data, membership separated from 
                    events and learning.
                </p>
                <p style="font-size: 1.125rem; color: hsl(var(--foreground)); font-weight: 500; margin-top: 1rem;">
                    The result is complexity behind the scenes and friction for members.
                </p>
            </div>
            
            <!-- Belief Statement -->
            <div class="scroll-animate animate-delay-150">
                <div class="belief-box">
                    <div class="belief-box-glow"></div>
                    <div style="display: flex; flex-direction: column; gap: 1.5rem; position: relative; z-index: 10;">
                        <p class="font-display" style="font-size: 1.875rem; color: white; line-height: 1.2;">
                            We believe associations deserve better.
                        </p>
                        <a href="{{ route('features') }}" class="belief-link">
                            <div class="belief-icon">
                                <svg class="lucide" fill="none" stroke="white" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </div>
                            <span class="belief-text">That's why we built Seamless</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Approach Section -->
<section style="padding: 7rem 0; background-color: hsla(var(--muted), 0.3); position: relative; overflow: hidden;">
    <!-- Subtle pattern -->
    <div class="dot-pattern"></div>
    
    <div class="container" style="position: relative;">
        <div style="max-width: 80rem; margin: 0 auto;">
            <!-- Section Header -->
            <div class="scroll-animate" style="text-align: center; margin-bottom: 4rem;">
                <h2 class="font-display" style="font-size: clamp(1.875rem, 4vw, 3rem); color: hsl(var(--foreground));">
                    Membership is a relationship,
                    <span style="color: hsl(var(--primary));">not a record.</span>
                </h2>
            </div>
            
            <!-- Content Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                <div class="scroll-animate animate-delay-100" style="padding: 2rem; border-radius: 1rem; background-color: hsl(var(--background)); border: 1px solid hsla(var(--border), 0.5); height: 100%;">
                    <div style="width: 3rem; height: 3rem; border-radius: 0.75rem; background: linear-gradient(135deg, hsla(var(--primary), 0.1), hsla(var(--secondary), 0.1)); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg class="lucide" fill="none" stroke="hsl(var(--primary))" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-display" style="font-size: 1.25rem; color: hsl(var(--foreground)); margin-bottom: 0.75rem;">Built on a simple idea</h3>
                    <p style="color: hsl(var(--foreground) / 0.7); line-height: 1.75;">
                        Seamless is a modern, unified AMS platform built around a simple idea: membership is a relationship, not a record. Everything we build starts there.
                    </p>
                </div>
                
                <div class="scroll-animate animate-delay-200" style="padding: 2rem; border-radius: 1rem; background-color: hsl(var(--background)); border: 1px solid hsla(var(--border), 0.5); height: 100%;">
                    <div style="width: 3rem; height: 3rem; border-radius: 0.75rem; background: linear-gradient(135deg, hsla(var(--primary), 0.1), hsla(var(--secondary), 0.1)); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg class="lucide" fill="none" stroke="hsl(var(--primary))" viewBox="0 0 24 24">
                            <ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
                        </svg>
                    </div>
                    <h3 class="font-display" style="font-size: 1.25rem; color: hsl(var(--foreground)); margin-bottom: 0.75rem;">A single, cohesive system</h3>
                    <p style="color: hsl(var(--foreground) / 0.7); line-height: 1.75;">
                        Instead of assembling disconnected modules, Seamless provides a single system that supports the full member lifecycle — and reflects that information instantly across modern websites.
                    </p>
                </div>
            </div>
            
            <!-- Quote Block -->
            <div class="scroll-animate animate-delay-300" style="text-center; margin: 0 auto;">
                <div style="width: 4rem; height: 0.25rem; background-color: hsl(var(--primary)); border-radius: 9999px; margin: 0 auto 1.5rem;"></div>
                <p class="font-display" style="font-size: 1.5rem; color: hsl(var(--foreground)); font-style: italic; line-height: 1.75;">
                    The technology stays in the background. The experience feels continuous.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section style="padding: 6rem 0;">
    <div class="container">
        <div class="scroll-animate" style="text-center; margin-bottom: 4rem;">
            <h2 class="font-display" style="font-size: clamp(2rem, 4vw, 2.5rem); color: hsl(var(--foreground)); margin-bottom: 1rem;">
                What Guides Us
            </h2>
        </div>

        <div style="max-width: 80rem; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                @php
                    $values = [
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>',
                            'title' => 'Seamless',
                            'description' => "We design for continuity. Members and staff shouldn't feel handoffs, workarounds, or system boundaries. When experiences flow naturally, trust follows.",
                            'delay' => '0'
                        ],
                        [
                            'icon' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>',
                            'title' => 'Unified',
                            'description' => 'We believe in one source of truth. Membership data, pricing, access, events, and learning belong in a single system — managed once and reflected everywhere without duplication or syncing.',
                            'delay' => '100'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>',
                            'title' => 'Adaptive',
                            'description' => 'Associations evolve. Platforms should too. Seamless is built to adapt as technologies, websites, and member expectations change — without forcing redesigns, migrations, or disruption.',
                            'delay' => '200'
                        ]
                    ];
                @endphp

                @foreach($values as $value)
                <div class="scroll-animate" style="animation-delay: {{ $value['delay'] }}ms;">
                    <div class="value-card">
                        <div class="value-card-glow"></div>
                        
                        <div class="value-card-content">
                            <div class="value-icon">
                                <svg class="lucide" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $value['icon'] !!}
                                </svg>
                            </div>
                            
                            <h3 class="font-display" style="font-size: 1.5rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                                {{ $value['title'] }}
                            </h3>
                            <p style="color: hsl(var(--foreground) / 0.7); line-height: 1.75;">
                                {{ $value['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Why It Matters Section -->
<section style="padding: 6rem 0; position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; background-image: url('{{ asset('assets/section-6-bg.png') }}')">
    <div class="container">
        <div style="max-width: 48rem; margin: 0 auto;">
            <div class="scroll-animate">
                <h2 class="font-display" style="font-size: clamp(2rem, 4vw, 2.5rem); color: hsl(var(--foreground)); margin-bottom: 2rem;">
                    Why It Matters
                </h2>
            </div>
            
            <div class="scroll-animate animate-delay-100">
                <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7); margin-bottom: 2rem;">
                    When systems are unified:
                </p>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 3rem;">
                @php
                    $benefits = [
                        [
                            'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                            'text' => 'Staff spend less time managing tools',
                            'delay' => '150'
                        ],
                        [
                            'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
                            'text' => 'Members spend less time navigating processes',
                            'delay' => '200'
                        ],
                        [
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>',
                            'text' => 'Organizations gain clarity instead of complexity',
                            'delay' => '250'
                        ]
                    ];
                @endphp

                @foreach($benefits as $benefit)
                <div class="scroll-animate" style="animation-delay: {{ $benefit['delay'] }}ms;">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <svg class="lucide-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $benefit['icon'] !!}
                            </svg>
                        </div>
                        <p style="color: hsl(var(--foreground)); font-weight: 500;">{{ $benefit['text'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="scroll-animate animate-delay-300">
                <div style="background-color: hsla(var(--background), 0.8); backdrop-filter: blur(8px); border-radius: 1rem; padding: 2rem; border: 1px solid hsla(var(--border), 0.5);">
                    <p class="font-display" style="font-size: 1.25rem; color: hsl(var(--foreground)); text-align: center;">
                        The best AMS is one members rarely think about — because it simply works.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Built for What Comes Next -->
<section style="padding: 6rem 0;">
    <div class="container">
        <div style="max-width: 48rem; margin: 0 auto; text-align: center;">
            <div class="scroll-animate">
                <h2 class="font-display" style="font-size: clamp(2rem, 4vw, 2.5rem); color: hsl(var(--foreground)); margin-bottom: 2rem;">
                    Built for What Comes Next
                </h2>
            </div>
            
            <div class="scroll-animate animate-delay-100">
                <p style="font-size: 1.125rem; color: hsl(var(--foreground) / 0.7); line-height: 1.75; margin-bottom: 2rem;">
                    Seamless is intentionally designed for modern organizations that care about longevity 
                    as much as functionality. Whether you're running WordPress, Wix, Webflow, or whatever 
                    comes next, Seamless is built to support change without starting over.
                </p>
            </div>
            
            <div class="scroll-animate animate-delay-150">
                <div style="text-align: center; max-width: 32rem; margin: 0 auto 3rem;">
                    <div style="width: 4rem; height: 0.25rem; background-color: hsl(var(--secondary)); border-radius: 9999px; margin: 0 auto 1.5rem;"></div>
                    <p style="color: hsl(var(--foreground)); font-style: italic;">
                        This isn't software designed for yesterday's associations.<br>
                        It's infrastructure for the future of membership.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-gradient"></div>
    <div class="cta-glow-1"></div>
    <div class="cta-glow-2"></div>
    
    <div class="container" style="position: relative; z-index: 10;">
        <div class="scroll-animate" style="max-width: 48rem; margin: 0 auto; text-align: center;">
            <p style="color: rgba(255, 255, 255, 0.7); letter-spacing: 0.1em; text-transform: uppercase; font-size: 0.875rem; margin-bottom: 1rem;">
                Seamless
            </p>
            <h2 class="font-display" style="font-size: clamp(2rem, 4vw, 2.5rem); color: white; margin-bottom: 1.5rem;">
                A modern, unified AMS platform built for now — and what's to come.
            </h2>
            
            <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center; margin-top: 2.5rem; align-items: center;">
                <a href="{{ route('request-demo') }}" class="btn-white">
                    Request a Demo
                    <svg class="lucide-sm arrow-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('contact') }}" class="btn-secondary">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Scroll animation observer
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all elements with scroll-animate class
        document.querySelectorAll('.scroll-animate').forEach(element => {
            observer.observe(element);
        });
    });
</script>
@endpush
