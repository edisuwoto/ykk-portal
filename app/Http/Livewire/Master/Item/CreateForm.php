<?php

namespace App\Http\Livewire\Master\Item;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateForm extends Component
{
    use WithFileUploads;

    public $filters = [
        'search'        => '',
    ];

    public $form = [
        'code'          => '',
        'name_1'        => '',
        'name_2'        => '',
        'name_3'        => '',
        'active'        => true,
        'color'         => '',
        'quantity'      => 0,
        'weight'        => 0,
        'picture_path'  => '',
    ];

    public $photo;

    public function removePhoto()
    {
        $this->form['picture_path'] = '';
    }

    public function submit()
    {
        session()->flash('success', __('messages.saved'));
        return redirect()->route('master.items.show');
    }

    public function render()
    {
        return view('livewire.master.item.create-form');
    }
}
