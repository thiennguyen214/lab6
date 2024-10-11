@extends('admin.layout.master')

@section('title')
    Danh sách
@endsection

@section('content')
@section('content')
    <div class="container">
        <h1>Quản lý tài khoản</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if ($user->active)
                                <span class="text-success">Hoạt động</span>
                            @else
                                <span class="text-danger">Đã vô hiệu</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->id !== Auth::id())
                                <form action="{{ route('admin.toggle-active', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}">
                                        {{ $user->active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">Không thể tự huỷ</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@endsection
