<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Src\BC\User\Infrastructure\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserModel::create([
            'id'                => Str::uuid(),
            'first_name'        => 'Admin',
            'last_name'         => 'Sistema',
            'email'             => 'admin@cowork.com',
            'phone'             => null,
            'password_hash'     => Hash::make('admin123'),
            'role'              => 'Admin',
            'registration_date' => now(),
            'active'            => true,
        ]);
    }
}
