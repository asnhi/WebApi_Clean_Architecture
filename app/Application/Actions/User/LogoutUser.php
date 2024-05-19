<?php
declare(strict_types=1);


namespace App\Application\Actions\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutUser
{
    public function handle()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Đăng xuất tài khoản thành công'
        ]);
    }
}