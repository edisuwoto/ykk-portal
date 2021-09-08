@if ($showFilterDropdown && ($filtersView || count($customFilters)))
    <div
        x-data="{ open: false }"
        @keydown.escape.stop="open = false"
        @click.away="open = false"
        class="relative block md:inline-block text-left"
    >
        <div class="text-sm">
            {{ __('Filters') }} :
        </div>
        <div>
            <x-button
                    id="filters-menu"
                    @click="open = !open"
                    aria-haspopup="true"
                    x-bind:aria-expanded="open"
                    aria-expanded="true"
                    type="button"
                    class="w-full">
                <i class="fas fa-filter"></i> @lang('Filters')

                @if (count($this->getFiltersWithoutSearch()))
                    <x-badge>
                        {{ count($this->getFiltersWithoutSearch()) }}
                    </x-badge>
                @endif
            </x-button>
        </div>

        <div
            x-cloak
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="origin-top-right absolute right-0 mt-2 w-full md:w-56 rounded-md shadow-md bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none focus:border-black z-10"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="filters-menu"
        >
            @if ($filtersView)
                @include($filtersView)
            @elseif (count($customFilters))
                @foreach ($customFilters as $key => $filter)
                    <div class="py-1" role="none">
                        <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                            @if ($filter->isSelect())
                                <label for="filter-{{ $key }}" class="block text-sm font-medium leading-5 text-gray-700">
                                    {{ $filter->name() }}
                                </label>

                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <x-select
                                        wire:model="filters.{{ $key }}"
                                        wire:key="filter-{{ $key }}"
                                        id="filter-{{ $key }}"
                                        class="w-full text-sm"
                                    >
                                        @foreach($filter->options() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif

            @if (count($this->getFiltersWithoutSearch()))
                <div class="py-1" role="none">
                    <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                        <x-button
                            wire:click.prevent="resetFilters"
                            type="button"
                            class="w-full">
                            @lang('Clear')
                        </x-button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
