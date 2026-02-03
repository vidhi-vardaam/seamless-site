@php
    $testimonials = [
        [
            'quote' => "This platform has completely transformed how we manage our association. The seamless integration and intuitive design have saved us countless hours.",
            'author' => 'Sarah Mitchell',
            'title' => 'Executive Director',
            'company' => 'National Healthcare Association',
            'rating' => 5,
        ],
        [
            'quote' => "Finally, an AMS that adapts to our needs instead of forcing us to adapt to it. The unified approach has streamlined our entire operation.",
            'author' => 'Michael Chen',
            'title' => 'Operations Manager',
            'company' => 'Tech Professionals Guild',
            'rating' => 5,
        ],
        [
            'quote' => "The support team is incredible, and the platform itself is a game-changer. We've seen a 40% increase in member engagement since switching.",
            'author' => 'Emily Rodriguez',
            'title' => 'Membership Director',
            'company' => 'Creative Industries Alliance',
            'rating' => 5,
        ],
        [
            'quote' => "After years of struggling with outdated systems, this modern solution has reinvigorated our team and delighted our members.",
            'author' => 'David Thompson',
            'title' => 'CEO',
            'company' => 'Professional Engineers Society',
            'rating' => 5,
        ],
    ];

    $id = 'testimonials-' . uniqid();
@endphp

<section id="{{ $id }}" class="relative py-24 overflow-hidden">
  <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/section-6-bg.png') }}')"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16">
      <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary rounded-full text-sm font-medium mb-4">Testimonials</span>
      <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-4">Loved by Industry Leaders</h2>
      <p class="text-muted-foreground text-lg max-w-2xl mx-auto">See why leading associations trust us to power their member experience</p>
    </div>

    <div class="max-w-3xl mx-auto">
      <div class="relative">
        <button data-action="prev" class="testimonial-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-12 z-20 w-10 h-10 rounded-full bg-background shadow-lg border border-border flex items-center justify-center text-foreground hover:bg-muted transition-all hover:scale-110" aria-label="Previous testimonial">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>

        <button data-action="next" class="testimonial-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-12 z-20 w-10 h-10 rounded-full bg-background shadow-lg border border-border flex items-center justify-center text-foreground hover:bg-muted transition-all hover:scale-110" aria-label="Next testimonial">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <div class="relative bg-background/80 backdrop-blur-sm rounded-2xl shadow-xl border border-border/50 p-6 md:p-10">
          @foreach($testimonials as $i => $t)
            <div class="testimonial-item {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}" style="display: {{ $i === 0 ? 'block' : 'none' }};">
              <div class="absolute -top-4 left-8 md:left-10">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary/70 flex items-center justify-center shadow-lg">
                  <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h8"/></svg>
                </div>
              </div>

              <div class="content transition-all duration-300 ease-out">
                <div class="flex gap-0.5 mb-4 pt-3">
                  @for($s = 0; $s < $t['rating']; $s++)
                    <svg class="w-4 h-4 fill-primary text-primary" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.431L24 9.748l-6 5.848L19.335 24 12 20.201 4.665 24 6 15.596 0 9.748l8.332-1.73z"/></svg>
                  @endfor
                </div>

                <blockquote class="text-base md:text-lg lg:text-xl text-foreground leading-relaxed mb-6 font-medium">"{{ $t['quote'] }}"</blockquote>

                <div class="flex items-center gap-3">
                  <div class="relative">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-primary/20 to-accent/20 flex items-center justify-center">
                      <span class="text-lg font-bold bg-gradient-to-br from-primary to-accent bg-clip-text text-transparent">{{ strtoupper(substr($t['author'],0,1)) }}</span>
                    </div>
                    <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-primary rounded-full border-2 border-background" />
                  </div>

                  <div>
                    <p class="font-bold text-sm text-foreground">{{ $t['author'] }}</p>
                    <p class="text-muted-foreground text-xs">{{ $t['title'] }}</p>
                    <p class="text-xs text-primary font-medium">{{ $t['company'] }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center gap-3 mt-10">
        @foreach($testimonials as $i => $t)
          <button data-indicator-index="{{ $i }}" class="testimonial-indicator h-2 rounded-full transition-all duration-500 {{ $i === 0 ? 'active-indicator w-10 bg-gradient-to-r from-primary to-accent' : 'w-2 bg-foreground/20 hover:bg-foreground/40' }}" aria-label="Go to testimonial {{ $i + 1 }}"></button>
        @endforeach
      </div>
    </div>
  </div>

  <style>
    #{{ $id }} .testimonial-item { opacity: 0; transform: translateX(0); transition: opacity 0.3s ease, transform 0.3s ease; }
    #{{ $id }} .testimonial-item.active { opacity: 1; transform: translateX(0); }
    #{{ $id }} .anim-left { opacity: 0; transform: translateX(-20px); }
    #{{ $id }} .anim-right { opacity: 0; transform: translateX(20px); }
    #{{ $id }} .active-indicator { border-radius: 9999px; }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const root = document.getElementById('{{ $id }}');
      if (!root) return;

      const items = Array.from(root.querySelectorAll('.testimonial-item'));
      const prevBtn = root.querySelector('[data-action="prev"]');
      const nextBtn = root.querySelector('[data-action="next"]');
      const indicators = Array.from(root.querySelectorAll('.testimonial-indicator'));

      let current = 0;
      let isAnimating = false;
      const intervalMs = 6000;
      let interval = null;

      function show(index, dir = 'right') {
        if (isAnimating || index === current) return;
        isAnimating = true;

        const outgoing = items[current];
        const incoming = items[index];

        outgoing.classList.remove('active');
        outgoing.classList.add(dir === 'right' ? 'anim-left' : 'anim-right');

        incoming.style.display = 'block';
        incoming.classList.add(dir === 'right' ? 'anim-right' : 'anim-left');

        // force reflow
        void incoming.offsetWidth;

        incoming.classList.remove('anim-left', 'anim-right');
        incoming.classList.add('active');

        // update indicators
        indicators.forEach((btn, i) => {
          btn.classList.toggle('active-indicator', i === index);
          if (i === index) {
            btn.classList.add('w-10');
            btn.classList.remove('w-2');
            btn.classList.remove('bg-foreground/20');
          } else {
            btn.classList.remove('w-10');
            btn.classList.add('w-2');
            btn.classList.add('bg-foreground/20');
            btn.classList.remove('bg-gradient-to-r');
          }
        });

        setTimeout(() => {
          outgoing.style.display = 'none';
          current = index;
          isAnimating = false;
        }, 300);
      }

      function goNext() { show((current + 1) % items.length, 'right'); }
      function goPrev() { show((current - 1 + items.length) % items.length, 'left'); }

      nextBtn.addEventListener('click', () => { clearInterval(interval); goNext(); interval = setInterval(goNext, intervalMs); });
      prevBtn.addEventListener('click', () => { clearInterval(interval); goPrev(); interval = setInterval(goNext, intervalMs); });

      indicators.forEach(btn => {
        btn.addEventListener('click', (e) => {
          const idx = parseInt(btn.getAttribute('data-indicator-index'));
          if (isNaN(idx)) return;
          clearInterval(interval);
          show(idx, idx > current ? 'right' : 'left');
          interval = setInterval(goNext, intervalMs);
        });
      });

      // start autoplay
      interval = setInterval(goNext, intervalMs);
    });
  </script>
</section>