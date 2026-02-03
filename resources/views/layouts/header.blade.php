<header class="header-fixed">
  <div class="header-container">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="header-logo">
      <img src="{{ asset('assets/logo.png') }}" alt="Seamless" class="logo-image" />
    </a>

    <!-- Navigation - Desktop -->
    <nav class="nav-desktop">
      @php
        $navItems = [
          ['label' => 'Home', 'route' => 'home'],
          ['label' => 'About', 'route' => 'about'],
          ['label' => 'Features', 'route' => 'features'],
          ['label' => 'Integrations', 'route' => 'integrations'],
          ['label' => 'Pricing', 'route' => 'pricing'],
          ['label' => "FAQ's", 'route' => 'faq'],
        ];
      @endphp

      @foreach($navItems as $item)
        @php
          $isActive = Route::currentRouteName() === $item['route'];
        @endphp
        <a href="{{ route($item['route']) }}" class="nav-link {{ $isActive ? 'nav-link-active' : '' }}">
          {{ $item['label'] }}
        </a>
      @endforeach
    </nav>

    <!-- CTAs - Desktop -->
    <div class="header-ctas">
      <a href="{{ route('request-demo') }}" class="btn-outline btn-sm">
        Request a Demo
      </a>
      <a href="{{ route('contact') }}" class="btn-cta btn-sm">
        Contact Us
      </a>
    </div>

    <!-- Hamburger - Mobile -->
    <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu">
      <svg id="menu-icon" class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg id="close-icon" class="menu-icon menu-icon-hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="mobile-menu mobile-menu-hidden">
    <nav class="mobile-nav">
      @foreach($navItems as $item)
        @php
          $isActive = Route::currentRouteName() === $item['route'];
        @endphp
        <a href="{{ route($item['route']) }}" class="mobile-nav-link {{ $isActive ? 'mobile-nav-link-active' : '' }}">
          {{ $item['label'] }}
        </a>
      @endforeach
    </nav>
    <div class="mobile-ctas">
      <a href="{{ route('request-demo') }}" class="mobile-cta-link btn-outline btn-sm"
        style="width: 100%; text-align: center;">
        Request a Demo
      </a>
      <a href="{{ route('contact') }}" class="mobile-cta-link btn-cta btn-sm" style="width: 100%; text-align: center;">
        Contact Us
      </a>
    </div>
  </div>
</header>

<style>
  /* Header Styles */
  .header-fixed {
    position: fixed;
    top: 1rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 50;
    width: 95%;
    max-width: 72rem;
  }

  .header-container {
    background-color: hsl(var(--background));
    border-radius: 9999px;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    padding: 0.75rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .header-logo {
    display: flex;
    align-items: center;
  }

  .logo-image {
    height: 2.5rem;
    width: auto;
  }

  /* Desktop Navigation */
  .nav-desktop {
    display: none;
    align-items: center;
    gap: 2rem;
  }

  @media (min-width: 768px) {
    .nav-desktop {
      display: flex;
    }
  }

  .nav-link {
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    color: hsl(var(--foreground));
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .nav-link:hover {
    color: hsl(var(--primary));
  }

  .nav-link-active {
    color: hsl(var(--primary));
    font-weight: 600;
  }

  /* Desktop CTAs */
  .header-ctas {
    display: none;
    align-items: center;
    gap: 0.75rem;
  }

  @media (min-width: 768px) {
    .header-ctas {
      display: flex;
    }
  }



  /* Mobile Menu Toggle */
  .mobile-menu-toggle {
    display: block;
    padding: 0.5rem;
    color: hsl(var(--foreground));
    background: none;
    border: none;
    cursor: pointer;
  }

  @media (min-width: 768px) {
    .mobile-menu-toggle {
      display: none;
    }
  }

  .menu-icon {
    width: 1.5rem;
    height: 1.5rem;
    stroke-width: 2;
  }

  .menu-icon-hidden {
    display: none;
  }

  /* Mobile Menu */
  .mobile-menu {
    margin-top: 0.5rem;
    background-color: hsl(var(--background));
    border-radius: 1rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    padding: 1.5rem;
    animation: fadeIn 0.3s ease-out;
  }

  @media (min-width: 768px) {
    .mobile-menu {
      display: none !important;
    }
  }

  .mobile-menu-hidden {
    display: none;
  }

  .mobile-nav {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 1.5rem;
  }

  .mobile-nav-link {
    font-family: 'Inter', sans-serif;
    font-size: 1rem;
    color: hsl(var(--foreground));
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .mobile-nav-link:hover {
    color: hsl(var(--primary));
  }

  .mobile-nav-link-active {
    color: hsl(var(--primary));
    font-weight: 600;
  }

  .mobile-ctas {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
  }

  .mobile-cta-link {
    display: block;
  }



  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const mobileMenuLinks = document.querySelectorAll('.mobile-nav-link, .mobile-cta-link');

    // Toggle mobile menu
    mobileMenuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('mobile-menu-hidden');
      menuIcon.classList.toggle('menu-icon-hidden');
      closeIcon.classList.toggle('menu-icon-hidden');
    });

    // Close menu when a link is clicked
    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', function () {
        mobileMenu.classList.add('mobile-menu-hidden');
        menuIcon.classList.remove('menu-icon-hidden');
        closeIcon.classList.add('menu-icon-hidden');
      });
    });
  });
</script>