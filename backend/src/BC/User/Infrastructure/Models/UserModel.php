<?php

namespace Src\BC\User\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password_hash',
        'avatar',
        'company',
        'role',
        'bio',
        'registration_date',
        'active',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
        'active' => 'boolean',
    ];
}
