@if (count($bulkActions))
    <div>
        <div class="text-sm">
            {{ __('Bulk Actions') }} :
        </div>
        <div>
            <div
                x-data="{ open: false }"
                @keydown.window.escape="open = false"
                @click.away="open = false"
                class="relative inline-block text-left z-10 w-full md:w-auto"
            >
                <div>
                    <span class="rounded-md shadow-sm">
                        <x-button
                            @click="open = !open"
                            type="button"
                            id="options-menu"
                            aria-haspopup="true"
                            x-bind:aria-expanded="open"
                            aria-expanded="true"
                            class="w-full"
                        >
                            @lang('Bulk Actions') <i class="fas fa-angle-down"></i>
                        </x-button>
                    </span>
                </div>

                <div
                    x-cloak
                    x-show="open"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50"
                >
                    <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white shadow-xs">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            @foreach($bulkActions as $action => $title)
                                <button
                                    wire:click="{{ $action }}"
                                    wire:key="bulk-action-{{ $action }}"
                                    type="button"
                                    class="w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900 flex items-center space-x-2"
                                    role="menuitem"
                                >
                                    <span>{{ $title }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
