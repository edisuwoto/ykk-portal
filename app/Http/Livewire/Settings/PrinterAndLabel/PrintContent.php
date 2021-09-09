<?php

namespace App\Http\Livewire\Settings\PrinterAndLabel;

use Livewire\Component;

class PrintContent extends Component
{
    public $target;

    public function load()
    {
        
    }

    public function render()
    {
        return view('livewire.settings.printer-and-label.print-content');
    }
}
