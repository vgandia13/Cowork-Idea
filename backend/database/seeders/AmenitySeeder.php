<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $amenities = [
            ['name' => 'WiFi de alta velocidad',  'icon' => 'wifi',             'description' => 'Conexión fibra óptica 1 Gbps simétrico'],
            ['name' => 'Salas de reuniones',       'icon' => 'users',            'description' => 'Salas equipadas con pantalla y videoconferencia'],
            ['name' => 'Impresora / Escáner',      'icon' => 'printer',          'description' => 'Impresión en color y escaneado disponible'],
            ['name' => 'Café y agua',              'icon' => 'coffee',           'description' => 'Máquina de café, infusiones y agua filtrada'],
            ['name' => 'Taquillas',                'icon' => 'lock',             'description' => 'Casilleros individuales con llave'],
            ['name' => 'Aparcamiento',             'icon' => 'car',              'description' => 'Plaza de parking incluida o con descuento'],
            ['name' => 'Acceso 24/7',              'icon' => 'clock',            'description' => 'Entrada con tarjeta o código en cualquier horario'],
            ['name' => 'Aire acondicionado',       'icon' => 'wind',             'description' => 'Climatización individual por zona'],
            ['name' => 'Recepción',                'icon' => 'concierge-bell',   'description' => 'Personal de recepción en horario de oficina'],
            ['name' => 'Terraza',                  'icon' => 'sun',              'description' => 'Espacio exterior habilitado para trabajar'],
            ['name' => 'Teléfono / VoIP',          'icon' => 'phone',            'description' => 'Línea telefónica y sistema VoIP disponible'],
            ['name' => 'Monitor adicional',        'icon' => 'monitor',          'description' => 'Pantalla externa disponible bajo petición'],
        ];

        foreach ($amenities as $amenity) {
            DB::table('amenities')->insert([
                'id'          => Str::uuid(),
                'name'        => $amenity['name'],
                'icon'        => $amenity['icon'],
                'description' => $amenity['description'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}