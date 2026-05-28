<?php

namespace Src\BC\User\UI\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\BC\User\Application\DTO\UserDTO;
use Src\BC\User\Application\UseCase\CreateUserUseCase;
use Src\BC\User\Domain\Enumerations\UserRoleEnumeration;

class CreateUserController extends Controller {

    public function __construct(private readonly CreateUserUseCase $useCase) {}

    public function __invoke(Request $request): JsonResponse {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'password_hash' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'registration_date' => 'required|date',
            'active' => 'required|boolean',
        ]);

        $dto = new UserDTO(
            id: null,
            firstName: $validated['first_name'],
            lastName: $validated['last_name'],
            email: $validated['email'],
            phone: $validated['phone'] ?? null,
            passwordHash: $validated['password_hash'],
            role: $validated['role'] ?? UserRoleEnumeration::MEMBER->value,
            registrationDate: $validated['registration_date'],
            active: $validated['active'],
        );

        $user = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $user->jsonSerialize(),
        ], 201);
    }
}
