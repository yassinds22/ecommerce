<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // تحقق مما إذا كان المستخدم مسجلاً للدخول
            if (Auth::check()) {
                // الحصول على نوع المستخدم من قاعدة البيانات
                $userType = Auth::user()->type;

                // التوجيه بناءً على نوع المستخدم
                if ($userType === 'admin') {
                    return response($userType);
                   // return redirect()->route('layout'); // استبدل 'admin.dashboard' باسم المسار الخاص بك
                } elseif ($userType === 'user') {
                    return redirect()->route('home');
                   // return redirect()->route('home'); // استبدل 'user.dashboard' باسم المسار الخاص بك
                }
            }
    //     if(!Auth::guard('admin')->check()){
    //         return redirect()->route('layout');
    //     }
        return $next($request);
     }
}
