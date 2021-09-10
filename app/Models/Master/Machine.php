<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    public $fillable = [
        'code',
        'name',
        'status',
        'work_center_id',
    ];

    protected $with = ['work_center'];

    /**
     * Get the work_center that owns the Machine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work_center(): BelongsTo
    {
        return $this->belongsTo(WorkCenter::class);
    }
}
