<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\{User, Role};

class DeveloperSeeder extends Seeder
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
                    'name'      => 'Ahmad Wafiq Amrillah',
                    'email'     => 'wafiqamrillah@gmail.com',
                    'password'  => \Hash::make('wafiqamrillah@gmail.com'),
                    'role_id'   => Role::where('name', 'developer')->first()->id,
                ]);
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
