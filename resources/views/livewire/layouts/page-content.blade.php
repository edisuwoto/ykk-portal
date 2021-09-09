<div x-data="{ load : @entangle('readyToLoad') }"
    wire:init="loadPage()">
    <div x-show="!load"
        x-transition
        class="flex h-screen">
        <div class="m-auto">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>
    </div>
    <div x-show="load"
        x-transition
        class=""
        style="display: none;">
        @if ($readyToLoad)
            {!! base64_decode($content) !!}
        @endif
    </div>

    <div wire:offline class="fixed inset-0 overflow-y-auto flex items-center z-50">
        <div class="fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="overflow-hidden transform transition-all mx-auto text-center">
            <div>
                <i class="fas fa-times-circle text-red-600 text-3xl"></i>
            </div>
            <span class="text-white text-xl">
                {{ __('You are not connected to the internet.') }}
            </span>
        </div>
    </div>
</div>
