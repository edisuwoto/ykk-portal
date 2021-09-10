<?php

namespace App\Http\Livewire\Master\Unit;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\Master\Unit;

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
            Column::make(__('unit.code'), 'code')
                ->sortable(),
            Column::make(__('unit.name'), 'name')
                ->sortable(),
            Column::make(__('unit.status'), 'status')
                ->sortable(),
            Column::make(__('unit.action'))
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
        return Unit::query();
    }
}
