<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $fillable = [
        'code',
        'name_1',
        'name_2',
        'name_3',
        'active',
        'color',
        'quantity',
        'weight',
        'picture_path',
    ];
}
