<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من أن المستخدم مسجل دخوله وله usertype = "admin"
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'ليس لديك صلاحية الوصول!');
    }
}
