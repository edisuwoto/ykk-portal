<form wire:submit.prevent="submit">
    <div class="m-2 grid grid-cols-12 gap-3">
        <div class="col-span-12">
            <div class="bg-gradient-to-b from-gray-100 to-gray-300 border border-gray-300 shadow">
                <div class="py-3 px-2" style="min-height: 3.5rem;">
                    <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">
                        <x-button type="submit" wire:target="submit" wire:loading.attr="disabled" class="w-full">
                            <span class="text-sm">
                                <i
                                    wire:loading.class="fa-circle-notch fa-spin"
                                    wire:loading.class.remove="fa-save"
                                    wire:target="submit"
                                    class="fas fa-save text-white"></i> {{ __('button.save') }}
                            </span>
                        </x-button>
                        <div class="w-full">
                            <a href="{{ url()->previous() }}">
                                <x-button class="w-full">
                                    <span class="text-sm">
                                        <i class="fas fa-times text-white"></i> {{ __('button.cancel') }}
                                    </span>
                                </x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <div class="bg-gray-200 border border-blue-500 p-2 md:p-4">
                <div class="grid grid-flow-row gap-2 md:gap-4">
                    <div class="bg-white px-0 md:px-2 py-4 border border-gray-400">
                        <div class="grid grid-flow-row gap-2">
                            <div class="border border-blue-500 rounded-lg px-2 py-1 md:py-2">
                                <h3 class="font-bold">{{ __('PLC Settings') }}</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div>
                                        <x-label :value="__('IP Address')"/>
                                        <x-input wire:model.defer="form.ip_address" type="text" placeholder="xxx.xxx.xxx.xxx" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" class="w-full text-sm text-right"/>
                                    </div>
                                    <div>
                                        <x-label :value="__('Port')"/>
                                        <x-input wire:model.defer="form.port" type="number" min="0" class="text-sm text-right"/>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <x-label :value="__('SA1')"/>
                                            <x-input wire:model.defer="form.sa1" type="number" min="0" class="w-full text-sm text-right"/>
                                        </div>
                                        <div>
                                            <x-label :value="__('DNA1')"/>
                                            <x-input wire:model.defer="form.dna1" type="number" min="0" class="w-full text-sm text-right"/>
                                        </div>
                                        <div>
                                            <x-label :value="__('DA1')"/>
                                            <x-input wire:model.defer="form.da1" type="number" min="0" class="w-full text-sm text-right"/>
                                        </div>
                                    </div>
                                    <div>
                                        <x-label :value="__('PLC Status')"/>
                                        <div class="flex items-center justify-start space-x-2">
                                            @switch($status)
                                                @case('connected')
                                                    <x-badge color="text-green-100 bg-green-600" :value="__('Connected')" />
                                                    @break
                                                @case('disconnected')
                                                    <x-badge color="text-red-100 bg-red-600" :value="__('Disconnected')" />
                                                    @break
                                                @default
                                                    <x-badge :value="__('Unknown')" />
                                            @endswitch
                                            <button wire:click="sync" wire:loading.attr="disabled" type="button" class="focus:outline-none border border-transparent rounded-full">
                                                <i
                                                    wire:target="sync"
                                                    wire:loading.class="fa-spin text-gray-300"
                                                    wire:loading.class.remove="text-gray-500"
                                                    class="fas fa-sync text-gray-500 text-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
