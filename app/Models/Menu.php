<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'parent_id',
        'link',
        'link_type',
        'icon',
        'sort',
        'active',
    ];

    protected $with = ['childs', 'permissions'];

    /**
     * Get all of the childs for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    /**
     * The permissions that belong to the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Methods
        /**
         * User has permission
         *
         * @return bool
         */
        public function hasPermission($permission)
        {
            if ($this->permissions->where(['name' => $permission])->first()) {
                return auth()->user()->hasPermission($permission) || auth()->user()->role->name === 'developer' ? TRUE : FALSE;
            } else {
                return TRUE;
            }
        }
}
