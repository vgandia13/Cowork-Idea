<?php

namespace Src\BC\User\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\User\Application\UseCase\DeleteUserUseCase;

class DeleteUserController extends Controller {

    public function __construct(private readonly DeleteUserUseCase $useCase) {}

    public function __invoke(string $id): JsonResponse{
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
