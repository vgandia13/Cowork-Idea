<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;
use Src\BC\Space\Infrastructure\Models\SpaceModel;

class SpaceSeeder extends Seeder
{
    public function run(): void
    {
        $coworkings = CoworkingModel::all();

        foreach ($coworkings as $coworking) {
            $spaces = [
                [
                    'name'        => 'Puesto Fijo',
                    'slug'        => 'puesto-fijo-' . $coworking->slug,
                    'type'        => 'fixed',
                    'description' => 'Mesa y silla asignada permanentemente',
                    'capacity'    => 1,
                    'price_hour'  => null,
                    'price_day'   => 25.00,
                    'price_month' => 200.00,
                    'size_m2'     => null,
                    'available'   => true,
                    'status'      => 'active',
                ],
                [
                    'name'        => 'Sala Reuniones Pequeña',
                    'slug'        => 'sala-pequena-' . $coworking->slug,
                    'type'        => 'meeting',
                    'description' => 'Sala para 4 personas con pantalla',
                    'capacity'    => 4,
                    'price_hour'  => 15.00,
                    'price_day'   => null,
                    'price_month' => null,
                    'size_m2'     => 20.0,
                    'available'   => true,
                    'status'      => 'active',
                ],
                [
                    'name'        => 'Sala Reuniones Grande',
                    'slug'        => 'sala-grande-' . $coworking->slug,
                    'type'        => 'meeting',
                    'description' => 'Sala para 10 personas con videoconferencia',
                    'capacity'    => 10,
                    'price_hour'  => 30.00,
                    'price_day'   => 120.00,
                    'price_month' => null,
                    'size_m2'     => 40.0,
                    'available'   => true,
                    'status'      => 'active',
                ],
                [
                    'name'        => 'Espacio Flex',
                    'slug'        => 'espacio-flex-' . $coworking->slug,
                    'type'        => 'flex',
                    'description' => 'Zona de trabajo compartido sin puesto fijo',
                    'capacity'    => 20,
                    'price_hour'  => 5.00,
                    'price_day'   => 20.00,
                    'price_month' => 120.00,
                    'size_m2'     => 80.0,
                    'available'   => true,
                    'status'      => 'active',
                ],
                [
                    'name'        => 'Oficina Privada',
                    'slug'        => 'oficina-privada-' . $coworking->slug,
                    'type'        => 'private',
                    'description' => 'Oficina cerrada para 6 personas',
                    'capacity'    => 6,
                    'price_hour'  => null,
                    'price_day'   => 80.00,
                    'price_month' => 600.00,
                    'size_m2'     => 35.0,
                    'available'   => true,
                    'status'      => 'active',
                ],
            ];

            foreach ($spaces as $space) {
                SpaceModel::create([
                    'id'           => Str::uuid(),
                    'coworking_id' => $coworking->id,
                    'name'         => $space['name'],
                    'slug'         => $space['slug'],
                    'type'         => $space['type'],
                    'description'  => $space['description'],
                    'capacity'     => $space['capacity'],
                    'price_hour'   => $space['price_hour'],
                    'price_day'    => $space['price_day'],
                    'price_month'  => $space['price_month'],
                    'size_m2'      => $space['size_m2'],
                    'available'    => $space['available'],
                    'status'       => $space['status'],
                ]);
            }
        }
    }
}
