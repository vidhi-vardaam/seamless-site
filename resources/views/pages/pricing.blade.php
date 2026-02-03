@extends('layouts.app')

@section('title', 'Pricing - Seamless')
@section('description', 'Transparent pricing designed to scale with your organization.')

@push('styles')
<style>
  .pricing-slider { -webkit-appearance: none; width: 100%; height: 8px; border-radius: 5px; background: linear-gradient(to right, hsl(var(--primary)), hsl(var(--primary))); outline: none; }
  .pricing-slider::-webkit-slider-thumb { -webkit-appearance: none; appearance: none; width: 24px; height: 24px; border-radius: 50%; background: hsl(var(--primary)); cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.2); }
  .pricing-slider::-moz-range-thumb { width: 24px; height: 24px; border-radius: 50%; background: hsl(var(--primary)); cursor: pointer; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.2); }
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
    ['title' => 'Membership lifecycle management', 'description' => 'From onboarding to renewal', 'icon' => 'users'],
    ['title' => 'Member-aware events & registrations', 'description' => 'Pricing that recognizes members', 'icon' => 'calendar'],
    ['title' => 'Learning, CEUs & credentials', 'description' => 'Professional development built-in', 'icon' => 'graduation'],
    ['title' => 'Website integrations', 'description' => 'WordPress, Wix, Webflow', 'icon' => 'globe'],
    ['title' => 'Reporting, APIs & Single Sign-On', 'description' => 'Connect and analyze everything', 'icon' => 'chart'],
    ['title' => 'Ongoing updates & support', 'description' => "We're with you for the long haul", 'icon' => 'headphones'],
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

  $pricingId = 'pricing-' . uniqid();
  $faqId = 'faq-' . uniqid();
@endphp

