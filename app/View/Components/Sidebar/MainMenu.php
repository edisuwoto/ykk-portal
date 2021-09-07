<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class MainMenu extends Component
{
    public $key;
    public int $tab;
    public $icon;
    public $title;
    public $link;
    public $childs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key = 0, int $tab = 0, $icon = null, $title = null, $link = '#', $childs = [])
    {
        $this->key      = $key;
        $this->tab      = $tab;
        $this->icon     = $icon;
        $this->title    = $title;
        $this->link     = $link;
        $this->childs   = $childs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar.main-menu');
    }
}
