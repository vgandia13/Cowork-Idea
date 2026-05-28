<?php

namespace Src\BC\User\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\User\Application\DTO\UserUpdateDTO;
use Src\BC\User\Application\UseCase\UpdateUserUseCase;

class UpdateUserController extends Controller {

    public function __construct(private readonly UpdateUserUseCase $useCase) {}

    public function __invoke(string $id, Request $request): JsonResponse {
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|max:255',
            'phone' => 'sometimes|nullable|string|max:255',
            'password_hash' => 'sometimes|string|max:255',
            'role' => 'sometimes|string|max:255',
            'registration_date' => 'sometimes|date',
            'active' => 'sometimes|boolean',
        ]);

        $dto = new UserUpdateDTO(
            id: $id,
            firstName: $validated['first_name'] ?? null,
            lastName: $validated['last_name'] ?? null,
            email: $validated['email'] ?? null,
            phone: $validated['phone'] ?? null,
            passwordHash: $validated['password_hash'] ?? null,

            role: $validated['role'] ?? null,
            registrationDate: $validated['registration_date'] ?? null,
            active: $validated['active'] ?? null,
        );

        try {
            $user = $this->useCase->execute($dto);
        } catch (\RuntimeException $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $user->jsonSerialize(),
        ]);
    }
}
