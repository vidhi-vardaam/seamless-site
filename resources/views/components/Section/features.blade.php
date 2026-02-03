@php
    $features = [
        [
            'id' => 'seamless',
            'title' => 'Seamless',
            'subtitle' => 'Continuity across the entire member journey.',
            'description' => 'Membership should feel continuous — not transactional. Seamless removes friction across the entire member journey, from joining and renewal to events, learning, and ongoing engagement. Every interaction feels connected, consistent, and intentional. Members do not experience systems. They experience continuity.',
        ],
        [
            'id' => 'unified',
            'title' => 'Unified',
            'subtitle' => 'One source of truth powering every experience.',
            'description' => 'A single platform that connects your website, member portal, events, learning, and backend operations. No more juggling multiple systems or syncing data between disconnected tools.',
        ],
        [
            'id' => 'adaptive',
            'title' => 'Adaptive',
            'subtitle' => 'Designed to evolve without disruption.',
            'description' => 'Your organization will change. Your platform should change with you. Adaptive architecture means you can grow, pivot, and innovate without costly migrations or platform overhauls.',
        ],
    ];
    
    $id = 'features-' . uniqid();
@endphp

<section id="{{ $id }}" class="section-light bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('assets/section-4-bg.png') }}')">
  <div class="container mx-auto px-6 py-20">
    <div class="max-w-3xl mx-auto">
      @foreach($features as $idx => $feature)
        <x-scroll-animate animation="fade-up" delay="{{ $idx * 100 }}">
          <div class="feature-item border-b border-foreground/10 py-6" data-feature-id="{{ $feature['id'] }}">
            <button class="feature-toggle w-full flex items-center justify-between text-left group">
              <div class="flex items-center gap-3">
                <span class="font-display text-xl text-foreground">{{ $feature['title'] }}</span>
                <span class="text-muted-foreground">|</span>
                <span class="text-body text-muted-foreground">{{ $feature['subtitle'] }}</span>
              </div>
              <svg class="feature-icon w-6 h-6 text-secondary transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
              </svg>
            </button>

            <div class="feature-content overflow-hidden transition-all duration-500 ease-out max-h-0 opacity-0 {{ $idx === 0 ? 'expanded' : '' }}">
              <p class="text-body text-muted-foreground pl-0 md:pl-4 pt-4">{{ $feature['description'] }}</p>
            </div>
          </div>
        </x-scroll-animate>
      @endforeach

      <x-scroll-animate animation="fade-up" delay="400">
        <div class="flex flex-col sm:flex-row gap-4 justify-center mt-12">
          <a href="{{ route('request-demo') }}" class="btn-outline inline-block text-center">Request a Demo</a>
          <a href="{{ route('features') }}" class="btn-cta inline-block text-center">Explore Features</a>
        </div>
      </x-scroll-animate>
    </div>
  </div>

  <style>
    #{{ $id }} .feature-content.expanded {
      max-height: 400px;
      opacity: 1;
    }

    #{{ $id }} .feature-toggle:hover .feature-icon {
      color: hsl(var(--secondary));
    }

    #{{ $id }} .feature-item.active .feature-icon {
      transform: rotate(45deg);
    }

    .btn-outline {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 1rem 2rem;
      border: 2px solid hsl(var(--foreground));
      color: hsl(var(--foreground));
      border-radius: 9999px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      background: transparent;
      cursor: pointer;
    }

    .btn-outline:hover {
      background-color: hsl(var(--foreground));
      color: hsl(var(--background));
    }

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
      border: none;
      cursor: pointer;
    }

    .btn-cta:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const root = document.getElementById('{{ $id }}');
      if (!root) return;

      const items = Array.from(root.querySelectorAll('.feature-item'));
      const toggles = Array.from(root.querySelectorAll('.feature-toggle'));

      // Set initial expanded state (first item or 'seamless')
      const firstItem = items.find(item => item.dataset.featureId === 'seamless') || items[0];
      if (firstItem) {
        firstItem.classList.add('active');
        firstItem.querySelector('.feature-content').classList.add('expanded');
      }

      toggles.forEach((toggle, idx) => {
        toggle.addEventListener('click', function() {
          const item = items[idx];
          const content = item.querySelector('.feature-content');
          const isExpanded = item.classList.contains('active');

          // Close all others
          items.forEach((i, idxInner) => {
            i.classList.remove('active');
            i.querySelector('.feature-content').classList.remove('expanded');
          });

          // Toggle current if not already expanded
          if (!isExpanded) {
            item.classList.add('active');
            content.classList.add('expanded');
          }
        });
      });
    });
  </script>
</section>
