<?php

namespace App\Http\Livewire\Settings\UserManagement;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\{User, Role};

// Traits
use App\Http\Traits\Livewire\InteractsWithModal;

class IndexTable extends DataTableComponent
{
    use InteractsWithModal;

    public bool $perPageAll = true;

    public function filters(): array
    {
        return [
            'roles' => Filter::make('Role')
                ->select(collect([0 => 'Any'])->merge((Role::get())->pluck('description' ,'id')->toArray())->toArray()),
        ];
    }

    /**
     * Define column.
     *
     * return $array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->format(function($value, $column, $row){
                    return
                        '<div class="flex items-center">'.
                            '<img src="'.$row->profile_photo_url.'" class="rounded-full h-8 w-8">&nbsp;'.
                            '<span>'.$value.'</span>'.
                        '</div>';
                })
                ->asHtml()
                ->sortable()
                ->searchable(),
            Column::make(__('Email'), 'email')
                ->sortable(),
            Column::make(__('Actions'))
                ->format(function($value, $column, $row){
                    return view('livewire.settings.user-management.index-table.action', compact('row'));
                }),
        ];
    }

    public function setTableRowClass($row): ?string
    {
        return 'whitespace-nowrap truncate text-sm';
    }

    /**
     * Generate models query
     *
     * return Models $query
     */
    public function query(): Builder
    {
        return User::query()
            ->when(
                auth()->user()->role->name,
                fn($query, $role) => $role == 'developer' ? $query : $query->whereNotIn('role_id', (Role::where('name', 'developer')->get())->pluck('id')))
            ->when($this->getFilter('roles'), fn ($query, $roles) => $query->where(['role_id' => $roles]));
    }

    /**
     * Open Edit Form modal
     *
     * @param User $id
     *
     */
    public function edit($id)
    {
        $this->openModal('settings.user-management.modal.edit-form', ['user_id' => $id], __('Edit User'));
    }
}
