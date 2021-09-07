<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

// Models
use App\Models\Menu;

class SidebarMenu extends Component
{
    protected function getActiveMenu()
    {
        $menu = Menu::where(['active' => 1, 'parent_id' => 0])->orderBy('sort', 'asc')->get();
        return $menu->toArray();
    }

    public function render()
    {
        $menus = $this->getActiveMenu();

        return view('livewire.layouts.sidebar-menu', compact('menus'));
    }
}
