<?php

namespace Src\BC\Coworking\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Coworking\Application\UseCase\ReadCoworkingUseCase;

class ReadCoworkingController extends Controller {

    public function __construct(private readonly ReadCoworkingUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse    {
        $coworking = $this->useCase->execute($id);

        if (!$coworking) {
            return response()->json([
                'status' => 'error',
                'error' => "El coworking con el id {$id} no existe",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $coworking->jsonSerialize(),
        ]);
    }
}
