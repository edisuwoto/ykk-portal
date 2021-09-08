<span {!! $attributes->merge(['class' => 'inline-flex items-center justify-center px-2 py-1 '.($attributes['size'] ?? 'text-sm').' font-bold leading-none '.($attributes['color'] ?? 'text-gray-100 bg-gray-600').' '.($attributes['rounded'] ?? 'rounded-full')]) !!}>
    {{ $attributes['title'] ?? $slot }}
</span>
