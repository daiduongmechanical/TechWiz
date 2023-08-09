@props(['active'])

@php
$classes = ($active ?? false)
            ? 'd-inline-flex align-items-center px-1 -pt-2 border-bottom border-3 border-primary fw-bold nav-link active'
            : 'd-inline-flex align-items-center px-1 pt-1  nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
