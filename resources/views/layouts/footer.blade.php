<footer class="bg-[#3d3652] text-background py-16">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
      <!-- Logo & Description -->
      <div class="md:col-span-1">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/logo-white.png') }}" alt="Seamless" class="h-10 mb-4" />
        </a>
        <p class="text-muted-foreground text-sm leading-relaxed">
          A modern, unified AMS Platform built for now and what's to come.
        </p>
      </div>

      <!-- Product Links -->
      <div>
        <h4 class="font-semibold text-lg mb-4">Product</h4>
        <ul class="space-y-3 text-sm text-muted-foreground">
          <li><a href="{{ route('features') }}" class="hover:text-background transition-colors">Features</a></li>
          <li><a href="{{ route('integrations') }}" class="hover:text-background transition-colors">Integrations</a></li>
          <li><a href="{{ route('pricing') }}" class="hover:text-background transition-colors">Pricing</a></li>
        </ul>
      </div>

      <!-- Company Links -->
      <div>
        <h4 class="font-semibold text-lg mb-4">Company</h4>
        <ul class="space-y-3 text-sm text-muted-foreground">
          <li><a href="{{ route('about') }}" class="hover:text-background transition-colors">About</a></li>
          <li><a href="{{ route('contact') }}" class="hover:text-background transition-colors">Contact</a></li>
          <li><a href="{{ route('faq') }}" class="hover:text-background transition-colors">FAQ</a></li>
        </ul>
      </div>

      <!-- Get Started Links -->
      <div>
        <h4 class="font-semibold text-lg mb-4">Get Started</h4>
        <ul class="space-y-3 text-sm text-muted-foreground">
          <li><a href="{{ route('request-demo') }}" class="hover:text-background transition-colors">Request a Demo</a></li>
          <li><a href="{{ route('pricing') }}" class="hover:text-background transition-colors">View Pricing</a></li>
          <li><a href="{{ route('contact') }}" class="hover:text-background transition-colors">Contact Sales</a></li>
        </ul>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-muted-foreground/20 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-sm text-muted-foreground">
        © {{ date('Y') }} Seamless. All rights reserved.
      </p>
      <div class="flex gap-6">
        <!-- LinkedIn -->
        <a href="#" class="text-muted-foreground hover:text-background transition-colors">
          <span class="sr-only">LinkedIn</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
          </svg>
        </a>
        <!-- Twitter -->
        <a href="#" class="text-muted-foreground hover:text-background transition-colors">
          <span class="sr-only">Twitter</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</footer>
