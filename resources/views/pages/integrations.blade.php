@extends('layouts.app')

@section('title', 'Integrations - Seamless')
@section('description', 'Connect Seamless with the tools you already use to create a unified management ecosystem.')

@section('content')
  @php
    $stats = [
      ['value' => '15+', 'label' => 'Years of Experience'],
      ['value' => '40%', 'label' => 'Month-over-Month Growth'],
      ['value' => '50K+', 'label' => 'Successful Events'],
      ['value' => '24', 'label' => 'Response Time (Hours)'],
    ];

    $documentationCards = [
      ['title' => 'Getting Started', 'description' => 'Learn the basics and set up your first integration in minutes.', 'icon' => 'book'],
      ['title' => 'API Reference', 'description' => 'Complete API documentation with code examples and endpoints.', 'icon' => 'code'],
      ['title' => 'Integration Guides', 'description' => 'Step-by-step guides for connecting your favorite tools.', 'icon' => 'file'],
      ['title' => 'Best Practices', 'description' => 'Tips and strategies for optimizing your workflow.', 'icon' => 'lightbulb'],
      ['title' => 'Video Tutorials', 'description' => 'Watch our video series to master every feature of Seamless.', 'icon' => 'play'],
      ['title' => 'Developer Tools', 'description' => 'SDKs, webhooks, and developer resources for custom integrations.', 'icon' => 'wrench'],
    ];

    $integrationCategories = [
      ['title' => 'Accounting', 'description' => 'Remove risk, improve accuracy, and save staff time while maintaining impeccable books.', 'tools' => ['QuickBooks', 'Stripe', 'QuickBooks Payments']],
      ['title' => 'Analytics & Reporting', 'description' => 'Make more effective business decisions with advanced data analytics.', 'tools' => ['Google Analytics']],
      ['title' => 'Automation & Productivity', 'description' => 'Connect your member data to automate workflows and keep data synchronized.', 'tools' => ['Asana', 'Dropbox', 'Excel', 'Google Calendar', 'Google Drive', 'Slack', 'Trello', 'Zapier', 'Salesforce', 'Microsoft Teams']],
      ['title' => 'Online Community', 'description' => 'Connect with your members and help them connect with one another.', 'tools' => ['Breezio', 'Forj', 'Higher Logic Thrive', 'Sengii']],
      ['title' => 'Event Management', 'description' => 'Augment native event management with specialized event platforms.', 'tools' => ['Cvent', 'CrowdCompass', 'eShow', 'Fielddrive', 'Map Dynamics', 'MobileUp', 'Showcare', 'Streampoint']],
      ['title' => 'Learning Management', 'description' => 'Take your educational programs online with a full-featured LMS.', 'tools' => ['BlueSky eLearn', 'Brightspace', 'Docebo', 'LearnUpon', 'MapleLMS', 'Oasis LMS']],
      ['title' => 'Marketing & Communications', 'description' => 'Create authentic two-way communication with your members at scale.', 'tools' => ['Mailchimp', 'Constant Contact', 'HubSpot', 'SendGrid', 'Gmail', 'Office 365', 'SurveyMonkey', 'Vimeo', 'YouTube', 'WordPress']],
      ['title' => 'Video Conferencing', 'description' => 'Gather your members virtually for education, networking, or governance meetings.', 'tools' => ['Zoom', 'Webex', 'GoToWebinar']],
    ];

    $id = 'integrations-' . uniqid();
  @endphp

  <div class="integrations-page">
    <section class="hero-inner" style="background-image: url('{{ asset('assets/inner-page-header.png') }}')">
      <div class="hero-inner-overlay"></div>
      <div class="container relative z-10">
        <div class="hero-content-inner">
          <x-ui.scroll-animate animation="fade-up">
            <h1 class="hero-title font-display tracking-tight">
              Seamless Management, <span class="text-accent">Successful Events</span>
            </h1>
          </x-ui.scroll-animate>

          <x-ui.scroll-animate animation="fade-up" delay="100">
            <p class="hero-subtitle">
              Connect Seamless with the tools you already use to create a unified management ecosystem.
            </p>
            </x-scroll-animate>

            <x-ui.scroll-animate animation="fade-up" delay="200">
              <div class="hero-actions">
                <button class="btn-white-footer font-semibold">
                  Explore Integrations
                  <svg class="btn-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                  </svg>
                </button>
                <button class="btn-outline-footer">View
                  Documentation</button>
              </div>
              </x-scroll-animate>
        </div>
      </div>
    </section>

    <!-- Connect with Leading Software -->
    <section class="section-software">
      <div class="container">
        <div class="software-grid">
          <x-ui.scroll-animate animation="fade-right">
            <div>
              <h2 class="software-title font-display text-foreground">
                Connect with Leading Software
                <span class="text-gradient"> Effortlessly</span>
              </h2>
              <p class="software-text">
                Seamless links with top-tier software providers through powerful APIs and seamless integrations.
              </p>
              <p class="text-muted-foreground">
                The result? A platform that combines the ease of an all-in-one solution with the flexibility to leverage
                the best tools for every task — giving you efficiency without compromise.
              </p>
            </div>
          </x-ui.scroll-animate>

          <x-ui.scroll-animate animation="fade-left" delay="100">
            <div class="video-container">
              <div class="video-glow"></div>
              <video autoplay muted loop playsinline class="video-element">
                <source src="{{ asset('videos/product-demo.mp4') }}" type="video/mp4" />
              </video>
            </div>
          </x-ui.scroll-animate>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="section-stats">
      <div class="container">
        <div class="stats-grid">
          @foreach($stats as $idx => $stat)
            <x-ui.scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
              <div class="stat-item">
                <div class="stat-value">{{ $stat['value'] }}</div>
                <div class="stat-label">{{ $stat['label'] }}</div>
              </div>
            </x-ui.scroll-animate>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Documentation Section -->
    <section class="section-documentation" style="background-image: url('{{ asset('assets/section-6-bg.png') }}')">
      <div class="container relative">
        <x-ui.scroll-animate animation="fade-up">
          <div class="doc-header">
            <span class="badge-accent">Integration Tools</span>
            <h2 class="software-title font-display text-foreground">Comprehensive Documentation</h2>
            <p class="software-text max-w-2xl mx-auto">
              Everything you need to integrate, customize, and optimize your management platform.
            </p>
          </div>
        </x-ui.scroll-animate>

        <div class="doc-grid">
          @foreach($documentationCards as $idx => $card)
            <x-ui.scroll-animate animation="fade-up" delay="{{ $idx * 75 }}">
              <div class="doc-card">
                <div class="doc-icon-wrapper">
                  @if($card['icon'] === 'book')
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                  @elseif($card['icon'] === 'code')
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 18 6-6-6-6" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 6-6 6 6 6" />
                    </svg>
                  @elseif($card['icon'] === 'file')
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 13h4" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 17h4" />
                    </svg>
                  @elseif($card['icon'] === 'lightbulb')
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 14c.2-1 .7-1.7 1.5-2.5 1-1 1.5-2 1.5-3.5 0-3.33-2.67-5-6-5s-6 2.67-6 5c0 1.5.5 2.5 1.5 3.5.8.8 1.3 1.5 1.5 2.5" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 18h6" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 22h4" />
                    </svg>
                  @elseif($card['icon'] === 'play')
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <circle cx="12" cy="12" r="10" stroke-width="2" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 8 6 4-6 4V8z" />
                    </svg>
                  @else
                    <svg class="doc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                    </svg>
                  @endif
                </div>
                <h3 class="doc-title font-display">{{ $card['title'] }}</h3>
                <p class="doc-description">{{ $card['description'] }}</p>
                <button class="doc-link">
                  Learn More
                  <svg class="doc-link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                  </svg>
                </button>
              </div>
            </x-ui.scroll-animate>
          @endforeach
        </div>

        <x-ui.scroll-animate animation="fade-up" delay="500">
          <div class="flex-center mt-12 gap-4 flex-col-sm">
            <button class="btn-outline">View Full Documentation</button>
            <a href="{{ route('contact') }}" class="btn-cta inline-block">Contact Support</a>
          </div>
        </x-ui.scroll-animate>
      </div>
    </section>

    <!-- Featured Integrations -->
    <section id="{{ $id }}" class="section-featured">
      <div class="featured-bg-glow-1"></div>
      <div class="featured-bg-glow-2"></div>

      <div class="container relative">
        <x-ui.scroll-animate animation="fade-up">
          <div class="featured-header">
            <span class="badge-primary">Featured Integrations</span>
            <h2 class="software-title font-display text-foreground">Expand Your Ecosystem</h2>
            <p class="software-text max-w-3xl mx-auto">
              Building successful organizations requires a connected workflow where data flows freely between your
              favorite tools.
            </p>
          </div>
        </x-ui.scroll-animate>

        <x-ui.scroll-animate animation="fade-up">
          <div class="accordion-container">
            @foreach($integrationCategories as $idx => $cat)
              <div class="integration-accordion {{ $idx === 0 ? 'active' : '' }}" data-index="{{ $idx }}"
                onclick="toggleIntegrationAccordion(this)">
                <button class="accordion-trigger">
                  <div>
                    <h3 class="accordion-title font-display text-foreground">{{ $cat['title'] }}</h3>
                    <p class="accordion-description">{{ $cat['description'] }}</p>
                  </div>
                  <svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    @foreach($cat['tools'] as $tool)
                      <span class="tool-tag">
                        {{ $tool }}
                      </span>
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </x-ui.scroll-animate>
      </div>
    </section>

    <!-- Closing CTA -->
    <section class="section-cta-footer">
      <div class="cta-footer-bg"></div>
      <div class="cta-footer-glow-1"></div>
      <div class="cta-footer-glow-2"></div>

      <div class="container relative z-10">
        <x-ui.scroll-animate animation="fade-up">
          <div class="cta-footer-content">
            <h2 class="cta-footer-title font-display">
              Ready to connect your ecosystem?
            </h2>

            <p class="cta-footer-text">
              Our integrations enable seamless data flow between platforms, eliminating manual work and ensuring your
              information stays synchronized across all your essential business tools.
            </p>

            <div class="cta-footer-buttons">
              <a href="{{ route('request-demo') }}" class="btn-white-footer font-semibold">
                Request a Demo
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
              </a>
              <a href="{{ route('contact') }}" class="btn-outline-footer font-semibold">
                Contact Sales
              </a>
            </div>
          </div>
        </x-ui.scroll-animate>
      </div>
    </section>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Scroll animation observer
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };

      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      }, observerOptions);

      document.querySelectorAll('.scroll-animate').forEach(element => {
        observer.observe(element);
      });
    });

    // Toggle integration accordion
    function toggleIntegrationAccordion(accordion) {
      const isActive = accordion.classList.contains('active');

      // Close all other accordions
      document.querySelectorAll('.integration-accordion.active').forEach(el => {
        if (el !== accordion) {
          el.classList.remove('active');
        }
      });

      // Toggle current
      accordion.classList.toggle('active');
    }
  </script>
@endsection