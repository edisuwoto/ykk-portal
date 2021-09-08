<div class="m-2 grid grid-cols-12 gap-3">
    <div class="col-span-12">
        <div class="bg-gradient-to-b from-gray-100 to-gray-300 border border-gray-300 shadow">
            <div class="py-3 px-2">
                <div class="grid grid-cols-3 lg:grid-cols-6 gap-3">
                    <x-button>
                        <span class="text-sm">
                            <i class="fas fa-plus text-white"></i> {{ __('button.create_new') }}
                        </span>
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12">
        @livewire('settings.user-management.index-table')
    </div>
</div>
