<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\{ Permission, Role };

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'              => 'user_management-access',
                'description'       => 'Access user management',
            ],
            [
                'name'              => 'user-create',
                'description'       => 'Create user',
            ],
            [
                'name'              => 'user-edit',
                'description'       => 'Edit user',
            ],
            [
                'name'              => 'user-delete',
                'description'       => 'Delete user',
            ],
            [
                'name'              => 'user_role-edit',
                'description'       => 'Edit user\'s roles',
            ],
            [
                'name'              => 'user_permission-edit',
                'description'       => 'Edit user\'s permissions',
            ],
        ];

        try {
            return \DB::transaction(function () use($permissions){
                Permission::upsert($permissions, ['name'], ['description']);

                $roles = Role::get();
                $permissions = Permission::get();

                $superuser = $roles->where('name', 'superuser')->first();

                $superuser->permissions()->sync(
                    $permissions->map(
                        fn($permission) => $permission->id
                    )->toArray()
                );

                $admin = $roles->where('name', 'admin')->first();

                $admin->permissions()->sync(
                    $permissions->filter(
                        fn($permission) => in_array($permission->name, [
                            'user_management-access',
                            'user-create',
                            'user-edit',
                            'user-delete',
                        ])
                    )->map(
                        fn($permission) => $permission->id
                    )->toArray()
                );
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
