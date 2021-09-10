<form wire:submit.prevent="submit">
    <div class="m-2 grid grid-cols-12 gap-3">
        <div class="col-span-12">
            <div class="bg-gradient-to-b from-gray-100 to-gray-300 border border-gray-300 shadow">
                <div class="py-3 px-2" style="min-height: 3.5rem;">
                    <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">
                        <x-button type="submit" class="w-full">
                            <span class="text-sm">
                                <i class="fas fa-save text-white"></i> {{ __('button.save') }}
                            </span>
                        </x-button>
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
        <div class="col-span-12">
            <div class="bg-gray-200 border border-blue-500 p-2 md:p-4">
                <div class="grid grid-flow-row gap-2 md:gap-4">
                    <div class="bg-white p-2 md:p-4 border border-gray-400">
                        <div class="flex flex-col md:flex-row-reverse gap-4">
                            <div class="md:w-1/2">
                                <div x-data="{ photoName : null, photoPreview : null }" x-init="$watch('photoPreview', value => console.log(value))" class="flex flex-col">
                                    <div class="flex items-center justify-center">
                                        <input type="file" class="hidden"
                                                    wire:model="photo"
                                                    x-ref="photo"
                                                    x-on:change="
                                                            photoName = $refs.photo.files[0].name;
                                                            const reader = new FileReader();
                                                            reader.onload = (e) => {
                                                                photoPreview = e.target.result;
                                                            };
                                                            reader.readAsDataURL($refs.photo.files[0]);
                                                    " />
                                        <input wire:model.defer="form.picture_path" type="hidden" />
                                        <div x-show="!photoPreview" class="w-full">
                                            @if ($form['picture_path'])
                                                <img src="{{ $form['picture_path'] }}" alt="">
                                            @else
                                                <div class="w-full border border-blue-300 bg-gray-200 rounded-lg" style="height: 200px;">
                                                    <div class="h-full w-full flex items-center justify-center">
                                                        {{ __('No pictures') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div x-show="photoPreview" class="w-full">
                                            <div class="w-full border border-blue-300 rounded-lg" style="height: 200px;">
                                                <span x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" class="block rounded-lg w-full h-full"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-flow-row gap-1">
                                        <x-button x-on:click.prevent="$refs.photo.click()" class="w-full">
                                            <i class="fas fa-image"></i> {{ __('item.picture') }}
                                        </x-button>
                                        @if ($form['picture_path'])
                                            <x-button wire:click="removePhoto()" class="w-full">
                                                <i class="fas fa-trash"></i> {{ __('item.picture_remove') }}
                                            </x-button>
                                        @endif
                                    </div>
                                    @error('photo')
                                    <div class="text-center">
                                        <p for="photo" class="text-xs text-red-600">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:w-1/2">
                                <div class="grid grid-flow-row gap-4">
                                    <div>
                                        <x-label :value="__('item.code')" />
                                        <x-input wire:model.defer="form.code" type="text" class="w-full text-xs" />
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <x-checkbox wire:model.defer="form.active" type="text" class="text-xs" /><x-label :value="__('item.active')" />
                                    </div>
                                    <div>
                                        <x-label :value="__('item.name', ['number' => 1])" />
                                        <x-input wire:model.defer="form.name_1" type="text" class="w-full text-xs" />
                                    </div>
                                    <div>
                                        <x-label :value="__('item.name', ['number' => 2])" />
                                        <x-input wire:model.defer="form.name_2" type="text" class="w-full text-xs" />
                                    </div>
                                    <div>
                                        <x-label :value="__('item.name', ['number' => 3])" />
                                        <x-input wire:model.defer="form.name_3" type="text" class="w-full text-xs" />
                                    </div>
                                    <div>
                                        <x-label :value="__('item.color')" />
                                        <x-input wire:model.defer="form.color" type="text" class="w-full text-xs" />
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label :value="__('item.quantity')" />
                                            <x-input wire:model.defer="form.quantity" type="number" min="0" class="w-full text-xs text-right" />
                                        </div>
                                        <div>
                                            <x-label :value="__('item.unit')" />
                                            <x-select wire:model.defer="form.quantity_unit_id" type="text" class="w-full text-xs">
                                                <option value="">--{{ __('item.unit_select') }}--</option>
                                                @foreach ($this->unit as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label :value="__('item.weight')" />
                                            <x-input wire:model.defer="form.weight" type="number" min="0" class="w-full text-xs text-right" />
                                        </div>
                                        <div>
                                            <x-label :value="__('item.unit')" />
                                            <x-select wire:model.defer="form.weight_unit_id" type="text" class="w-full text-xs">
                                                <option value="">--{{ __('item.unit_select') }}--</option>
                                                @foreach ($this->unit as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </x-select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-2 md:p-4 border border-gray-400">
                        <h3 class="font-bold">{{ __('item.weight_history_title') }}</h3>
                        <hr class="border border-black my-2">
                        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2 md:items-center">
                            <div>
                                <div class="text-sm">
                                    {{ __('Search') }} :
                                </div>
                                <div class="relative flex-grow focus-within:z-10">
                                    <input
                                        type="text"
                                        wire:model="filters.search"
                                        placeholder="{{ __('Search') }}"
                                        class="w-full text-sm rounded shadow-sm border-gray-500 focus:border-gray-500 focus:ring focus:ring-gray-200 focus:ring-opacity-50"
                                    />
                                    <button wire:click="$set('filters.search', null)"
                                            type="button"
                                            class="absolute inset-y-0 right-0 px-2 flex items-center {{ (isset($filters['search']) && strlen($filters['search'])) ? 'cursor-pointer' : 'cursor-none' }}">
                                            @if (isset($filters['search']) && strlen($filters['search']))
                                                <i class="fas fa-times text-red-500"></i>
                                            @else
                                                <i class="fas fa-search text-gray-500"></i>
                                            @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr class="border border-black my-2">
                        <div class="overflow-hidden overflow-x-auto overflow-y-auto">
                            <table class="min-w-full divide-y text-xs">
                                <thead class="border-b border-black">
                                    <tr>
                                        <th style="width: 100px;">No.</th>
                                        <th style="width: 1000px;">{{ __('item.wo_number') }}</th>
                                        <th style="width: 1000px;">{{ __('item.production_date') }}</th>
                                        <th style="width: 1000px;">{{ __('item.weight') }} (Gram)</th>
                                        <th style="width: 1000px;"></th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y">
                                    <tr>
                                        <td>
                                            <x-input type="number" class="text-xs w-full" disabled/>
                                        </td>
                                        <td>
                                            <x-input type="text" class="text-xs w-full" disabled/>
                                        </td>
                                        <td>
                                            <x-input type="text" class="text-xs w-full" disabled/>
                                        </td>
                                        <td>
                                            <x-input type="number" class="text-xs w-full" disabled/>
                                        </td>
                                        <td class="flex items-center flex-nowrap">
                                            <div>
                                                =
                                            </div>
                                            <x-input type="number" class="text-xs w-full" disabled/>
                                            <x-input type="number" class="text-xs w-full" value="pcs" disabled/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
