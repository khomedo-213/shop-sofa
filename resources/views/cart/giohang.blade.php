@extends('template.user')

<link rel="stylesheet" href="{{ asset('/css/giohang.css') }}">

@section('body')

@if (session('success') || session('error'))
    <div id="alert-message"
         class="px-4 py-3 rounded {{ session('success') ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }}">
        {{ session('success') ?? session('error') }}
    </div>
@endif

@if(count($cart) > 0)
    <table>
        <tr>
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Giá KM</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>

        @php $total = 0; @endphp

        @foreach($cart as $id => $item)
            @php
                $subtotal = $item['saleprice'] * $item['quantity'];
                $total += $subtotal;
            @endphp
            <tr>
                <td><img src="{{ asset('image/' . $item['image']) }}" width="50" alt="Ảnh sản phẩm"></td>
                <td>{{ $item['name'] }}</td>
                <td>{{ number_format($item['price']) }} VND</td>
                <td>{{ number_format($item['saleprice']) }} VND</td>
                <td>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                        <button type="submit">Cập nhật</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="get">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach

        <!-- Tổng tiền -->
        <tr>
            <td colspan="6" style="text-align: right; font-weight: bold;">
                Tổng tiền: {{ number_format($total) }} VND
            </td>
        </tr>

        <!-- Nút thanh toán -->
        <tr>
            <td colspan="6" style="text-align: right;">
                <form action="{{ route('cart.checkout') }}" method="put">
                    @csrf
                    <button type="submit" class="btn btn-primary">Thanh Toán</button>
                </form>
            </td>
        </tr>
    </table>

    <!-- Nút xóa toàn bộ giỏ hàng -->
    <form action="{{ route('cart.clear') }}" method="get" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit">Xóa giỏ hàng</button>
    </form>
@else
    <p>Giỏ hàng của bạn đang trống!</p>
@endif

@endsection
