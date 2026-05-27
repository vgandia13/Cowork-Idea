<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Src\BC\Plan\Infrastructure\Models\PlanModel;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name'          => 'Básico',
                'description'   => 'Acceso 3 días por semana a espacios comunes',
                'price'         => 29.99,
                'duration'      => 'monthly',
                'credits'       => 5,
                'meeting_hours' => 2,
                'access247'     => false,
                'active'        => true,
            ],
            [
                'name'          => 'Estándar',
                'description'   => 'Acceso ilimitado a espacios comunes',
                'price'         => 59.99,
                'duration'      => 'monthly',
                'credits'       => 15,
                'meeting_hours' => 5,
                'access247'     => true,
                'active'        => true,
            ],
            [
                'name'          => 'Premium',
                'description'   => 'Acceso ilimitado + puesto fijo + sala meetings',
                'price'         => 99.99,
                'duration'      => 'monthly',
                'credits'       => 30,
                'meeting_hours' => 10,
                'access247'     => true,
                'active'        => true,
            ],
            [
                'name'          => 'Day Pass',
                'description'   => 'Acceso por 1 día a espacios comunes',
                'price'         => 15.00,
                'duration'      => 'daily',
                'credits'       => 1,
                'meeting_hours' => 1,
                'access247'     => false,
                'active'        => true,
            ],
        ];

        foreach ($plans as $plan) {
            PlanModel::create([
                'id'            => Str::uuid(),
                'name'          => $plan['name'],
                'description'   => $plan['description'],
                'price'         => $plan['price'],
                'duration'      => $plan['duration'],
                'credits'       => $plan['credits'],
                'meeting_hours' => $plan['meeting_hours'],
                'access247'     => $plan['access247'],
                'active'        => $plan['active'],
            ]);
        }
    }
}
