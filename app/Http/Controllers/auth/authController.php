<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.regster_login');
    }

    public function checkuser(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->pass,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('layout');
        } else {
            return redirect()->back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
        }
    }

    public function Stor(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'pass' => 'required|min:6',
        ]);
    
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->pass;
    
        if ($user->save()) {
            return redirect()->route('login');
        } else {
            return redirect()->back()->withErrors('هناك مشكلة في حفظ البيانات');
        }
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('checkuserLogin');
    }
}