@if ($showSearch)
    <div>
        <div class="text-sm">
            {{ __('Search') }} :
        </div>
        <div class="relative flex-grow focus-within:z-10">
            <input
                type="text"
                wire:model{{ $this->searchFilterOptions }}="filters.search"
                placeholder="{{ __('Search') }}"
                class="w-full text-sm rounded shadow-sm border-gray-500 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
            />
            <button wire:click="$set('filters.search', null)"
                    type="button"
                    class="absolute inset-y-0 right-0 px-2 flex items-center {{ (isset($filters['search']) && strlen($filters['search'])) ? 'cursor-pointer' : 'cursor-none' }}">
                    @if (isset($filters['search']) && strlen($filters['search']))
                        <i class="fas fa-times text-red-500"></i>
                    @else
                        <i class="fas fa-search text-gray-500"></i>
                    @endif
            </button>
        </div>
    </div>
@endif
