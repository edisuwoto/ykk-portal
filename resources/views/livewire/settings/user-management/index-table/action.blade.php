<div class="text-center">
    <x-button wire:click="edit('{{ \Crypt::encrypt($row->id) }}')">
        <i class="fas fa-edit"></i>
    </x-button>
</div>
