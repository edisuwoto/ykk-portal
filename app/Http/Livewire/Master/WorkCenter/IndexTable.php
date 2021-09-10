<?php

namespace App\Http\Livewire\Master\WorkCenter;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\Master\WorkCenter;

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
            Column::make(__('work-center.code'), 'code')
                ->sortable(),
            Column::make(__('work-center.name'), 'name')
                ->sortable(),
            Column::make(__('work-center.status'), 'status')
                ->sortable(),
            Column::make(__('work-center.action'))
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
        return WorkCenter::query();
    }
}
