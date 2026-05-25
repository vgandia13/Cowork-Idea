<?php

namespace Src\BC\Subscription\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BC\Subscription\Application\UseCase\DeleteSubscriptionUseCase;

class DeleteSubscriptionController extends Controller
{
    public function __construct(
        private readonly DeleteSubscriptionUseCase $useCase,
    ) {
    }

    public function __invoke(string $id): JsonResponse
    {
        $this->useCase->execute($id);

        return response()->json([
            'status' => 'success',
            'data' => null,
        ], 200);
    }
}
