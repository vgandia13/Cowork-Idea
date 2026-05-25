<?php

namespace Src\BC\User\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\User\Application\UseCase\ReadUserUseCase;

class ReadUserController extends Controller
{
    public function __construct(
        private readonly ReadUserUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $user = $this->useCase->execute($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'error' => "User with id {$id} not found.",
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $user->jsonSerialize(),
        ]);
    }
}
