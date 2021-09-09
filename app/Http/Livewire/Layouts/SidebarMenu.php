<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

// Models
use App\Models\Menu;

class SidebarMenu extends Component
{
    protected $listeners = [
        'refresh-sidebar-menu'    => '$refresh',
    ];

    protected function getActiveMenu()
    {
        $menus = (Menu::where(['active' => 1, 'parent_id' => 0])->orderBy('sort', 'asc')->get())->toArray();

        return array_filter(array_map(fn($menu) => $this->buildMenu($menu), $menus), fn($menu) => $this->filterMenu($menu));
    }

    protected function buildMenu($menu)
    {
        $menu['childs'] = array_filter($menu['childs'], fn($child) => $this->filterMenu($child));

        return $menu;
    }

    protected function filterMenu($menu)
    {
        $auth_permission = auth()->user()->permissions->map(fn($permission) => $permission->id)->toArray();

        $menu_permission = array_map(fn($permission) => $permission['id'], $menu['permissions']);

        return !(count($menu_permission) > 0) ?
            TRUE : (
                count(
                    array_filter($auth_permission, function($item) use($menu_permission) {
                        return in_array($item, $menu_permission);
                    })
                ) > 0
            );
    }

    public function render()
    {
        $menus = $this->getActiveMenu();

        return view('livewire.layouts.sidebar-menu', compact('menus'));
    }
}
