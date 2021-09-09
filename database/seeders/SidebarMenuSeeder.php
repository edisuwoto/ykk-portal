<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\{ Menu, Permission };

class SidebarMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            return \DB::transaction(function () {
                $permissions = Permission::get();
                
                Menu::updateOrCreate(
                    [
                        'title'         => 'Home',
                    ],
                    [
                        'parent_id'     => 0,
                        'link'          => 'dashboard',
                        'link_type'     => 'route',
                        'icon'          => 'fas fa-home',
                        'sort'          => 1,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Master Data',
                    ],
                    [
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-database',
                        'sort'          => 2,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Items',
                    ],
                    [
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-boxes',
                        'sort'          => 1,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Customers',
                    ],
                    [
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-user-tie',
                        'sort'          => 2,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Machines',
                    ],
                    [
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-cogs',
                        'sort'          => 3,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Work Center',
                    ],
                    [
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-building',
                        'sort'          => 4,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Units',
                    ],
                    [
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-balance-scale',
                        'sort'          => 5,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Productions',
                    ],
                    [
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-industry',
                        'sort'          => 3,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Work Order',
                    ],
                    [
                        'parent_id'     => 8,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-file-alt',
                        'sort'          => 1,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Reports',
                    ],
                    [
                        'parent_id'     => 8,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-chart-bar',
                        'sort'          => 2,
                        'active'        => true,
                    ]
                );

                Menu::updateOrCreate(
                    [
                        'title'         => 'Settings',
                    ],
                    [
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-cog',
                        'sort'          => 4,
                        'active'        => true,
                    ]
                );

                $user_management = Menu::updateOrCreate(
                    [
                        'title'         => 'User Management',
                    ],
                    [
                        'parent_id'     => 11,
                        'link'          => 'settings.user-management',
                        'link_type'     => 'route',
                        'icon'          => 'fas fa-user-cog',
                        'sort'          => 1,
                        'active'        => true,
                    ]
                );

                $user_management
                    ->permissions()
                    ->sync($permissions
                        ->filter(
                            fn($permission) => in_array($permission->name, ['user_management-access'])
                        )
                        ->map(
                            fn($permission) => $permission->id
                        )
                    );

                $printers_labels = Menu::updateOrCreate(
                    [
                        'title'         => 'Printers and Labels',
                    ],
                    [
                        'parent_id'     => 11,
                        'link'          => 'settings.printers-labels',
                        'link_type'     => 'route',
                        'icon'          => 'fas fa-print',
                        'sort'          => 2,
                        'active'        => true,
                    ]
                );
                
                $printers_labels
                    ->permissions()
                    ->sync($permissions
                        ->filter(
                            fn($permission) => in_array($permission->name, ['printers_and_labels-access'])
                        )
                        ->map(
                            fn($permission) => $permission->id
                        )
                    );

                $plc_settings = Menu::updateOrCreate(
                    [
                        'title'         => 'PLC Settings',
                    ],
                    [
                        'parent_id'     => 11,
                        'link'          => 'settings.plc-settings',
                        'link_type'     => 'route',
                        'icon'          => 'fas fa-server',
                        'sort'          => 3,
                        'active'        => true,
                    ]
                );

                $plc_settings
                    ->permissions()
                    ->sync($permissions
                        ->filter(
                            fn($permission) => in_array($permission->name, ['plc_settings-access'])
                        )
                        ->map(
                            fn($permission) => $permission->id
                        )
                    );
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
