<header class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-6xl">
  <div class="bg-background rounded-full shadow-lg px-6 py-3 flex items-center justify-between">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center">
      <img 
        src="{{ asset('assets/logo.png') }}" 
        alt="Seamless" 
        class="h-10 w-auto"
      />
    </a>

    <!-- Navigation - Desktop -->
    <nav class="hidden md:flex items-center gap-8">
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
        <a
          href="{{ route($item['route']) }}"
          class="font-body text-sm transition-colors hover:text-primary {{ $isActive ? 'text-primary font-semibold' : 'text-foreground' }}"
        >
          {{ $item['label'] }}
        </a>
      @endforeach
    </nav>

    <!-- CTAs - Desktop -->
    <div class="hidden md:flex items-center gap-3">
      <a 
        href="{{ route('request-demo') }}"
        class="px-5 py-2.5 rounded-full text-sm font-body border border-foreground text-foreground bg-transparent transition-all hover:bg-foreground hover:text-background"
      >
        Request a Demo
      </a>
      <a href="{{ route('contact') }}" class="btn-cta py-2.5 px-5 text-sm">
        Contact Us
      </a>
    </div>

    <!-- Hamburger - Mobile -->
    <button
      id="mobile-menu-toggle"
      class="md:hidden p-2 text-foreground cursor-pointer"
      aria-label="Toggle menu"
    >
      <svg id="menu-icon" class="lucide w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg id="close-icon" class="lucide w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden mt-2 bg-background rounded-2xl shadow-lg p-6 animate-fade-in">
    <nav class="flex flex-col gap-4 mb-6">
      @foreach($navItems as $item)
        @php
          $isActive = Route::currentRouteName() === $item['route'];
        @endphp
        <a
          href="{{ route($item['route']) }}"
          class="mobile-menu-link font-body text-base transition-colors hover:text-primary {{ $isActive ? 'text-primary font-semibold' : 'text-foreground' }}"
        >
          {{ $item['label'] }}
        </a>
      @endforeach
    </nav>
    <div class="flex flex-col gap-3">
      <a 
        href="{{ route('request-demo') }}"
        class="mobile-menu-link w-full px-5 py-3 rounded-full text-sm font-body border border-foreground text-foreground bg-transparent transition-all hover:bg-foreground hover:text-background text-center"
      >
        Request a Demo
      </a>
      <a 
        href="{{ route('contact') }}" 
        class="mobile-menu-link btn-cta w-full py-3 text-sm text-center"
      >
        Contact Us
      </a>
    </div>
  </div>
</header>

<style>
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

  .animate-fade-in {
    animation: fadeIn 0.3s ease-out;
  }

  .lucide {
    width: 1.5rem;
    height: 1.5rem;
    stroke-width: 2;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

    // Toggle mobile menu
    mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('hidden');
      closeIcon.classList.toggle('hidden');
    });

    // Close menu when a link is clicked
    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      });
    });
  });
</script>
