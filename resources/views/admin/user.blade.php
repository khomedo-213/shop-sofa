@extends('template.admin')

<link rel="stylesheet" href="{{ asset('/css/admin_user.css') }}">

@section('body')
    <div class="user-management">
        <h2 class="title">Quản lý Người dùng</h2>
        @if (session('success') || session('error'))
            <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') ?? session('error') }}
            </div>
        @endif

        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show as $index => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="user-actions">
                                <form action="{{ route('admin.cap_nhap_nguoi_dung', $user->id) }}" method="POST"
                                    class="role-form">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="role-select">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                    <button type="submit" class="btn-save">Lưu</button>
                                </form>

                                <form action="{{ route('admin.xoa_nguoi_dung', $user->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
