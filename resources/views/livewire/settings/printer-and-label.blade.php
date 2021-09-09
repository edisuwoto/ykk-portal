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
                                <h3 class="font-bold">{{ __('Label Printer') }}</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div>
                                        <x-label :value="__('Printer').' 1'"/>
                                        <x-select wire:model.defer="form.0.printer.driver" class="w-full text-sm">
                                            <option value="">--{{ __('Select Printer') }}--</option>
                                        </x-select>
                                    </div>
                                    <div class="flex items-end">
                                        <x-input wire:model.defer="form.0.printer.description" type="text" class="w-full text-sm"/>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label :value="__('Length')"/>
                                            <div class="flex items-center">
                                                <div>
                                                    <x-input wire:model.defer="form.0.length" type="number" min="0" class="w-full text-sm text-right"/>
                                                </div>
                                                <div>
                                                    mm
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <x-label :value="__('Width')"/>
                                            <div class="flex items-center">
                                                <div>
                                                    <x-input wire:model.defer="form.0.width" type="number" min="0" class="w-full text-sm text-right"/>
                                                </div>
                                                <div>
                                                    mm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <x-label :value="__('Print Content')"/>
                                        <x-button wire:click="printContent('label')" wire:loading.attr="disabled">
                                            <i
                                                wire:loading.class="fa-circle-notch fa-spin"
                                                wire:loading.class.remove="fa-barcode"
                                                wire:target="printContent"
                                                class="fas fa-barcode"></i> {{ __('button.show') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-blue-500 rounded-lg px-2 py-1 md:py-2">
                                <h3 class="font-bold">{{ __('Box Printer') }}</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div>
                                        <x-label :value="__('Printer').' 2'"/>
                                        <x-select wire:model.defer="form.1.printer.driver" class="w-full text-sm">
                                            <option value="">--{{ __('Select Printer') }}--</option>
                                        </x-select>
                                    </div>
                                    <div class="flex items-end">
                                        <x-input wire:model.defer="form.1.printer.description" type="text" class="w-full text-sm"/>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label :value="__('Length')"/>
                                            <div class="flex items-center">
                                                <div>
                                                    <x-input wire:model.defer="form.1.length" type="number" min="0" class="w-full text-sm text-right"/>
                                                </div>
                                                <div>
                                                    mm
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <x-label :value="__('Width')"/>
                                            <div class="flex items-center">
                                                <div>
                                                    <x-input wire:model.defer="form.1.width" type="number" min="0" class="w-full text-sm text-right"/>
                                                </div>
                                                <div>
                                                    mm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <x-label :value="__('Print Content')"/>
                                        <x-button wire:click="printContent('box')" wire:loading.attr="disabled">
                                            <i
                                                wire:loading.class="fa-circle-notch fa-spin"
                                                wire:loading.class.remove="fa-barcode"
                                                wire:target="printContent"
                                                class="fas fa-barcode"></i> {{ __('button.show') }}
                                        </x-button>
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
