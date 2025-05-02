@extends('template.user')

<link rel="stylesheet" href="{{ asset('css/chitiet.css') }}">

@section('body')
<div class="container">
    <h1>Chi tiết sản phẩm</h1>
    <div class="card">
        <img src="{{ asset('image/' . $show->image) }}" alt="Hình ảnh sản phẩm">

        <div class="card-content">
            <h2 class="title">Tên sản phẩm: {{ $show->name }}</h2>
            <p class="sold-count">Tổng số sản phẩm đã bán ra: {{ $show->buying }}</p>
            <p class="product-price"><strong>Giá:</strong> {{ number_format($show->price) }} VND</p>
            <p class="product-saleprice"><strong>Giá khuyến mãi:</strong> {{ number_format($show->saleprice) }} VND</p>
            <p><strong>Số lượng:</strong> {{ $show->quantity }}</p>

            <form action="{{ route('cart.add', $show->id) }}" method="POST">
                @csrf
                <button type="submit" class="product-detail-btn">Thêm vào giỏ hàng</button>
            </form>

            <p class="description"><strong>Mô tả:</strong> {{ $show->description }}</p>
        </div>
    </div>
</div>
@endsection
