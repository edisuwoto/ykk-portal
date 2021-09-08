@if ($showFilters && count($this->getFiltersWithoutSearch()))
    <div>
        <div>
            <span class="text-sm">@lang('Applied Filters'):</span>

            <button
                wire:click.prevent="resetFilters"
                class="bg-gray-100 border border-gray-300 text-gray-800 items-center px-2.5 py-0.5 rounded-full text-xs font-medium focus:outline-none active:outline-none"
            >
                @lang('Clear')
            </button>
        </div>

        <div>
            @foreach($filters as $key => $value)
                @if ($key !== 'search' && strlen($value))
                    <span
                        wire:key="filter-pill-{{ $key }}"
                        class="inline-flex items-center justify-center px-2 py-1 text-xs leading-none text-gray-100 bg-gray-500 rounded-full"
                    >
                        {{ $filterNames[$key] ?? collect($this->columns())->pluck('text', 'column')->get($key, ucwords(strtr($key, ['_' => ' ', '-' => ' ']))) }}:
                        @if(isset($customFilters[$key]) && method_exists($customFilters[$key], 'options'))
                            {{ $customFilters[$key]->options()[$value] ?? $value }}
                        @else
                            {{ ucwords(strtr($value, ['_' => ' ', '-' => ' '])) }}
                        @endif

                        <button
                            wire:click="removeFilter('{{ $key }}')"
                            type="button"
                            class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-gray-400 hover:bg-gray-200 hover:text-gray-500 focus:outline-none focus:bg-gray-500 focus:text-white"
                        >
                            <span class="sr-only">@lang('Remove filter option')</span>
                            <i class="fas fa-times"></i>
                        </button>
                    </span>
                @endif
            @endforeach
        </div>
    </div>
@endif
