<div wire:init="load()">
    <x-modal.content x-data="{ section : 0 }">
        <div class="w-full flex flex-row flex-wrap text-sm border-b border-gray-400 mb-2">
            @foreach ($tabs as $key => $tab)
                <div
                    x-on:click="section = {{$key}}"
                    x-bind:class="{'border border-b-0 border-gray-400 bg-gray-50' : section === {{$key}}, 'text-gray-500' : section !== {{$key}}}"
                    class='cursor-pointer py-2 px-6 rounded-b-none rounded-t-lg'>
                    {{__($tab)}}
                </div>
            @endforeach
        </div>

        <div x-show="!load" class="flex items-center justify-center">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>
        @if ($readyToLoad)
            <div x-show="section === 0"
                x-transition
                class="grid grid-cols-1 md:grid-cols-2 gap-4"
                style="display: none;">
                <div class="col-span-2">
                    <div class="flex items-center justify-center">
                        <img
                            src="{{ $form['profile_photo_url'] != '' ? $form['profile_photo_url'] : asset('storage/img/app/user.png') }}"
                            onerror="this.onerror=null; this.src='{{asset('storage/img/app/user.png')}}'"
                            class="rounded-full h-16 w-16">
                    </div>
                </div>
                <div>
                    <x-label value="{{__('Name')}}"/>
                    <x-input type="text" wire:model.defer="form.name" class="text-xs w-full"/>
                    @foreach ($errors->get('form.name') as $message)
                        <div class="text-xs text-red-600">{{ $message }}</div>
                    @endforeach
                </div>
                <div>
                    <x-label value="{{__('Email')}}"/>
                    <x-input type="text" wire:model.defer="form.email" class="text-xs w-full"/>
                    @foreach ($errors->get('form.email') as $message)
                        <div class="text-xs text-red-600">{{ $message }}</div>
                    @endforeach
                </div>
                <div>
                    <x-label value="{{__('Role')}}"/>
                    <x-select x-on:change="$wire.changeRoles()" wire:model.defer="form.role_id" class="w-full text-xs">
                        <option value="">-- {{ __('Select') }} --</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                        @endforeach
                    </x-select>
                    @foreach ($errors->get('form.role_id') as $message)
                        <div class="text-xs text-red-600">{{ $message }}</div>
                    @endforeach
                </div>
            </div>
            <div x-show="section === 1"
                x-transition
                class="grid grid-cols-1 gap-4"
                style="display: none">
                <div>
                    <x-label value="{{ __('Permissions') }}"/>
                    <div class="max-h-60 mb-2 bg-white text-sm border border-gray-400 rounded-md overflow-y-scroll scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-gray-600 scrollbar-track-gray-300">
                        @forelse ($permissions as $permission)
                            <div wire:click="setPermission({{ $permission->id }})" class="p-2 {{ in_array($permission->id, $form['permissions']) ? 'bg-blue-400 hover:bg-blue-300' : 'bg-white hover:bg-gray-200' }} flex items-center border-b last:border-0 border-gray-400 cursor-pointer transition ease-in-out">
                                @if (in_array($permission->id, $form['permissions']))
                                    <div class="flex-none mr-2">
                                        <i class="fas fa-check-square text-white"></i>
                                    </div>
                                    <div class="flex-grow">
                                        <span>{{ $permission->description }}</span>
                                    </div>
                                @else
                                    <div class="flex-none mr-2">
                                        <i class="far fa-square"></i>
                                    </div>
                                    <div class="flex-grow truncate">
                                        <span>{{ $permission->description }}</span>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-gray-300 text-sm text-center">{{ __('There is no permission.') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </x-modal.content>

    <x-modal.footer>
        <div class="w-full flex items-center justify-between">
            <div>
                <x-button x-on:click="closeModal()">
                    {{ __('button.close') }}
                </x-button>
            </div>
            <div>
                <x-button wire:click="submit" wire:loading.attr="disabled">
                    <i wire:loading wire:target="submit" class="fas fa-spin fa-circle-notch"></i> {{ __('button.create') }}
                </x-button>
            </div>
        </div>
    </x-modal.footer>
</div>
