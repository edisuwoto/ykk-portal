<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="m-2 p-2 bg-gray-200 border border-gray-500">
        <div class="grid grid-flow-row grid-rows-2 gap-4">
            <div class="py-4 bg-white border border-gray-400">
                <div class="text-4xl text-center">
                    <span class="font-bold text-blue-400">{{ __('messages.welcome') }}</span>
                </div>
            </div>
            <div class="py-4 bg-white border border-gray-400">

            </div>
        </div>
    </div>
</x-app-layout>
