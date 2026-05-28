<?php

namespace Src\BC\User\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\User\Application\UseCase\ToggleActiveUserUseCase;

class ToggleActiveUserController extends Controller {
    
    public function __construct(private readonly ToggleActiveUserUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse {
        try {
            $user = $this->useCase->execute($id);
        } catch (\RuntimeException $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 404);
        }

        return response()->json(['status' => 'success', 'data' => $user->jsonSerialize()]);
    }
}
