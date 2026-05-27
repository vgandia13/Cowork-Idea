<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\BC\Coworking\Infrastructure\Models\CoworkingModel;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

class CoworkingAmenitySeeder extends Seeder
{
    public function run(): void
    {
        $coworkings = CoworkingModel::all()->keyBy('slug');
        $amenities  = AmenityModel::all()->keyBy('name');

        // Cowork Valencia Centro
        $coworkings['cowork-valencia-centro']->amenities()->sync([
            $amenities['WiFi de alta velocidad']->id,
            $amenities['Café y agua']->id,
            $amenities['Recepción']->id,
            $amenities['Aire acondicionado']->id,
        ]);

        // WorkHub Valencia Marina
        $coworkings['workhub-valencia-marina']->amenities()->sync([
            $amenities['WiFi de alta velocidad']->id,
            $amenities['Salas de reuniones']->id,
            $amenities['Impresora / Escáner']->id,
            $amenities['Café y agua']->id,
            $amenities['Acceso 24/7']->id,
            $amenities['Aparcamiento']->id,
            $amenities['Terraza']->id,
        ]);

        // Cowork Barcelona Gótic
        $coworkings['cowork-barcelona-gotic']->amenities()->sync([
            $amenities['WiFi de alta velocidad']->id,
            $amenities['Salas de reuniones']->id,
            $amenities['Café y agua']->id,
            $amenities['Taquillas']->id,
            $amenities['Recepción']->id,
        ]);

        // WorkHub Barcelona Glòries
        $coworkings['workhub-barcelona-glories']->amenities()->sync([
            $amenities['WiFi de alta velocidad']->id,
            $amenities['Salas de reuniones']->id,
            $amenities['Impresora / Escáner']->id,
            $amenities['Café y agua']->id,
            $amenities['Taquillas']->id,
            $amenities['Acceso 24/7']->id,
            $amenities['Aparcamiento']->id,
            $amenities['Monitor adicional']->id,
        ]);
    }
}
