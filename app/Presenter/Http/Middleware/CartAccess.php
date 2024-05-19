<?php
declare(strict_types=1);
namespace App\Presenter\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CartAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập không
        if (!auth()->check()) {
            return response()->json(['error' => 'Bạn chưa đăng nhập vào cửa hàng'], 401);
        }

        // Nếu đã đăng nhập, tiếp tục xử lý request
        return $next($request);
    }
}
