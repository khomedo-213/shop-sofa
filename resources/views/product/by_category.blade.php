@extends('template.user')

<link rel="stylesheet" href="{{ asset('/css/by_category.css') }}">

@section('body')
    <div class="product-container">
        @if ($show->isEmpty())
            <p class="no-product">Hiện chưa có sản phẩm nào trong danh mục này.</p>
        @else
            @foreach ($show as $product)
                <div class="product-card">
                    <a href="/chitiet/{{ $product->id }}">
                        <img class="product-image" src="{{ asset('image/' . $product->image) }}" alt="Hình ảnh sản phẩm">
                    </a>
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="sold-count">Tổng số sản phẩm đã bán ra: {{ $product->buying }}</p>
                    <p class="product-price">Giá: <span>{{ number_format($product->price) }} VND</span></p>
                    <p class="product-saleprice">Giá khuyến mãi: <span>{{ number_format($product->saleprice) }} VND</span></p>

                    <a href="/chitiet/{{ $product->id }}" class="product-detail-btn">Chi tiết</a>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
