@extends('layouts.app')

@section('title', 'Pricing - Seamless')

@push('styles')
  <style>
    /* Hero Section Styles */
    .pricing-hero {
      position: relative;
      padding-top: 10rem;
      padding-bottom: 8rem;
      overflow: hidden;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .pricing-hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom, transparent, transparent, rgba(0, 0, 0, 0.2));
    }

    .pricing-hero-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
      position: relative;
      z-index: 10;
    }

    .pricing-hero-content {
      max-width: 56rem;
      margin: 0 auto;
      text-align: center;
    }

    .pricing-hero-title {
      font-size: clamp(2.5rem, 6vw, 4.5rem);
      font-weight: 700;
      color: white;
      margin-bottom: 1.5rem;
      letter-spacing: -0.02em;
    }

    .pricing-hero-subtitle {
      font-size: 1.125rem;
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 2.5rem;
      line-height: 1.75;
    }

    .pricing-hero-buttons {
      display: flex;
      justify-content: center;
    }

    /* Pricing Tiers Section Styles */
    .pricing-tiers {
      padding: 6rem 0;
    }

    @media (min-width: 768px) {
      .pricing-tiers {
        padding: 8rem 0;
      }
    }

    .pricing-tiers-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    .pricing-tiers-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .pricing-tiers-title {
      font-size: clamp(1.875rem, 4vw, 3rem);
      font-weight: 700;
      color: hsl(var(--foreground));
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .pricing-tiers-title {
        font-size: clamp(1.875rem, 4vw, 3rem);
      }
    }

    .pricing-tiers-subtitle {
      font-size: 1.125rem;
      color: hsl(var(--muted-foreground));
      line-height: 1.75;
    }

    .pricing-tiers-content {
      max-width: 42rem;
      margin: 0 auto;
    }

    .pricing-display {
      text-align: center;
      margin-bottom: 3rem;
    }

    .pricing-display-price {
      font-size: clamp(2.5rem, 6vw, 4.5rem);
      font-weight: 700;
      color: hsl(var(--primary));
      margin-bottom: 0.5rem;
    }

    @media (min-width: 768px) {
      .pricing-display-price {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
      }
    }

    .pricing-display-price-suffix {
      font-size: 1.5rem;
      font-weight: 400;
      color: hsl(var(--muted-foreground));
      margin-left: 0.5rem;
    }

    .pricing-display-revenue {
      font-size: 1.25rem;
      color: hsl(var(--foreground));
    }

    .pricing-slider-wrapper {
      padding: 0 1rem;
      margin-bottom: 2rem;
    }

    .pricing-slider {
      -webkit-appearance: none;
      appearance: none;
      width: 100%;
      height: 8px;
      border-radius: 5px;
      background: linear-gradient(to right, hsl(var(--primary)), hsl(var(--primary)));
      outline: none;
      cursor: pointer;
    }

    .pricing-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: hsl(var(--primary));
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s;
    }

    .pricing-slider::-webkit-slider-thumb:hover {
      transform: scale(1.1);
    }

    .pricing-slider::-moz-range-thumb {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: hsl(var(--primary));
      cursor: pointer;
      border: none;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s;
    }

    .pricing-slider::-moz-range-thumb:hover {
      transform: scale(1.1);
    }

    .pricing-slider-labels {
      display: flex;
      justify-content: space-between;
      margin-top: 1rem;
      font-size: 0.875rem;
      color: hsl(var(--muted-foreground));
    }

    .pricing-tier-indicators {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 3rem;
    }

    .tier-indicator {
      width: 0.625rem;
      height: 0.625rem;
      border-radius: 9999px;
      transition: all 0.3s ease;
      background-color: hsl(var(--border));
      border: none;
      cursor: pointer;
      padding: 0;
    }

    .tier-indicator:hover {
      background-color: hsl(var(--muted-foreground) / 0.5);
    }

    .tier-indicator.active {
      background-color: hsl(var(--primary));
      transform: scale(1.25);
    }

    .pricing-cta-wrapper {
      text-align: center;
    }



    .pricing-cta-text {
      font-size: 0.875rem;
      color: hsl(var(--muted-foreground));
      margin-top: 1rem;
    }

    .pricing-cta-text a {
      color: hsl(var(--primary));
      text-decoration: none;
    }

    .pricing-cta-text a:hover {
      text-decoration: underline;
    }

    /* What's Included Section Styles */
    .whats-included {
      padding: 6rem 0;
      position: relative;
      overflow: hidden;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    @media (min-width: 768px) {
      .whats-included {
        padding: 8rem 0;
      }
    }

    .whats-included-overlay {
      position: absolute;
      inset: 0;
      background-color: rgba(255, 255, 255, 0.6);
    }

    .whats-included-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
      position: relative;
      z-index: 10;
    }

    .whats-included-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .whats-included-title {
      font-size: clamp(1.875rem, 4vw, 3rem);
      font-weight: 700;
      color: hsl(var(--foreground));
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .whats-included-title {
        font-size: clamp(1.875rem, 4vw, 3rem);
      }
    }

    .whats-included-subtitle {
      font-size: 1.125rem;
      color: hsl(var(--muted-foreground));
    }

    .whats-included-content {
      max-width: 60rem;
      margin: 0 auto;
    }

    .features-grid {
      display: grid;
      gap: 1.5rem;
      margin-bottom: 4rem;
    }

    @media (min-width: 768px) {
      .features-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 1024px) {
      .features-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    .feature-card {
      padding: 1.5rem;
      border-radius: 1rem;
      background-color: hsl(var(--background));
      border: 1px solid hsl(var(--border) / 0.5);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      border-color: hsl(var(--primary) / 0.3);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: hsl(var(--primary) / 0.1);
      transition: background-color 0.3s;
      margin-bottom: 1rem;
    }

    .feature-card:hover .feature-icon {
      background-color: hsl(var(--primary) / 0.2);
    }

    .feature-icon svg {
      width: 1.5rem;
      height: 1.5rem;
      color: hsl(var(--primary));
    }

    .feature-card-title {
      font-size: 1.125rem;
      font-weight: 600;
      color: hsl(var(--foreground));
      margin-bottom: 0.5rem;
    }

    .feature-card-description {
      color: hsl(var(--muted-foreground));
      font-size: 0.875rem;
    }

    .features-footer {
      text-align: center;
    }

    .features-badges {
      display: inline-flex;
      align-items: center;
      gap: 2rem;
      padding: 1rem 2rem;
      border-radius: 9999px;
      background-color: hsl(var(--background));
      border: 1px solid hsl(var(--border) / 0.5);
    }

    .feature-badge {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: hsl(var(--foreground));
    }

    .feature-badge svg {
      width: 1.25rem;
      height: 1.25rem;
      color: hsl(var(--primary));
    }

    .feature-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: hsl(var(--primary) / 0.1);
      transition: background-color 0.3s;
    }

    .feature-card:hover .feature-icon {
      background-color: hsl(var(--primary) / 0.2);
    }

    /* Implementation Section Styles */
    .implementation {
      padding: 6rem 0;
    }

    @media (min-width: 768px) {
      .implementation {
        padding: 8rem 0;
      }
    }

    .implementation-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    .implementation-content {
      max-width: 48rem;
      margin: 0 auto;
    }

    .implementation-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .implementation-title {
      font-size: 2.25rem;
      font-weight: 700;
      color: hsl(var(--foreground));
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .implementation-title {
        font-size: 3rem;
      }
    }

    .implementation-subtitle {
      font-size: 1.25rem;
      color: hsl(var(--muted-foreground));
      max-width: 42rem;
      margin: 0 auto;
    }

    .implementation-tiers {
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
      margin-bottom: 2rem;
    }

    .implementation-tier {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid hsl(var(--border) / 0.5);
    }

    .implementation-tier-name {
      font-size: 1.125rem;
      color: hsl(var(--foreground));
    }

    .implementation-tier-price {
      font-size: 1.25rem;
      font-weight: 700;
      color: hsl(var(--primary));
    }

    .implementation-footer {
      text-align: center;
      color: hsl(var(--muted-foreground));
      font-size: 1.125rem;
    }

    /* Testimonial Section Styles */
    .testimonial {
      padding: 6rem 0;
      background-color: hsl(var(--muted) / 0.3);
    }

    @media (min-width: 768px) {
      .testimonial {
        padding: 8rem 0;
      }
    }

    .testimonial-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    .testimonial-content {
      max-width: 48rem;
      margin: 0 auto;
      text-align: center;
    }

    .testimonial-quote {
      font-size: 1.5rem;
      font-weight: 400;
      color: hsl(var(--foreground));
      line-height: 2.05rem;
      margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
      .testimonial-quote {
        font-size: 1.875rem;
      }
    }

    .testimonial-author {
      color: hsl(var(--muted-foreground));
    }

    /* FAQ Section Styles */
    .faq {
      padding: 6rem 0;
    }

    @media (min-width: 768px) {
      .faq {
        padding: 8rem 0;
      }
    }

    .faq-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    .faq-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .faq-title {
      font-size: 2.25rem;
      font-weight: 700;
      color: hsl(var(--foreground));
      margin-bottom: 1rem;
    }

    @media (min-width: 768px) {
      .faq-title {
        font-size: 3rem;
      }
    }

    .faq-list {
      max-width: 48rem;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
    }

    .accordion-item {
      background-color: white;
      border: 1px solid hsl(var(--border));
      border-radius: 0.75rem;
      transition: all 0.3s ease;
    }

    .accordion-item:hover {
      border-color: hsl(var(--border) / 0.8);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .accordion-item.active {
      border-color: hsl(var(--border) / 0.8);
    }

    .accordion-header {
      cursor: pointer;
      padding: 1.75rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      user-select: none;
    }

    .accordion-question {
      font-size: 1.125rem;
      font-weight: 600;
      color: hsl(var(--foreground));
      padding-right: 2rem;
    }

    .accordion-icon {
      width: 1.25rem;
      height: 1.25rem;
      transition: transform 0.3s ease;
      color: hsl(var(--muted-foreground));
      flex-shrink: 0;
    }

    .accordion-item.active .accordion-icon {
      transform: rotate(180deg);
    }

    .accordion-content {
      max-height: 0;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      padding: 0 2rem;
    }

    .accordion-item.active .accordion-content {
      max-height: 500px;
      padding: 0 2rem 2rem 2rem;
    }

    .accordion-answer {
      color: #64748b;
      line-height: 1.25;
      font-size: 1rem;
    }

    /* Closing Section Styles */
    .closing {
      padding: 8rem 0;
      position: relative;
      overflow: hidden;
      background: linear-gradient(162deg, hsl(var(--primary)), hsl(var(--secondary)));
      border-top: 1px solid hsl(var(--border) / 0.1);
    }

    .accordion-item.scroll-animate.active {
    background: #FBFBFC;
}

    @media (min-width: 768px) {
      .closing {
        padding: 8rem 0;
      }
    }

    .closing-glow-1 {
      position: absolute;
      top: 0;
      left: 25%;
      width: 24rem;
      height: 24rem;
      background-color: hsl(var(--secondary) / 0.2);
      border-radius: 9999px;
      filter: blur(80px);
    }

    .closing-glow-2 {
      position: absolute;
      bottom: 0;
      right: 25%;
      width: 24rem;
      height: 24rem;
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 9999px;
      filter: blur(80px);
    }

    .closing-container {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 1.5rem;
      position: relative;
      z-index: 10;
    }

    .closing-content {
      max-width: 48rem;
      margin: 0 auto;
      text-align: center;
    }

    .closing-title {
      font-size: clamp(2.5rem, 6vw, 3.1rem);
      font-weight: 700;
      color: white;
      margin-bottom: 1.5rem;
      letter-spacing: -0.02em;
    }

    .closing-text {
      font-size: 1.125rem;
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 3rem;
      max-width: 42rem;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.75;
    }

    .closing-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
    }
  </style>
