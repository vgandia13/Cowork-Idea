<?php

namespace Src\BC\User\UI\Controller\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BC\User\Application\DTO\UserDTO;
use Src\BC\User\Application\UseCase\CreateUserUseCase;
use Src\BC\User\Domain\Enumerations\UserRoleEnumeration;

class RegisterController
{
    public function __construct(private readonly CreateUserUseCase $useCase ) {}

    public function __invoke(Request $request): JsonResponse {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|max:255',
            'role' => 'nullable|string|max:255',
            'registration_date' => 'nullable|date',
            'active' => 'nullable|boolean',
        ]);

        $dto = new UserDTO(
            id: null,
            firstName: $validated['first_name'],
            lastName: $validated['last_name'],
            email: $validated['email'],
            phone: $validated['phone'] ?? null,
            passwordHash: Hash::make($validated['password']),
            role: $validated['role'] ?? UserRoleEnumeration::MEMBER->value,
            registrationDate: now(),
            active: true,
        );

        $user = $this->useCase->execute($dto);

        return response()->json([
            'status' => 'success',
            'data' => $user->jsonSerialize(),
        ], 201);
    }
}
