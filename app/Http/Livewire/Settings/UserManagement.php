<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

// Models
use App\Models\User;

class UserManagement extends Component
{
    public function getUserProperty()
    {
        return User::get();
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
