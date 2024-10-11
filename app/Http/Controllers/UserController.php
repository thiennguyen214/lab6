<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

    
        Auth::user()->update($request->only('username', 'email'));

        return back()->with('success', 'Thông tin đã được cập nhật.');
    }

    public function showFogotForm(){

        return view('users.forgotpassword');

    }

    
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        
        Auth::user()->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Mật khẩu đã được đổi thành công.');
    }
}
