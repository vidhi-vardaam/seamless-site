<section class="section-gradient bg-cover bg-center bg-no-repeat flex flex-col" style="background-image: url('{{ asset('assets/section-5-bg.png') }}')">
  <!-- Top Content -->
  <div class="container mx-auto px-6 pt-[140px] pb-7 flex-shrink-0">
    <div class="text-center max-w-4xl mx-auto">
      <x-scroll-animate animation="fade-up">
        <h2 class="heading-section text-primary-foreground mb-6">Membership, without friction.</h2>
      </x-scroll-animate>

      <x-scroll-animate animation="fade-up" delay="150">
        <p class="text-body text-primary-foreground/80 mb-8 max-w-xl mx-auto">
          A unified system that removes barriers across the entire<br />
          member lifecycle, from backend to frontend.
        </p>
      </x-scroll-animate>

      <x-scroll-animate animation="fade-up" delay="300">
        <a href="{{ route('features') }}" class="btn-cta inline-block">Explore More</a>
      </x-scroll-animate>
    </div>
  </div>

  <!-- Screenshot aligned to bottom -->
  <div class="flex-1 flex items-end justify-center mt-auto pt-[140px]">
    <x-scroll-animate animation="scale" delay="450" class="w-full max-w-5xl mx-auto px-6">
      <div class="relative">
        <img
          src="{{ asset('assets/software-screenshot.png') }}"
          alt="Seamless Dashboard"
          class="w-full h-auto rounded-t-xl shadow-2xl"
          loading="lazy"
        />
        <!-- Decorative glow -->
        <div class="absolute -inset-4 bg-gradient-to-r from-primary/20 via-secondary/20 to-accent/20 rounded-2xl blur-2xl -z-10"></div>
      </div>
    </x-scroll-animate>
  </div>
</section>
