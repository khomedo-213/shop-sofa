@extends('template.user')

<link rel="stylesheet" href="{{ asset('/css/timkiem.css') }}">

@section('body')
@if(isset($show) && count($show) > 0)
    <h2>Kết quả tìm kiếm cho "{{ $keyword }}":</h2>
    <div class="product-container">
        @foreach ($show as $index)
            <div class="product-card">
                <a href="/chitiet/{{ $index->id }}">
                    <img class="product-image" src="{{ asset('image/' . $index->image) }}" alt="Hình ảnh sản phẩm">
                </a>
                <h3 class="product-name">{{ $index->name }}</h3>
                <p class="sold-count">Tổng số sản phẩm đã bán ra: {{ $index->buying }}</p>
                <p class="product-price">Giá: <span>{{ number_format($index->price) }} VND</span></p>
                <p class="product-saleprice">Giá khuyến mãi: <span>{{ number_format($index->saleprice) }} VND</span></p>

                <a href="/chitiet/{{ $index->id }}" class="product-detail-btn">Chi tiết</a>

                <form action="{{ route('cart.add', $index->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <p>Không tìm thấy sản phẩm nào!</p>
@endif
@endsection
