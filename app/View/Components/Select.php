<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($disabled = false)
    {
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
