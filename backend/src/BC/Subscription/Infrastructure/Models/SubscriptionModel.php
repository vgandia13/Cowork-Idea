<?php

namespace Src\BC\Subscription\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = 'subscriptions';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'plan_id',
        'start_date',
        'end_date',
        'auto_renewal',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'auto_renewal' => 'boolean',
    ];
}
