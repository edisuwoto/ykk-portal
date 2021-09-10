<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold">
            {{__('machine.title')}}
        </h2>
    </x-slot>

    <x-slot name="headerTools">
        <h2 class="font-bold">
            {{__('machine.navigation')}}
        </h2>
    </x-slot>

    @livewire($livewire)
</x-app-layout>
