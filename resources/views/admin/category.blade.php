@extends('template.admin')

<link rel="stylesheet" href="{{ asset('/css/adminp.css') }}">
@section('body')
    <h2>Quản lý danh mục</h2>
    <a href="/admin/them_danh_muc" class="btn btn-success">Thêm danh mục mới</a>

    @if (session('success') || session('error'))
        <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') ?? session('error') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $index => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <form class="edit" action="{{ route('admin.form_sua_danh_muc', $product->id) }}" method="get">
                            @csrf
                            <button type="submit">Sửa</button>
                        </form>
                        <form class="delete" action="{{ route('admin.xoa_danh_muc', $product->id) }}" method="POST"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
