<?php

namespace App\Http\Livewire\Settings\UserManagement;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\{User, Role};

class IndexTable extends DataTableComponent
{
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
            Column::make('name')
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
            Column::make('email')
                ->sortable(),
            Column::make('Actions')
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
            ->when($this->getFilter('roles'), fn ($query, $roles) => $query->where(['role_id' => $roles]));
    }
}
