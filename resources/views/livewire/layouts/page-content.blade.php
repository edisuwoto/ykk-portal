<div x-data="{ load : @entangle('readyToLoad').defer, flash : @entangle('showFlashMessage').defer }" wire:init="loadPage()">
    <div x-show="flash">
        @if ($showFlashMessage)
            <div x-init="() => { setTimeout(function(){ $wire.clearFlashMessage(); }, 15000); }" class="fixed left-0 right-0 bottom-0 md:top-14 z-40">
                <div class="grid gap-2">
                    @foreach ($flashMessages as $key => $item)
                        <div x-data="{ show : false }"
                            x-show="show"
                            x-transition:enter="transition duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            x-init="() => {
                                setTimeout(function(){ show = true; }, 0);
                                setTimeout(function(){ show = false; }, 10000);
                            }"
                            class="col-span-12"
                            style="display: none">
                            <div class="bg-{{$item['color']}}-100 border border-{{$item['color']}}-500 rounded-md px-4 py-2 shadow-md flex justify-between items-center">
                                <div class="text-{{$item['color']}}-800">
                                    {!! $item['messages'] !!}
                                </div>
                                <div>
                                    <a class="font-extrabold text-{{$item['color']}}-700 hover:text-{{$item['color']}}-800 cursor-pointer" x-on:click="show = false">&times;</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <div x-show="!load"
        x-transition
        class="flex h-screen">
        <div class="m-auto">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>
    </div>

    <!-- Content -->
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
