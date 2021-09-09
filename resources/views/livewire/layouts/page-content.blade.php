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
</div>
