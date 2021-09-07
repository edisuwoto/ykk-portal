@props([
    'key',
    'tab',
    'icon',
    'title',
    'link',
    'childs',
])

<li x-data="{ expand_menu_{{$key}} : $persist(false) }">
    <a
        @if(count($childs) > 0)
            x-on:click.prevent="expand_menu_{{$key}} = !expand_menu_{{$key}}"
        @else
            href="{{ $link }}"
        @endif
        class="border border-gray-300 bg-gradient-to-b from-gray-100 to-gray-300 hover:from-gray-50 hover:to-gray-200 flex items-center px-3 h-10 z-10 shadow">
            <div class="w-full flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-2 text-center">
                        <i class="text-sm {{ $icon }}"></i>
                    </div>
                    <div class="text-sm truncate">
                        {{ $title }}
                    </div>
                </div>
                @if (count($childs) > 0)
                    <div>
                        <i :class="expand_menu_{{$key}} ? 'fa-caret-up' : 'fa-caret-down'" class="fas"></i>
                    </div>
                @endif
            </div>
    </a>
    @if (count($childs) > 0)
        <ul x-show="expand_menu_{{$key}}"
            x-transititon:enter = "transition-transform transition-opacity ease-in-out duration-300"
            x-transition:enter-start="transform opacity-0 -translate-y-5"
            x-transition:enter-end="transform opacity-100 translate-y-0"
            x-transition:leave="transition ease-in-out duration-300"
            x-transition:leave-start="transform opacity-100 translate-y-0"
            x-transition:leave-end="transform opacity-0 -translate-y-5"
            style="display: none;"
            class="transition-all ease-in-out">
            @foreach ($childs as $index => $menu)
                <x-sidebar.sub-menu
                    key="{{ $key.'_'.$index }}"
                    :tab="$tab+1"
                    icon="{{ $menu['icon'] }}"
                    title="{{ __($menu['title']) }}"
                    link="{{ $menu['link_type'] == 'route' ? route($menu['link']) : ($menu['link'] ? url($menu['link']) : '#') }}"
                    :childs="$menu['childs']"/>
            @endforeach
        </ul>
    @endif
</li>
