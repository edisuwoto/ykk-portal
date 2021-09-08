<div class="bg-gray-200 border border-blue-500 p-2 md:p-4">
    <div
        @if (is_numeric($refresh))
            wire:poll.{{ $refresh }}ms
        @elseif(is_string($refresh))
            @if ($refresh === '.keep-alive' || $refresh === 'keep-alive')
                wire:poll.keep-alive
            @elseif($refresh === '.visible' || $refresh === 'visible')
                wire:poll.visible
            @else
                wire:poll="{{ $refresh }}"
            @endif
        @endif
        class="grid grid-flow-row gap-2 md:gap-4"
    >
        @include('livewire-tables::layouts.includes.offline')

        <div class="bg-white p-4 border border-gray-400 flex-col space-y-4">
            <div class="md:flex md:justify-between md:p-0">
                <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2 md:items-center">
                    @include('livewire-tables::layouts.includes.search')
                    @include('livewire-tables::layouts.includes.filters')
                </div>

                <div class="space-y-4 md:space-y-0 md:space-x-2 md:flex md:items-center">
                    @include('livewire-tables::layouts.includes.per-page')
                    @include('livewire-tables::layouts.includes.bulk-actions')
                </div>
            </div>

            @if ($showFilters && count($this->getFiltersWithoutSearch()) || ($showSorting && count($sorts)))
                <div class="flex space-x-2">
                    @include('livewire-tables::layouts.includes.filter-pills')
                    @include('livewire-tables::layouts.includes.sorting-pills')
                </div>
            @endif
        </div>

        <div class="bg-white border border-gray-400 overflow-hidden overflow-x-auto overflow-y-auto">
            @include('livewire-tables::layouts.includes.table')
        </div>

        <div class="bg-white p-2 md:p-4 border border-gray-400">
            @include('livewire-tables::layouts.includes.pagination')
        </div>
    </div>

    @isset($modalsView)
        @include($modalsView)
    @endisset
</div>
