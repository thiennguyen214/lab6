@extends('auth.layout.master')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-3 mb-3 text-center">Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-3 mt-3">

                <label for="username">Fullname</label>
                <input class="form-control" type="text" name="fullname" placeholder="Tên tài khoản" value="{{ old('fullname') }}">
                @error('fullname')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3 mt-3">

                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Tên tài khoản" value="{{ old('username') }}">
                @error('username')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3 mt-3">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3 mt-3">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3 mt-3">
                <label for="">Password confirm</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu">
            </div>
            <button class="btn btn-primary" type="submit">Đăng ký</button>
        </form>
    </div>
@endsection