<div class="min-h-screen bg-background">
  <!-- Hero Section -->
  <section class="relative pt-40 pb-32 overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-background/20"></div>
    <div class="container mx-auto px-6 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <x-scroll-animate animation="fade-up">
          <h1 class="text-5xl md:text-6xl lg:text-7xl font-display text-white mb-6 tracking-tight">
            Transparent pricing, designed to <span class="text-accent">scale with you.</span>
          </h1>
        </x-scroll-animate>

        <x-scroll-animate animation="fade-up" delay="100">
          <p class="text-xl md:text-2xl text-white/90 mb-10 font-light">
            Seamless pricing is based on annual organizational revenue — a clear, public indicator of scale.
          </p>
        </x-scroll-animate>

        <x-scroll-animate animation="fade-up" delay="150">
          <div class="flex justify-center">
            <a href="{{ route('request-demo') }}" class="btn-cta">Request a Demo</a>
          </div>
        </x-scroll-animate>
      </div>
    </div>
  </section>

  <!-- Pricing Tiers Section -->
  <section id="{{ $pricingId }}" class="py-24 md:py-32">
    <div class="container mx-auto px-6">
      <x-scroll-animate animation="fade-up">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-display font-bold text-foreground mb-4">Seamless Platform Subscription</h2>
          <p class="text-xl text-muted-foreground">Billed annually. Full platform included at every level.</p>
        </div>
      </x-scroll-animate>

      <x-scroll-animate animation="fade-up" delay="100">
        <div class="max-w-2xl mx-auto">
          <!-- Price Display -->
          <div class="text-center mb-12">
            <div class="text-6xl md:text-7xl font-display font-bold text-primary mb-2">
              <span id="current-price">${{ str_replace('$', '', $pricingTiers[3]['price']) }}</span>
              <span class="text-2xl font-normal text-muted-foreground ml-2">/ month</span>
            </div>
            <div class="text-xl text-foreground">
              <span id="current-revenue">{{ $pricingTiers[3]['revenue'] }}</span> annual revenue
            </div>
          </div>

          <!-- Slider -->
          <div class="px-4 mb-8">
            <input type="range" id="pricing-slider" class="pricing-slider w-full" min="0" max="{{ count($pricingTiers) - 1 }}" value="3" />
            <div class="flex justify-between mt-4 text-sm text-muted-foreground">
              <span>Under $250K</span>
              <span>$7.5M+</span>
            </div>
          </div>

          <!-- Tier indicators -->
          <div class="flex justify-center gap-2 mb-12 flex-wrap">
            @foreach($pricingTiers as $idx => $tier)
              <button class="pricing-indicator w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $idx === 3 ? 'bg-primary scale-125' : 'bg-border hover:bg-muted-foreground/50' }}" data-index="{{ $idx }}" aria-label="Select {{ $tier['revenue'] }} tier"></button>
            @endforeach
          </div>

          <div class="text-center">
            <a href="{{ route('request-demo') }}" class="group px-8 py-4 bg-primary text-primary-foreground rounded-full font-semibold transition-all duration-300 hover:bg-primary/90 hover:shadow-xl flex items-center justify-center gap-2 mx-auto inline-flex">
              Request a Demo
              <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <p class="text-sm text-muted-foreground mt-4">
              or <a href="#" class="text-primary hover:underline">Talk with Our Team</a>
            </p>
          </div>
        </div>
      </x-scroll-animate>
    </div>
  </section>

  <!-- What's Included Section -->
  <section class="py-24 md:py-32 relative overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/section-6-bg.png') }}')">
    <div class="absolute inset-0 bg-background/60"></div>

    <div class="container mx-auto px-6 relative z-10">
      <x-scroll-animate animation="fade-up">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-display font-bold text-foreground mb-4">What every Seamless subscription includes</h2>
          <p class="text-lg text-muted-foreground">Full platform access at every tier</p>
        </div>
      </x-scroll-animate>

      <div class="max-w-5xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
          @foreach($includedFeatures as $idx => $feature)
            <x-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
              <div class="group p-6 rounded-2xl bg-background border border-border/50 hover:border-primary/30 hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-colors">
                  @if($feature['icon'] === 'users')
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                  @elseif($feature['icon'] === 'calendar')
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                  @elseif($feature['icon'] === 'graduation')
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17.5S6.5 28.747 12 28.747s10-4.745 10-10.247S17.5 6.253 12 6.253z"/></svg>
                  @elseif($feature['icon'] === 'globe')
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20H7m6 0v1m0-4v-5a1 1 0 00-1-1h-4a1 1 0 00-1 1v5m6 0h.01"/></svg>
                  @elseif($feature['icon'] === 'chart')
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                  @else
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                  @endif
                </div>
                <h3 class="text-lg font-semibold text-foreground mb-2">{{ $feature['title'] }}</h3>
                <p class="text-muted-foreground text-sm">{{ $feature['description'] }}</p>
              </div>
            </x-scroll-animate>
          @endforeach
        </div>

        <x-scroll-animate animation="fade-up" delay="600">
          <div class="text-center">
            <div class="inline-flex items-center gap-8 px-8 py-4 rounded-full bg-background border border-border/50 flex-wrap">
              <span class="flex items-center gap-2 text-foreground">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                No modules
              </span>
              <span class="flex items-center gap-2 text-foreground">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                No feature gates
              </span>
              <span class="flex items-center gap-2 text-foreground">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                No surprises
              </span>
            </div>
          </div>
        </x-scroll-animate>
      </div>
    </div>
  </section>

  <!-- Implementation Section -->
  <section class="py-24 md:py-32">
    <div class="container mx-auto px-6">
      <x-scroll-animate animation="fade-up">
        <div class="max-w-3xl mx-auto">
          <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-foreground mb-4">Implementation & Onboarding</h2>
            <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
              Onboarding is a structured implementation process designed to unify data, workflows, and digital experiences — not a quick setup.
            </p>
          </div>

          <div class="space-y-1 mb-8">
            @foreach($implementationTiers as $idx => $tier)
              <x-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
                <div class="flex items-center justify-between py-5 px-6 border-b border-border/50">
                  <span class="text-lg text-foreground">{{ $tier['name'] }}</span>
                  <span class="text-xl font-display font-bold text-primary">{{ $tier['price'] }}</span>
                </div>
              </x-scroll-animate>
            @endforeach
          </div>

          <x-scroll-animate animation="fade-up" delay="300">
            <p class="text-center text-muted-foreground text-lg">We don't rush onboarding. We get it right.</p>
          </x-scroll-animate>
        </div>
      </x-scroll-animate>
    </div>
  </section>

  <!-- Testimonial Section -->
  <section class="py-24 md:py-32 bg-muted/30">
    <div class="container mx-auto px-6">
      <x-scroll-animate animation="fade-up">
        <div class="max-w-3xl mx-auto text-center">
          <blockquote class="text-2xl md:text-3xl font-display text-foreground leading-relaxed mb-8">
            "Moving to Seamless gave us clarity we didn't know we were missing. Our team spends less time managing systems and more time serving members."
          </blockquote>
          <p class="text-muted-foreground">— Operations Director, Professional Association</p>
        </div>
      </x-scroll-animate>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="{{ $faqId }}" class="py-24 md:py-32">
    <div class="container mx-auto px-6">
      <x-scroll-animate animation="fade-up">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-display font-bold text-foreground mb-4">Frequently Asked Questions</h2>
        </div>
      </x-scroll-animate>

      <div class="max-w-3xl mx-auto space-y-4">
        @foreach($faqs as $idx => $faq)
          <x-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
            <div class="faq-accordion border border-border/50 rounded-lg overflow-hidden" data-index="{{ $idx }}">
              <button class="faq-trigger w-full py-6 px-6 text-left flex items-center justify-between hover:bg-muted/30 transition-colors">
                <span class="text-lg font-medium text-foreground">{{ $faq['question'] }}</span>
                <svg class="faq-icon w-5 h-5 text-primary transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
              </button>
              <div class="faq-content hidden overflow-hidden transition-all duration-300 bg-muted/30">
                <div class="pb-6 px-6 pt-0 text-muted-foreground text-base leading-relaxed">{{ $faq['answer'] }}</div>
              </div>
            </div>
          </x-scroll-animate>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Closing Section -->
  <section class="py-24 md:py-32 bg-gradient-to-br from-primary via-primary to-secondary relative overflow-hidden">
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-secondary/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary-foreground/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
      <x-scroll-animate animation="fade-up">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-4xl md:text-5xl font-display font-bold text-primary-foreground mb-6">
            Built for organizations that plan to grow.
          </h2>
          <p class="text-xl text-primary-foreground/80 mb-10 max-w-2xl mx-auto">
            Seamless is designed to support membership organizations over time — without forcing replatforming or renegotiation.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('request-demo') }}" class="group px-8 py-4 bg-white text-primary rounded-full font-semibold transition-all duration-300 hover:bg-white/90 hover:shadow-xl flex items-center justify-center gap-2">
              Request a Demo
              <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-4 border border-white/30 text-white rounded-full font-medium transition-all duration-300 hover:bg-white/10 hover:border-white/50">
              Contact Us
            </a>
          </div>
        </div>
      </x-scroll-animate>
    </div>
  </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const pricingSection = document.getElementById('{{ $pricingId }}');
    const slider = pricingSection.querySelector('#pricing-slider');
    const indicators = pricingSection.querySelectorAll('.pricing-indicator');
    const priceDisplay = pricingSection.querySelector('#current-price');
    const revenueDisplay = pricingSection.querySelector('#current-revenue');

    const tiers = @json($pricingTiers);

    function updatePricing(index) {
      const tier = tiers[index];
      priceDisplay.textContent = tier.price === 'Custom' ? 'Custom' : tier.price;
      revenueDisplay.textContent = tier.revenue;

      indicators.forEach((ind, i) => {
        if (i === index) {
          ind.classList.add('bg-primary', 'scale-125');
          ind.classList.remove('bg-border');
        } else {
          ind.classList.remove('bg-primary', 'scale-125');
          ind.classList.add('bg-border');
        }
      });
    }

    slider.addEventListener('input', (e) => {
      updatePricing(parseInt(e.target.value));
    });

    indicators.forEach((ind, i) => {
      ind.addEventListener('click', () => {
        slider.value = i;
        updatePricing(i);
      });
    });

    // FAQ Accordions
    const faqSection = document.getElementById('{{ $faqId }}');
    const accordions = faqSection.querySelectorAll('.faq-accordion');

    accordions.forEach((accordion, idx) => {
      const trigger = accordion.querySelector('.faq-trigger');
      const content = accordion.querySelector('.faq-content');
      const icon = accordion.querySelector('.faq-icon');

      trigger.addEventListener('click', () => {
        const isOpen = !content.classList.contains('hidden');

        // Close all others
        accordions.forEach(acc => {
          if (acc !== accordion) {
            acc.querySelector('.faq-content').classList.add('hidden');
            acc.querySelector('.faq-content').style.maxHeight = '0px';
            acc.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
          }
        });

        if (isOpen) {
          content.classList.add('hidden');
          content.style.maxHeight = '0px';
          icon.style.transform = 'rotate(0deg)';
        } else {
          content.classList.remove('hidden');
          content.style.maxHeight = content.scrollHeight + 'px';
          icon.style.transform = 'rotate(180deg)';
        }
      });
    });
  });
</script>
@endsection
