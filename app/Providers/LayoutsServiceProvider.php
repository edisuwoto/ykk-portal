<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class LayoutsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Livewire Tables
        Blade::component('livewire-tables::layouts.components.table.table', 'livewire-tables::layouts.table');
        Blade::component('livewire-tables::layouts.components.table.heading', 'livewire-tables::layouts.table.heading');
        Blade::component('livewire-tables::layouts.components.table.row', 'livewire-tables::layouts.table.row');
        Blade::component('livewire-tables::layouts.components.table.cell', 'livewire-tables::layouts.table.cell');
    }
}
