@extends('template.admin')
@section('body')
    <link rel="stylesheet" href="{{ asset('/css/adminproductadd.css') }}">
    <form class="addproduct" action="{{ route('admin.productadd') }}" method="POST">
        @csrf
        <input type="file" name="image" placeholder="Hình sản phẩm" required><br>
        <input type="text" name="name" placeholder="Tên sản phẩm" required><br>
        <textarea name="description" placeholder="Mô tả"></textarea><br>
        <select name="categories_id" required>
            <option value="">-- Chọn danh mục --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>
        <input type="number" name="price" placeholder="Giá" step="0.01" required><br>
        <input type="number" name="saleprice" placeholder="Giá giảm" step="0.01"><br>
        <button type="submit">Thêm sản phẩm</button>
    </form>
@endsection
