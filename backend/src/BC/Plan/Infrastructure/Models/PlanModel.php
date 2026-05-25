<?php

namespace Src\BC\Plan\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    protected $table = 'plans';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'duration',
        'credits',
        'meeting_hours',
        'access247',
        'active',
    ];

    protected $casts = [
        'price' => 'float',
        'credits' => 'integer',
        'meeting_hours' => 'integer',
        'access247' => 'boolean',
        'active' => 'boolean',
    ];
}
