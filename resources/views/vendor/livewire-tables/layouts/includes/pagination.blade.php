@if ($showPagination)
    <div>
        @if ($paginationEnabled && $rows->lastPage() > 1)
            {{ $rows->links('vendor.livewire-tables.layouts.includes.custom-pagination') }}
        @else
            <p class="text-sm text-gray-700 leading-5">
                @lang('Showing')
                <span class="font-medium">{{ $rows->count() }}</span>
                @lang('results')
            </p>
        @endif
    </div>
@endif
