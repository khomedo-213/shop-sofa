@extends('template.admin')

@section('body')
    <link rel="stylesheet" href="{{ asset('/css/admin_category_form.css') }}">

    @if (session('success') || session('error'))
        <div id="alert-message"
            class="{{ session('success') ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700' }}
                    px-4 py-3 rounded mb-4">
            {{ session('success') ?? session('error') }}
        </div>
    @endif


    <form class="add_category" action="{{ route('admin.category_add') }}" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" name="name" placeholder="Tên danh mục" required value="{{ old('name') }}" class="form-input">
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <textarea name="description" placeholder="Mô tả" class="form-input">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="submit-btn">Thêm danh mục</button>
    </form>
@endsection
