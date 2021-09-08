<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $checked;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($checked = FALSE)
    {
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox');
    }
}
