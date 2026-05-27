<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;

class CoworkingSeeder extends Seeder
{
    public function run(): void
    {
        $coworkings = [
            [
                'name'        => 'Cowork Valencia Centro',
                'slug'        => 'cowork-valencia-centro',
                'address'     => 'Calle de la Paz 12',
                'city'        => 'Valencia',
                'postal_code' => '46003',
                'phone'       => '+34 963 123 456',
                'email'       => 'info@coworkvalencia.com',
                'schedule'    => 'L-V 8:00-20:00',
                'description' => 'Espacio coworking en el casco histórico de Valencia',
                'latitude'    => 39.4699,
                'longitude'   => -0.3763,
                'active'      => true,
            ],
            [
                'name'        => 'WorkHub Valencia Marina',
                'slug'        => 'workhub-valencia-marina',
                'address'     => 'Av. del Puerto 45',
                'city'        => 'Valencia',
                'postal_code' => '46024',
                'phone'       => '+34 963 234 567',
                'email'       => 'info@workhubmarina.com',
                'schedule'    => 'L-V 7:00-22:00',
                'description' => 'Coworking frente a la Marina de Valencia',
                'latitude'    => 39.4568,
                'longitude'   => -0.3286,
                'active'      => true,
            ],
            [
                'name'        => 'Cowork Barcelona Gótic',
                'slug'        => 'cowork-barcelona-gotic',
                'address'     => 'Carrer de Ferran 22',
                'city'        => 'Barcelona',
                'postal_code' => '08002',
                'phone'       => '+34 934 567 890',
                'email'       => 'info@coworkgotico.com',
                'schedule'    => 'L-V 8:30-19:30',
                'description' => 'Coworking en el corazón del Barrio Gótico',
                'latitude'    => 41.3836,
                'longitude'   => 2.1768,
                'active'      => true,
            ],
            [
                'name'        => 'WorkHub Barcelona Glòries',
                'slug'        => 'workhub-barcelona-glories',
                'address'     => 'Av. Diagonal 177',
                'city'        => 'Barcelona',
                'postal_code' => '08018',
                'phone'       => '+34 935 678 901',
                'email'       => 'info@workhubglories.com',
                'schedule'    => 'L-V 7:00-21:00',
                'description' => 'Moderno espacio coworking junto a Glòries',
                'latitude'    => 41.4036,
                'longitude'   => 2.1896,
                'active'      => true,
            ],
        ];

        foreach ($coworkings as $coworking) {
            CoworkingModel::create([
                'id'          => Str::uuid(),
                'name'        => $coworking['name'],
                'slug'        => $coworking['slug'],
                'address'     => $coworking['address'],
                'city'        => $coworking['city'],
                'postal_code' => $coworking['postal_code'],
                'phone'       => $coworking['phone'],
                'email'       => $coworking['email'],
                'schedule'    => $coworking['schedule'],
                'description' => $coworking['description'],
                'latitude'    => $coworking['latitude'],
                'longitude'   => $coworking['longitude'],
                'cover'       => null,
                'gallery'     => null,
                'active'      => $coworking['active'],
            ]);
        }
    }
}
