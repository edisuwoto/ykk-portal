<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class UserManagement extends Component
{
    use InteractsWithModal;

    public function mount()
    {
        if (!auth()->user()->hasPermission('user_management-access')) {
            session()->flash('failed', __('You are not authorize'));
            return redirect()->route('dashboard');
        }
    }

    public function getUserProperty()
    {
        return User::get();
    }

    public function new()
    {
        $this->openModal('settings.user-management.modal.create-form', [], __('Create User'));
    }

    public function render()
    {
        return view('livewire.settings.user-management')
            ->layoutData([
                'header'    =>  <<<'blade'
                                    <h2 class="font-bold">
                                blade.__('User Management').
                                <<<'blade'
                                    </h2>
                                blade,
            ]);
    }
}
