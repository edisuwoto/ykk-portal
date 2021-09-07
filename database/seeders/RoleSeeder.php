<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'              => 'user',
                'description'       => 'User',
            ],
            [
                'name'              => 'developer',
                'description'       => 'Developer',
            ],
            [
                'name'              => 'superuser',
                'description'       => 'Superuser',
            ],
            [
                'name'              => 'admin',
                'description'       => 'Administrator',
            ],
        ];
        try {
            return \DB::transaction(function () use($roles){
                return Role::upsert($roles, ['name'], ['description']);
            });
        } catch (\Exception $e) {
            dd($e);
        }

    }
}
