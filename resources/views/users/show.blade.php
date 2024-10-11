@extends('users.layout.master')

@section('title')
    Show
@endsection

@section('content')
    <div class="container ">

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

        <h1 class="mt-3 mb-3 text-center">Thông tin cá nhân</h1>

        <form method="POST" action="{{ route('users.update') }}">
            @csrf

            <div class="form-group mt-3 mb-3">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" value="{{ $user->username }}">
                @error('username')
                    <span>{{ $message }}</span>
                @enderror

                <div class="form-group mt-3 mb-3">

                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Cập nhật thông tin</button>
        </form>

        <a class="btn btn-link" href="{{ route('users.formFogot') }}">Reset Password</a>
        <form action="{{ route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-link">Logout</button>
        </form>
    </div>
@endsection
