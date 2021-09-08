@props([
    'column',
    'sortable' => null,
    'direction' => null,
    'text' => null,
])

<th
    {{ $attributes->merge(['class' => 'h-8 bg-white'])->only('class') }}
>
    @unless ($sortable)
        <span class="px-2 block text-center text-xs leading-4 font-bold uppercase tracking-wider">
            {{ $text ?? $slot }}
        </span>
    @else
        <button
            wire:click="sortBy('{{ $column }}', '{{ $text ?? $column }}')"
            {{ $attributes->except('class') }}
            class="w-full px-2 flex items-center justify-center space-x-1 text-center text-xs leading-4 font-bold uppercase tracking-wider group focus:outline-none focus:underline"
        >
            <span>{{ $text ?? $slot }}</span>

            <span class="relative flex items-center">
                @if ($direction === 'asc')
                    <span class="group-hover:opacity-0 transition-opacity duration-300">
                        <i class="fas fa-sort-amount-down-alt"></i>
                    </span>
                    <span class="absolute opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i class="fas fa-sort-amount-up-alt"></i>
                    </span>
                @elseif ($direction === 'desc')
                    <div class="opacity-0 group-hover:opacity-100 absolute">
                        <i class="fas fa-times"></i>
                    </div>
                    <span class="group-hover:opacity-0 transition-opacity duration-300">
                        <i class="fas fa-sort-amount-down-alt"></i>
                    </span>
                @else
                    <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <i class="fas fa-sort-amount-down-alt"></i>
                    </span>
                @endif
            </span>
        </button>
    @endif
</th>
