<?php
declare(strict_types=1);
namespace App\Presenter\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'Tài khoản chưa được đăng nhập!'], 401);
            } elseif ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 'Hết phiên đăng nhập!'], 401);
            } else {
                return response()->json(['status' => 'Vui lòng đăng nhập vào cửa hàng!'], 401);
            }
        }
        return $next($request);
    }
}
