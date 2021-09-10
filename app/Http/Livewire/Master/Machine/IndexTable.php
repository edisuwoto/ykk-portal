<?php

namespace App\Http\Livewire\Master\Machine;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\Master\Machine;

class IndexTable extends DataTableComponent
{
    public bool $perPageAll = true;

    /**
     * Define column.
     *
     * return $array
     */
    public function columns(): array
    {
        return [
            Column::make(__('machine.code'), 'code')
                ->sortable(),
            Column::make(__('machine.name'), 'name')
                ->sortable(),
            Column::make(__('machine.status'), 'status')
                ->sortable(),
            Column::make(__('machine.action'))
                ->format(fn($value, $column, $row) => ''),
        ];
    }

    /**
     * Generate models query
     *
     * return Models $query
     */
    public function query(): Builder
    {
        return Machine::query();
    }
}
