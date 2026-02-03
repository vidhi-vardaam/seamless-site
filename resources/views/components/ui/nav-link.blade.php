@props([
    'href' => '#',
    'route' => null,
    'class' => '',
    'activeClass' => '',
    'pendingClass' => '',
])

@php
    $isActive = false;
    
    if ($route) {
        $isActive = Route::currentRouteName() === $route;
    }
    
    $computedClass = $class;
    if ($isActive && $activeClass) {
        $computedClass .= ' ' . $activeClass;
    }
@endphp

<a 
    href="{{ $route ? route($route) : $href }}"
    @class([
        $computedClass
    ])
    {{ $attributes }}
>
    {{ $slot }}
</a>
