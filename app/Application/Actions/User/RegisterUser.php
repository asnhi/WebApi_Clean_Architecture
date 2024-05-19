<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Illuminate\Http\Request;
use App\Application\Service\UserService;
use App\Domain\ValueObjects\UserValueObject;

class RegisterUser
{
    public function handle(Request $request, UserService $userService)
    {
        $validatedData = $request->validated();

        $userValueObject = new UserValueObject($validatedData);
        $user = $userService->register($userValueObject);

        return response()->json([
            'message' => 'Đăng ký tài khoản thành công',
            'user' => $user,
        ], 201);
    }
}
