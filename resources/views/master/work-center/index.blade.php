<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold">
            {{__('work-center.title')}}
        </h2>
    </x-slot>

    <x-slot name="headerTools">
        <h2 class="font-bold">
            {{__('work-center.navigation')}}
        </h2>
    </x-slot>

    @livewire($livewire)
</x-app-layout>
