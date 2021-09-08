@if ($offlineIndicator)
    <div wire:offline.class.remove="hidden" class="hidden">
        <div class="bg-red-100 border border-red-500 rounded-md px-4 py-2 mb-4 shadow flex justify-between items-center">
            <div class="text-red-800 flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="ml-3">
                    @lang('You are not connected to the internet.')
                </div>
            </div>
        </div>
    </div>
@endif
