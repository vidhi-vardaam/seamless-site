@php
    $slides = [
        ['word' => 'Seamless', 'pronunciation' => "[seem-lis] / 'sēm lis /", 'definition' => 'Smoothly continuous or uniform in quality; combined in an inconspicuous way.'],
        ['word' => 'Unified', 'pronunciation' => "[yoo-nuh-fahyd] / 'yü nə fīd /", 'definition' => 'Made or joined into a single entity; brought together as one cohesive whole.'],
        ['word' => 'Adaptive', 'pronunciation' => "[uh-dap-tiv] / ə 'dap tiv /", 'definition' => 'Able to adjust to new conditions; designed to respond to changing requirements.'],
    ];
    $id = 'hero-' . uniqid();
@endphp

<section id="{{ $id }}" class="section-hero relative overflow-hidden">
    <!-- Video Background -->
    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('videos/hero-bg.mov') }}" type="video/quicktime" />
    </video>

    <!-- Overlay -->
    <div class="video-overlay absolute inset-0 bg-black/30"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto py-32">
        @foreach($slides as $i => $s)
            <div class="hero-slide" data-index="{{ $i }}" style="display: {{ $i === 0 ? 'block' : 'none' }};">
                <div class="slide-inner transition-all duration-500 ease-in-out">
                    <h1 class="heading-hero text-primary-foreground mb-4 text-5xl font-bold">{{ $s['word'] }}</h1>
                    <p class="text-primary-foreground/80 text-lg md:text-xl italic mb-2">{{ $s['pronunciation'] }}</p>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-display text-primary-foreground mb-6 leading-tight">{{ $s['definition'] }}</h2>
                </div>
            </div>
        @endforeach

        <div class="w-24 h-px bg-primary-foreground/40 mx-auto mb-6"></div>

        <p class="text-body text-primary-foreground/90 mb-8 max-w-2xl mx-auto">A modern, unified AMS Platform built for now and what's to come.</p>

        <a href="{{ route('request-demo') }}" class="btn-cta">Request a Demo</a>

        <!-- Slide indicators -->
        <div class="flex justify-center gap-2 mt-8">
            @foreach($slides as $i => $s)
                <button data-slide-index="{{ $i }}" class="indicator w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-primary-foreground w-6' : 'bg-primary-foreground/40 hover:bg-primary-foreground/60' }}" aria-label="Go to slide {{ $i + 1 }}"></button>
            @endforeach
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-float z-10">
        <div class="w-6 h-10 rounded-full border-2 border-primary-foreground/40 flex items-start justify-center p-2">
            <div class="w-1.5 h-3 bg-primary-foreground/60 rounded-full animate-bounce"></div>
        </div>
    </div>

    <style>
        /* Scoped to this hero instance */
        #{{ $id }} .slide-inner { opacity: 1; transform: translateY(0); }
        #{{ $id }} .anim-out-up { opacity: 0; transform: translateY(-16px); }
        #{{ $id }} .anim-out-down { opacity: 0; transform: translateY(16px); }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const root = document.getElementById('{{ $id }}');
            if (!root) return;

            const slides = Array.from(root.querySelectorAll('.hero-slide'));
            const indicators = Array.from(root.querySelectorAll('.indicator'));
            let current = 0;
            let isAnimating = false;
            const intervalMs = 5000;
            let interval = null;

            function show(index) {
                if (isAnimating || index === current) return;
                isAnimating = true;

                const outgoing = slides[current];
                const incoming = slides[index];

                const direction = index > current ? 'down' : 'up';

                const outgoingInner = outgoing.querySelector('.slide-inner');
                const incomingInner = incoming.querySelector('.slide-inner');

                outgoingInner.classList.add(direction === 'down' ? 'anim-out-up' : 'anim-out-down');
                incoming.style.display = 'block';
                incomingInner.classList.add(direction === 'down' ? 'anim-out-down' : 'anim-out-up');

                // force reflow
                void incomingInner.offsetWidth;

                incomingInner.classList.remove('anim-out-down', 'anim-out-up');

                // update indicators
                indicators.forEach((btn, i) => {
                    btn.classList.toggle('w-6', i === index);
                    btn.classList.toggle('w-2', i !== index);
                    btn.classList.toggle('bg-primary-foreground', i === index);
                });

                setTimeout(() => {
                    outgoing.style.display = 'none';
                    current = index;
                    isAnimating = false;
                }, 500);
            }

            function goNext() { show((current + 1) % slides.length); }

            indicators.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const idx = parseInt(btn.getAttribute('data-slide-index'));
                    if (isNaN(idx)) return;
                    clearInterval(interval);
                    show(idx);
                    interval = setInterval(goNext, intervalMs);
                });
            });

            interval = setInterval(() => {
                show((current + 1) % slides.length);
            }, intervalMs);
        });
    </script>
</section>