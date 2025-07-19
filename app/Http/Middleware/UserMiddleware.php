<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;
class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل دخوله وله usertype = "user"
        if (Auth::check() && Auth::user()->type === 'user') {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'ليس لديك صلاحية الوصول!');
    }
}
