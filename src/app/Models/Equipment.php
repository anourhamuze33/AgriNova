<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = [
        'name',
        'type',
        'status',
        'purchase_date',
        'purchase_price',
    ];

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(
            Field::class,
            'equipment_allocations',
            'equipment_id',
            'field_id'
        )->withPivot(['start_date', 'end_date']);
    }

    // public function activeAllocation()
    // {
    //     return $this->hasOne(Field::class)->whereNull('end_date');
    // }

    // public function allocationHistory(): HasMany
    // {
    //     return $this->hasMany(Field::class)->orderBy('start_date', 'desc');
    // }
}
