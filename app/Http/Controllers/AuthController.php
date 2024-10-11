<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký tài khoản
    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'fullname' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'active' => 1,
        ]);


        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect()->route('users.show');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

 
        if (Auth::attempt($request->only('email', 'password'))) {

            if (Auth::user()->active && Auth::user()->role == "user") {

                return redirect()->route('users.show');
            } elseif (Auth::user()->active && Auth::user()->role == "admin") {

                return redirect()->route('admin');
            } else {

                Auth::logout();
                return back()->withErrors(['account_inactive' => 'Tài khoản không còn hoạt động.']);
            }
        }


        return back()->withErrors(['login_failed' => 'Email hoặc mật khẩu không chính xác.']);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
