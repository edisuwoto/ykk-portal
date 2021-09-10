<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class Machine extends Component
{
    use InteractsWithModal;

    public $readyToLoad = FALSE;

    public function load()
    {
        $this->readyToLoad = TRUE;
    }

    public function render()
    {
        return view('livewire.master.machine');
    }
}
