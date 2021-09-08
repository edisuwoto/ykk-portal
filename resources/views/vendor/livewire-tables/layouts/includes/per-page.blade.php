@if ($paginationEnabled && $showPerPage)
    <div>
        <div class="text-sm">
            {{ __('Per Page') }} :
        </div>
        <x-select
            wire:model="perPage"
            id="perPage"
            class="text-sm w-full">
            @foreach ($perPageAccepted as $item)
                <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
            @endforeach
        </x-select>
    </div>
@endif
