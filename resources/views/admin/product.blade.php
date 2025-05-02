@extends('template.admin')

<link rel="stylesheet" href="{{ asset('/css/adminp.css') }}">

@section('body')
    <h2>Quản lý sản phẩm</h2>
    <a href="/admin/themsanpham" class="btn btn-success">Thêm sản phẩm mới</a>
    @if (session('success') || session('error'))
        <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') ?? session('error') }}
        </div>
    @endif
    <form action="{{ route('admin.search_admin') }}" method="GET">
        <input type="text" name="keyword" placeholder="Nhập tên sản phẩm ..." value="{{ request('keyword') }}">
        <button type="submit">Tìm kiếm</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $index => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('image/' . $product->image) }}" alt="Image" width="50"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ number_format($product->price) }} VND</td>
                    <td>{{ number_format($product->saleprice) }} VND</td>
                    <td class="action-buttons">
                        <form class="edit" action="{{ route('admin.suasanpham', $product->id) }}" method="get">
                            @csrf
                            <button type="submit">Sửa</button>
                        </form>
                        <form class="delete" action="{{ route('admin.productdelete', $product->id) }}" method="POST"
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
    <div class="pagination custom-pagination">
        {{ $show->links() }}
    </div>
@endsection
