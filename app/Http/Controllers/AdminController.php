<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {




        $users = User::all();

        return view('admin.index', compact('users'));
    }


    public function toggleActive($id)
    {




        $user = User::findOrFail($id);


        if ($user->id === Auth::id()) {
            return redirect()->back()->withErrors('Bạn không thể tự huỷ');
        }
        $user->active = !$user->active;
        $user->save();

        return redirect()->back()->with('success', 'Thông tin tài khoản đã được thay đổi.');
    }

}
