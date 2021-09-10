<?php

namespace App\Http\Livewire\Master\Item;

use Livewire\Component;
use Livewire\WithFileUploads;

// Models
use App\Models\Master\{Item, Unit};

class CreateForm extends Component
{
    use WithFileUploads;

    public $filters = [
        'search'        => '',
    ];

    public $form = [
        'code'              => '',
        'name_1'            => '',
        'name_2'            => '',
        'name_3'            => '',
        'active'            => true,
        'color'             => '',
        'quantity'          => 0,
        'quantity_unit_id'  => '',
        'weight'            => 0,
        'weight_unit_id'    => '',
        'picture_path'      => '',
    ];

    public $photo;

    public function getUnitProperty()
    {
        return Unit::get();
    }

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
