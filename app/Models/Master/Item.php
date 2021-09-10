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
        'quantity_unit_id',
        'weight',
        'weight_unit_id',
        'picture_path',
    ];

    protected $with = ['quantity_unit', 'weight_unit'];

    /**
     * Get the quantity unit that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quantity_unit()
    {
        return $this->belongsTo(Unit::class, 'quantity_unit_id');
    }

    /**
     * Get the weight unit that owns the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weight_unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'weight_unit_id');
    }
}
