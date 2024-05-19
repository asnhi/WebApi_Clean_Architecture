<?php
declare(strict_types=1);
namespace App\Presenter\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TransformRequest
{
    public function handle(Request $request, Closure $next)
    {
        // Xử lý request PUT với header 'Content-Type: application/json'
        if ($request->isMethod('PUT') && $request->expectsJson()) {
            $request->merge(json_decode($request->getContent(), true));
        }

        return $next($request);
    }
}