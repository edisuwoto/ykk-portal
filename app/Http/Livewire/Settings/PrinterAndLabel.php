<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class PrinterAndLabel extends Component
{
    use InteractsWithModal;

    public $form = [
        [
            'printer' => [
                'driver'        => '',
                'description'   => '',
            ],
            'length'  => 0,
            'width'   => 0,
        ],
        [
            'printer' => [
                'driver'        => '',
                'description'   => '',
            ],
            'length'  => 0,
            'width'   => 0,
        ],
    ];

    public function mount()
    {
        if (!auth()->user()->hasPermission('printers_and_labels-access')) {
            session()->flash('failed', __('You are not authorize'));
            return redirect()->route('dashboard');
        }
    }

    public function printContent($target = 'label')
    {
        $this->openModal('settings.printer-and-label.print-content', compact('target'), __('Print Content'), ['header' => TRUE, 'footer' => TRUE]);
    }

    public function submit()
    {
        $this->dispatchBrowserEvent('success-message', __('messages.saved'));
    }

    public function render()
    {
        return view('livewire.settings.printer-and-label')
            ->layoutData([
                'header'    =>  <<<'blade'
                                    <h2 class="font-bold">
                                blade.__('Printers and Labels').
                                <<<'blade'
                                    </h2>
                                blade,
            ]);
    }
}
