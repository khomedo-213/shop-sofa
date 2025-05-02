@extends('template.admin')
<link rel="stylesheet" href="{{ asset('/css/admin_category.css') }}">
@section('body')
    <h2>Cập nhật danh mục</h2>

    @if (session('success') || session('error'))
        <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') ?? session('error') }}
        </div>
    @endif
    <form class="edit" action="{{ route('admin.sua_danh_muc', $categories->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $categories->name) }}" placeholder="Tên danh mục" required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <textarea name="description" placeholder="Mô tả">{{ old('description', $categories->description) }}</textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit">Cập nhật</button>
    </form>
@endsection
