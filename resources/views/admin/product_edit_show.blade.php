@extends('template.admin')

@section('body')
    <link rel="stylesheet" href="{{ asset('/css/admin_product_edit_form.css') }}">
    <h2>Cập nhật sản phẩm</h2>
    <form class="edit" action="{{ route('admin.suasanpham2', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="file" name="image" value="{{ old('image', $product->image) }}" placeholder="Hình sản phẩm" required>
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Tên sản phẩm" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <textarea name="description" placeholder="Mô tả">{{ old('description', $product->description) }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Giá" step="0.01"
            required>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <input type="number" name="saleprice" value="{{ old('saleprice', $product->saleprice) }}" placeholder="Giá giảm"
            step="0.01">
        @error('saleprice')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <select name="categories_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->categories_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('categories_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit">Cập nhật</button>
    </form>
@endsection