@endpush

@section('content')

  @php
    $pricingTiers = [
      ['revenue' => 'Under $250K', 'price' => '$750'],
      ['revenue' => '$250K – $500K', 'price' => '$950'],
      ['revenue' => '$500K – $1M', 'price' => '$1,250'],
      ['revenue' => '$1M – $2M', 'price' => '$1,650'],
      ['revenue' => '$2M – $3.5M', 'price' => '$2,250'],
      ['revenue' => '$3.5M – $5M', 'price' => '$2,950'],
      ['revenue' => '$5M – $7.5M', 'price' => '$3,650'],
      ['revenue' => '$7.5M+', 'price' => 'Custom'],
    ];

    $includedFeatures = [
      ['title' => 'Membership lifecycle management', 'description' => 'From onboarding to renewal'],
      ['title' => 'Member-aware events & registrations', 'description' => 'Pricing that recognizes members'],
      ['title' => 'Learning, CEUs & credentials', 'description' => 'Professional development built-in'],
      ['title' => 'Website integrations', 'description' => 'WordPress, Wix, Webflow'],
      ['title' => 'Reporting, APIs & Single Sign-On', 'description' => 'Connect and analyze everything'],
      ['title' => 'Ongoing updates & support', 'description' => "We're with you for the long haul"],
    ];

    $implementationTiers = [
      ['name' => 'Core Implementation', 'price' => '$7,500'],
      ['name' => 'Advanced Migration & Integrations', 'price' => '$12,000–$18,000'],
      ['name' => 'Enterprise / Multi-System', 'price' => '$20,000+'],
    ];

    $faqs = [
      ['question' => 'Why is pricing based on annual revenue?', 'answer' => 'Annual organizational revenue is a transparent, publicly available metric that reflects the true scale and complexity of your operations. It ensures pricing is fair and proportional — without arbitrary feature gates or usage limits.'],
      ['question' => 'Do features change by pricing tier?', 'answer' => 'No. Every Seamless subscription includes the full platform. There are no modules to unlock, no premium tiers, and no feature negotiations. You get everything from day one.'],
      ['question' => 'What happens if our revenue changes?', 'answer' => "Pricing adjusts at renewal to reflect your organization's growth. There are no mid-term disruptions, surprise fees, or forced migrations. Seamless scales with you."],
      ['question' => 'Is there a long-term contract?', 'answer' => 'Seamless subscriptions are billed annually. We believe in earning your trust year over year through transparency, reliability, and ongoing value — not lock-in.'],
      ['question' => 'Does Seamless support modern websites?', 'answer' => 'Yes. Seamless integrates directly with WordPress, Wix, and Webflow, allowing you to maintain a modern web presence while running your membership operations from a unified backend.'],
      ['question' => 'What support is included?', 'answer' => 'Professional onboarding and ongoing support are included at every subscription level. Our team is committed to helping you succeed — not upselling you on support packages.'],
    ];
  @endphp

  <!-- Hero Section -->
  <section class="pricing-hero pricint-hero-section" style="background-image: url('{{ asset('assets/inner-page-header.png') }}');">
    <div class="pricing-hero-overlay"></div>
    <div class="pricing-hero-container">
      <div class="pricing-hero-content scroll-animate">
        <h1 class="hero-title pricing-hero-title">
          Transparent pricing, designed to <span class="text-accent">scale with you.</span>
        </h1>
        <p class="pricing-hero-subtitle">
          Seamless pricing is based on annual organizational revenue — a clear, public indicator of scale.
        </p>
        <div class="pricing-hero-buttons">
          <a href="{{ route('request-demo') }}" class="btn-cta">
            Request a Demo
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Tiers Section -->
  <section class="pricing-tiers pricing-tiers-section">
    <div class="pricing-tiers-container">
      <div class="pricing-tiers-header scroll-animate">
        <h2 class="pricing-tiers-title">
          Seamless Platform Subscription
        </h2>
        <p class="pricing-tiers-subtitle">
          Billed annually. Full platform included at every level.
        </p>
      </div>

      <div class="pricing-tiers-content scroll-animate" style="animation-delay: 100ms;">
        <!-- Price Display -->
        <div class="pricing-display">
          <div id="priceDisplay" class="pricing-display-price">
            $1,650<span class="pricing-display-price-suffix">/ month</span>
          </div>
          <div id="revenueDisplay" class="pricing-display-revenue">
            $1M – $2M annual revenue
          </div>
        </div>

        <!-- Slider -->
        <div class="pricing-slider-wrapper">
          <input type="range" id="pricingSlider" class="pricing-slider" min="0" max="7" value="3" step="1" />
          <div class="pricing-slider-labels">
            <span>Under $250K</span>
            <span>$7.5M+</span>
          </div>
        </div>

        <!-- Tier Indicators -->
        <div class="pricing-tier-indicators">
          @for ($i = 0; $i < count($pricingTiers); $i++)
            <button class="tier-indicator {{ $i === 3 ? 'active' : '' }}" data-tier="{{ $i }}"
              aria-label="Select {{ $pricingTiers[$i]['revenue'] }} tier"></button>
          @endfor
        </div>

        <div class="pricing-cta-wrapper">
          <a href="{{ route('request-demo') }}" class="btn-cta bg-primary">
            Request a Demo
            <svg class="lucide-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
          <p class="pricing-cta-text">
            or <a href="#">Talk with Our Team</a>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- What's Included Section -->
  <section class="whats-included pricing-whats-included-section" style="background-image: url('{{ asset('assets/section-6-bg.png') }}');">
    <div class="whats-included-overlay"></div>

    <div class="whats-included-container">
      <div class="whats-included-header scroll-animate">
        <h2 class="whats-included-title">
          What every Seamless subscription includes
        </h2>
        <p class="whats-included-subtitle">
          Full platform access at every tier
        </p>
      </div>

      <div class="whats-included-content">
        <div class="features-grid">
          @foreach ($includedFeatures as $index => $feature)
            <div class="feature-card scroll-animate" style="animation-delay: {{ $index * 100 }}ms;">
              <div class="feature-icon">
                @if ($feature['title'] === 'Membership lifecycle management')
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-6 h-6 text-primary"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                @elseif ($feature['title'] === 'Member-aware events & registrations')
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-6 h-6 text-primary"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                @elseif ($feature['title'] === 'Learning, CEUs & credentials')
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap w-6 h-6 text-primary"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"></path><path d="M22 10v6"></path><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path></svg>
                @elseif ($feature['title'] === 'Website integrations')
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe w-6 h-6 text-primary"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path><path d="M2 12h20"></path></svg>
                @elseif ($feature['title'] === 'Reporting, APIs & Single Sign-On')
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column w-6 h-6 text-primary"><path d="M3 3v16a2 2 0 0 0 2 2h16"></path><path d="M18 17V9"></path><path d="M13 17V5"></path><path d="M8 17v-3"></path></svg>
                @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-headphones w-6 h-6 text-primary"><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"></path></svg>
                @endif
              </div>
              <h3 class="feature-card-title">
                {{ $feature['title'] }}
              </h3>
              <p class="feature-card-description">
                {{ $feature['description'] }}
              </p>
            </div>
          @endforeach
        </div>

        <div class="features-footer scroll-animate" style="animation-delay: 600ms;">
          <div class="features-badges">
            <span class="feature-badge">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
              </svg>
              No modules
            </span>
            <span class="feature-badge">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
              </svg>
              No feature gates
            </span>
            <span class="feature-badge">
              <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
              </svg>
              No surprises
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Implementation Section -->
  <section class="implementation pricing-implementation-section">
    <div class="implementation-container">
      <div class="implementation-content scroll-animate">
        <div class="implementation-header">
          <h2 class="implementation-title">
            Implementation & Onboarding
          </h2>
          <p class="implementation-subtitle">
            Onboarding is a structured implementation process designed to unify data, workflows, and digital experiences —
            not a quick setup.
          </p>
        </div>

        <div class="implementation-tiers">
          @foreach ($implementationTiers as $index => $tier)
            <div class="implementation-tier scroll-animate" style="animation-delay: {{ $index * 100 }}ms;">
              <span class="implementation-tier-name">
                {{ $tier['name'] }}
              </span>
              <span class="implementation-tier-price">
                {{ $tier['price'] }}
              </span>
            </div>
          @endforeach
        </div>

        <p class="implementation-footer scroll-animate" style="animation-delay: 300ms;">
          We don't rush onboarding. We get it right.
        </p>
      </div>
    </div>
  </section>

  <!-- Testimonial Section -->
  <section class="testimonial pricing-testimonial-section">
    <div class="testimonial-container">
      <div class="testimonial-content scroll-animate">
        <blockquote class="testimonial-quote">
          "Moving to Seamless gave us clarity we didn't know we were missing. Our team spends less time managing systems
          and more time serving members."
        </blockquote>
        <p class="testimonial-author">
          — Operations Director, Professional Association
        </p>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq pricing-faq-section">
    <div class="faq-container">
      <div class="faq-header scroll-animate">
        <h2 class="faq-title">
          Frequently Asked Questions
        </h2>
      </div>

      <div class="faq-list">
        @foreach ($faqs as $index => $faq)
          <div class="accordion-item scroll-animate {{ $index === 0 ? 'active' : '' }}" style="animation-delay: {{ $index * 100 }}ms;"
            data-index="{{ $index }}">
            <div class="accordion-header" onclick="toggleAccordion(this)">
              <span class="accordion-question">{{ $faq['question'] }}</span>
              <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
            <div class="accordion-content accordion-answer">
              {{ $faq['answer'] }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Closing Section -->
  <section class="closing pricing-closing-section">
    <div class="closing-glow-1"></div>
    <div class="closing-glow-2"></div>

    <div class="closing-container">
      <div class="closing-content scroll-animate">
        <h2 class="closing-title">
          Built for organizations that plan to grow.
        </h2>
        <p class="closing-text">
          Seamless is designed to support membership organizations over time — without forcing replatforming or
          renegotiation.
        </p>
        <div class="closing-buttons">
          <a href="{{ route('request-demo') }}" class="btn-white">
            Request a Demo
            <svg class="lucide-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
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
    const pricingTiers = @json($pricingTiers);

    const slider = document.getElementById('pricingSlider');
    const priceDisplay = document.getElementById('priceDisplay');
    const revenueDisplay = document.getElementById('revenueDisplay');
    const indicators = document.querySelectorAll('.tier-indicator');

    function updatePricing(index) {
      const tier = pricingTiers[index];
      const price = tier.price;
      const displayPrice = price === 'Custom' ? price : price + '<span class="pricing-display-price-suffix">/ month</span>';

      priceDisplay.innerHTML = displayPrice;
      revenueDisplay.textContent = tier.revenue + ' annual revenue';

      // Update indicators
      indicators.forEach((indicator, i) => {
        if (i === index) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });

      // Update slider track background
      const min = parseInt(slider.min) || 0;
      const max = parseInt(slider.max) || 7;
      const percentage = ((index - min) / (max - min)) * 100;
      slider.style.background = `linear-gradient(to right, hsl(var(--primary)) ${percentage}%, hsl(var(--secondary)) ${percentage}%)`;
    }

    slider.addEventListener('input', (e) => {
      updatePricing(parseInt(e.target.value));
    });

    indicators.forEach((indicator) => {
      indicator.addEventListener('click', (e) => {
        const tier = parseInt(e.target.dataset.tier);
        slider.value = tier;
        updatePricing(tier);
      });
    });

    // Scroll animation
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, observerOptions);

    document.querySelectorAll('.scroll-animate').forEach(el => {
      observer.observe(el);
    });

    // Accordion toggle
    function toggleAccordion(header) {
      const item = header.parentElement;
      const isActive = item.classList.contains('active');

      // Close all other accordions
      document.querySelectorAll('.accordion-item.active').forEach(el => {
        if (el !== item) {
          el.classList.remove('active');
        }
      });

      // Toggle current
      item.classList.toggle('active');
    }

    // Initialize pricing
    updatePricing(parseInt(slider.value));
  </script>
@endpush