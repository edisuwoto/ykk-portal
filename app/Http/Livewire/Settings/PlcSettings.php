<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class PlcSettings extends Component
{
    use InteractsWithModal;

    public $form = [
        'ip_address'    => '0.0.0.0',
        'port'          => 0,
        'sa1'           => 0,
        'dna1'          => 0,
        'da1'           => 0,
    ];

    public $status = 'disconnected';

    public function mount()
    {
        if (!auth()->user()->hasPermission('plc_settings-access')) {
            session()->flash('failed', __('You are not authorize'));
            return redirect()->route('dashboard');
        }
    }

    public function sync()
    {
        switch ($this->status) {
            case 'connected':
                $this->status = 'disconnected';
                break;
            case 'disconnected':
                $this->status = 'connected';
                break;
            case 'unknown':
                $this->status = 'connected';
                break;
            default:
                $this->status = 'unknown';
                break;
        }
    }

    public function submit()
    {
        $this->dispatchBrowserEvent('success-message', __('messages.saved'));
    }

    public function render()
    {
        return view('livewire.settings.plc-settings')
            ->layoutData([
                'header'    =>  <<<'blade'
                                    <h2 class="font-bold">
                                blade.__('PLC Settings').
                                <<<'blade'
                                    </h2>
                                blade,
            ]);
    }
}
