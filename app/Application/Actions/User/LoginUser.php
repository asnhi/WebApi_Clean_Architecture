<?php
declare(strict_types=1);


namespace App\Application\Actions\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Application\Service\UserService;

class LoginUser
{
    private $builder;

    public function __construct(UserService $builder)
    {
        $this->builder = $builder;
    }
    public function handle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $validator->validated();
        $token = $this->builder->login($credentials);

        if (!$token) {
            return response()->json(['error' => 'Email hoặc mật khẩu không đúng.'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'user' => $this->builder->getCurrentUser()
        ]);
    }
}
