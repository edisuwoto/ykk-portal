<div class="text-center">
    @if (auth()->user()->hasPermission('user-edit'))
        <x-button wire:click="edit('{{ \Crypt::encrypt($row->id) }}')">
            <i class="fas fa-edit"></i>
        </x-button>
    @endif
</div>
