<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Amenity\Infrastructure\Models\AmenityModel;

class ListCoworkingAmenitiesController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $amenities = AmenityModel::whereHas('coworkings', fn($q) => $q->where('coworking_id', $id))->get();

        return response()->json(['status' => 'success', 'data' => $amenities]);
    }
}
