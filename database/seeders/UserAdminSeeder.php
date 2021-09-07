<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\{
    User,
    Role,
};

class UserAdminSeeder extends Seeder
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
                return User::create([
                    'name'      => 'Administrator',
                    'email'     => 'admin@admin.com',
                    'password'  => \Hash::make('password'),
                    'role_id'   => Role::where('name', 'admin')->first()->id,
                ]);
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
