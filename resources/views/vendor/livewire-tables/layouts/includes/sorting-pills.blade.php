@if ($showSorting && count($sorts))
    <div>
        <div>
            <span class="text-sm">@lang('Applied Sorting'):</span>

            <button
                wire:click.prevent="resetSorts"
                class="bg-gray-100 border border-gray-300 text-gray-800 items-center px-2.5 py-0.5 rounded-full text-xs font-medium focus:outline-none active:outline-none"
            >
                @lang('Clear')
            </button>
        </div>
        <div>
            @foreach($sorts as $col => $dir)
                <span
                    wire:key="sorting-pill-{{ $col }}"
                    class="inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-gray-100 bg-gray-500 rounded-full"
                >
                    {{ $sortNames[$col] ?? collect($this->columns())->pluck('text', 'column')->get($col, ucwords(strtr($col, ['_' => ' ', '-' => ' ']))) }}: {{ $dir === 'asc' ? ($sortDirectionNames[$col]['asc'] ?? 'A-Z') : ($sortDirectionNames[$col]['desc'] ?? 'Z-A') }}

                    <button
                        wire:click="removeSort('{{ $col }}')"
                        type="button"
                        class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-gray-400 hover:bg-gray-200 hover:text-gray-500 focus:outline-none focus:bg-gray-500 focus:text-white"
                    >
                        <span class="sr-only">@lang('Remove sort option')</span>
                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
    </div>
@endif
