<?php

namespace App\Http\Livewire\Settings\UserManagement\Modal;

use Livewire\Component;
use Crypt;
use DB;

// Models
use App\Models\{ User, Role, Permission };

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class EditForm extends Component
{
    use InteractsWithModal;

    public string $user_id;

    public User $user;
    public array $form = [
        'id'                    => '',
        'name'                  => '',
        'email'                 => '',
        'profile_photo_url'     => '',
        'role_id'               => '',
        'permissions'           => [],
    ];

    public bool $readyToLoad = FALSE;

    // Tabs
    public array $tabs = ['General', 'Permissions'];

    // Data
    public $roles;
    public $permissions;

    public function mount()
    {
        if (!auth()->user()->hasPermission('user-edit')) {
            session()->flash('failed', __('You are not authorize'));
            $this->close();
        }

        if (!auth()->user()->hasPermission('user_permission-edit')){
            $this->tabs = ['General'];
        }
    }

    public function load()
    {
        try {
            $id = Crypt::decrypt($this->user_id);
            try {
                $this->roles = (Role::orderBy('name', 'asc')->get())->filter(fn($role) => $role->name == 'developer' ? (auth()->user()->role->name == 'developer') : TRUE );
                $this->permissions = Permission::orderBy('description', 'asc')->get();

                $this->user = User::with(['permissions'])->find($id);

                $this->form = $this->user->only(array_keys($this->form));

                $this->form['permissions'] = $this->form['permissions']->map(function($item, $key){ return $item->id; })->toArray();

                $this->readyToLoad = TRUE;
            } catch (\Exception $e) {
                $this->close();
                $this->dispatchBrowserEvent('failed-message', $e->getMessage());
            }
        } catch (Illuminate\Contracts\Encryption\DecryptException $e) {
            $this->close();
            $this->dispatchBrowserEvent('failed-message', $e->getMessage());
        }
    }

    public function changeRoles()
    {
        $this->form['permissions'] = Role::find($this->form['role_id'])->permissions->map(function($item, $key){ return $item->id; })->toArray();
    }

    public function setPermission($id)
    {
        if (in_array($id, $this->form['permissions'])) {
            $this->form['permissions'] = array_diff($this->form['permissions'], [$id]);
        } else {
            array_push($this->form['permissions'], $id);
        }
    }

    public function resetPassword()
    {
        $this->resetErrorBag();
        $errors = $this->getErrorBag();
        
        try {
            DB::transaction(function(){
                if (in_array($this->form['id'], [null, ''])) {
                    throw new \Exception(__('messages.not_found'));
                }

                $data = User::find($this->form['id']);
                $form['password'] = \Illuminate\Support\Facades\Hash::make('password');
                $data->update($form);

                session()->flash('user_edit-form.success', __('passwords.reset').' '.__('passwords.current', ['password' => 'password']));
            });
        } catch (\Exception $e) {
            $errors->add('user_edit-form.failed', $e->getMessage());
        }
    }

    public function submit()
    {
        try {
            DB::transaction(function(){
                if (!$this->validation($this->form)->any()) {
                    if ($this->form['id'] != '') {
                        $data = User::find($this->form['id']);
                        $data->update($this->form);
                    } else {
                        $this->form['password'] = \Illuminate\Support\Facades\Hash::make($this->form['email']);
                        $data = User::create($this->form);
                    }
                    $data->permissions()->sync($this->form['permissions']);
                    $this->close();
                }
            });
        } catch (\Exception $e) {
            $this->close();
            $this->dispatchBrowserEvent('failed-message', $e->getMessage());
        }
    }

    protected function validation($form)
    {
        $this->resetErrorBag();
        $errors = $this->getErrorBag();

        $validation_fields = ['name', 'email', 'role_id'];

        // Required
        foreach ($validation_fields as $field) {
            if ($form[$field] == '') {
                $errors->add('form.'.$field, __('validation.required', ['attribute' => (str_replace('_id', '', $field))]));
            }
        }

        $validation_fields = ['email'];

        // Unique
        foreach ($validation_fields as $field) {
            if ($form[$field] != '') {
                $data = User::where($field, $form[$field])->first();
                if ($data) {
                    if ($data->id != $form['id']) {
                        $errors->add('form.'.$field, __('validation.unique', ['attribute' => (str_replace('_id', '', $field))]));
                    }
                }
            }
        }

        return $errors;
    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.settings.user-management.modal.edit-form');
    }
}
