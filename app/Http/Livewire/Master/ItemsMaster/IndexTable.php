<?php

namespace App\Http\Livewire\Master\ItemsMaster;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\Master\Item;

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
            Column::make(__('item.code'), 'code')
                ->sortable(),
            Column::make(__('item.name', ['number' => 1]), 'name_1')
                ->sortable(),
            Column::make(__('item.name', ['number' => 2]), 'name_2')
                ->sortable(),
            Column::make(__('item.name', ['number' => 3]), 'name_3')
                ->sortable(),
            Column::make(__('item.color'), 'color')
                ->sortable(),
            Column::make(__('item.quantity'), 'quantity')
                ->sortable(),
            Column::make(__('item.unit'))
                ->format(fn($value, $column, $row) => ''),
            Column::make(__('item.action'))
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
        return Item::query();
    }
}
