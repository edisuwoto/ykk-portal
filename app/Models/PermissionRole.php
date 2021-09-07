<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PermissionRole extends Pivot
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::created(function($item){
            $users = User::where('role_id', $item->role_id)->get();
            foreach ($users as $user) {
                $user->permissions()->syncWithoutDetaching([$item->permission_id]);
            }
        });

        static::deleted(function($item){
            $users = User::where('role_id', $item->role_id)->get();
            foreach ($users as $user) {
                $user->permissions()->detach([$item->permission_id]);
            }
        });
    }
}
