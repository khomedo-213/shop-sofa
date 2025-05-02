@extends('template.user')

@section('body')
<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

@if (session('success'))
    <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<p>Sản phẩm hot</p>
<div class="wrapper">
    <div class="product-container">
        @foreach ($showHot as $index)
            <div class="product-card">
                <a href="/chitiet/{{ $index->id }}">
                    <img class="product-image" src="{{ asset('image/' . $index->image) }}" alt="Image">
                    <h3 class="product-name">{{ $index->name }}</h3>
                    <p class="sold-count">Đã bán: {{ $index->buying }}</p>
                    <p class="product-price">Giá: <span>{{ number_format($index->price) }} VND</span></p>
                    <p class="product-saleprice">Giá khuyến mãi: <span>{{ number_format($index->saleprice) }} VND</span></p>
                    <button class="product-detail-btn">Chi tiết</button>
                </a>
                <form action="{{ route('cart.add', $index->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<p>Sản phẩm mới</p>
<div class="wrapper">
    <div class="product-container">
        @foreach ($showNew as $index)
            <div class="product-card">
                <a href="/chitiet/{{ $index->id }}">
                    <img class="product-image" src="{{ asset('image/' . $index->image) }}" alt="Image">
                    <h3 class="product-name">{{ $index->name }}</h3>
                    <p class="sold-count">Tổng số sản phẩm đã bán ra: {{ $index->buying }}</p>
                    <p class="product-price">Giá: <span>{{ number_format($index->price) }} VND</span></p>
                    <p class="product-saleprice">Giá khuyến mãi: <span>{{ number_format($index->saleprice) }} VND</span></p>
                    <button class="product-detail-btn">Chi tiết</button>
                </a>
                <form action="{{ route('cart.add', $index->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<p>Các sản phẩm khác</p>
<div class="wrapper">
    <div class="product-container">
        @foreach ($showAll->take(5) as $index)
            <div class="product-card">
                <a href="/chitiet/{{ $index->id }}">
                    <img class="product-image" src="{{ asset('image/' . $index->image) }}" alt="Image">
                    <h3 class="product-name">{{ $index->name }}</h3>
                    <p class="sold-count">Tổng số sản phẩm đã bán ra: {{ $index->buying }}</p>
                    <p class="product-price">Giá: <span>{{ number_format($index->price) }} VND</span></p>
                    <p class="product-saleprice">Giá khuyến mãi: <span>{{ number_format($index->saleprice) }} VND</span></p>
                    <button class="product-detail-btn">Chi tiết</button>
                </a>
                <form action="{{ route('cart.add', $index->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
                </form>
            </div>
        @endforeach
    </div>
</div>


@endsection
