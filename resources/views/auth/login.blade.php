@extends('auth.layout.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        
        @if (session()->has('success') && !session()->get('success'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success') && session()->get('success'))
            <div class="alert alert-info">
                Thao tác thành công
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mt-3 mb-3 text-center">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group  mt-3 mb-3">

                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">

                <label for="password">Mật khẩu</label>
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Đăng nhập</button>
            <a class="btn btn-info" href="{{ route('register.form') }}">Register</a>
        </form>

    </div>
@endsection
