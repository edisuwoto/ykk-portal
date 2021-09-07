<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Menu;

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
                $menus = [
                    [
                        'title'         => 'Home',
                        'parent_id'     => 0,
                        'link'          => 'dashboard',
                        'link_type'     => 'route',
                        'icon'          => 'fas fa-home',
                        'sort'          => 1,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Master Data',
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-database',
                        'sort'          => 2,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Items',
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-boxes',
                        'sort'          => 1,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Customers',
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-user-tie',
                        'sort'          => 2,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Machines',
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-cogs',
                        'sort'          => 3,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Work Center',
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-building',
                        'sort'          => 4,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Units',
                        'parent_id'     => 2,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-balance-scale',
                        'sort'          => 5,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Productions',
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-industry',
                        'sort'          => 3,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Work Order',
                        'parent_id'     => 8,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-file-alt',
                        'sort'          => 1,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Reports',
                        'parent_id'     => 8,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-chart-bar',
                        'sort'          => 2,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Settings',
                        'parent_id'     => 0,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-cog',
                        'sort'          => 4,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'User Management',
                        'parent_id'     => 11,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-user-cog',
                        'sort'          => 1,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'Printers and Labels',
                        'parent_id'     => 11,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-print',
                        'sort'          => 2,
                        'active'        => true,
                    ],
                    [
                        'title'         => 'PLC Settings',
                        'parent_id'     => 11,
                        'link'          => '#',
                        'link_type'     => 'url',
                        'icon'          => 'fas fa-server',
                        'sort'          => 3,
                        'active'        => true,
                    ],
                ];

                return Menu::upsert($menus, ['title'], ['parent_id', 'link', 'link_type', 'icon', 'sort', 'active']);
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
