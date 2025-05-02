@extends('template.admin')

<link rel="stylesheet" href="{{ asset('/css/adminp.css') }}">

@section('body')
    <h2>Sản phẩm theo danh mục</h2>
    <a href="/admin/themsanpham" class="btn btn-success">Thêm sản phẩm mới</a>

    @if ($show->isEmpty())
        <p class="no-product">Hiện chưa có sản phẩm nào trong danh mục này.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Đã bán</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset('image/' . $product->image) }}" alt="Image" width="50"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }} VND</td>
                        <td>{{ number_format($product->saleprice) }} VND</td>
                        <td>{{ $product->buying }}</td>
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
    @endif
@endsection
