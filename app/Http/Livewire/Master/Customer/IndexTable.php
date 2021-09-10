<?php

namespace App\Http\Livewire\Master\Customer;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

// Models
use App\Models\Master\Customer;

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
            Column::make(__('customer.code'), 'code')
                ->sortable(),
            Column::make(__('customer.name'), 'name')
                ->sortable(),
            Column::make(__('customer.status'), 'status')
                ->sortable(),
            Column::make(__('customer.action'))
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
        return Customer::query();
    }
}
