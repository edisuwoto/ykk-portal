<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold">
            {{__('item.title')}}
        </h2>
    </x-slot>

    <x-slot name="headerTools">
        <h2 class="font-bold">
            {{__('item.navigation')}}
        </h2>
    </x-slot>

    @livewire($livewire)
</x-app-layout>
