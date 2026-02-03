@props([
    'animation' => 'fade-up',
    'delay' => 0,
    'threshold' => 0.1,
    'class' => '',
])

@php
    $animationClasses = [
        'fade-up' => 'scroll-animate',
        'fade-left' => 'scroll-animate-left',
        'fade-right' => 'scroll-animate-right',
        'scale' => 'scroll-animate-scale',
    ];
    
    $animationClass = $animationClasses[$animation] ?? 'scroll-animate';
    $elementId = 'scroll-animate-' . uniqid();
@endphp

<div
    id="{{ $elementId }}"
    class="{{ $animationClass }} {{ $class }}"
    style="transition-delay: {{ $delay }}ms"
    data-threshold="{{ $threshold }}"
>
    {{ $slot }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const element = document.getElementById('{{ $elementId }}');
        
        if (!element) return;
        
        const threshold = parseFloat(element.dataset.threshold || 0.1);
        
        const observerOptions = {
            threshold: threshold,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        observer.observe(element);
    });
</script>

<style>
    .scroll-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .scroll-animate-left {
        opacity: 0;
        transform: translateX(-30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate-left.visible {
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-animate-right {
        opacity: 0;
        transform: translateX(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate-right.visible {
        opacity: 1;
        transform: translateX(0);
    }

    .scroll-animate-scale {
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .scroll-animate-scale.visible {
        opacity: 1;
        transform: scale(1);
    }
</style>
