<ul>
    @foreach ($menus as $key => $menu)
        <x-sidebar.main-menu
            key="{{ $key }}"
            tab="4"
            icon="{{ $menu['icon'] }}"
            title="{{ __($menu['title']) }}"
            link="{{ $menu['link_type'] == 'route' ? route($menu['link']) : ($menu['link'] ? url($menu['link']) : '#') }}"
            :childs="$menu['childs']"/>
    @endforeach
</ul>
