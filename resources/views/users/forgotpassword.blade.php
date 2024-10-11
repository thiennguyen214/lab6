@extends('users.layout.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">

        <h2 class="mt-3 mb-3 text-center">Đổi mật khẩu</h2>

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

        <form method="POST" action="{{ route('users.changePassword') }}">
            @csrf
            <div class="mt-3 mb-3">

                <label for="current_password">Mật khẩu hiện tại</label>
                <input class="form-control" type="password" name="current_password" placeholder="Mật khẩu hiện tại">
                @error('current_password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3 mb-3">
                <label for="new_password">Mật khẩu mới</label>
                <input class="form-control" type="password" name="new_password" placeholder="Mật khẩu mới">
                @error('new_password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3 mb-3">
                <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                <input class="form-control" type="password" name="new_password_confirmation"
                    placeholder="Xác nhận mật khẩu mới">
            </div>

            <button class="btn btn-primary" type="submit">Đổi mật khẩu</button>
            <a class="btn btn-danger" href="{{ route('users.show')}}">Thông tin</a>
        </form>
    </div>
@endsection
