@extends('template.admin')
@section('body')
<link rel="stylesheet" href="{{ asset('css/chitiet_donhang.css') }}">
<div class="container">
    <h1>Chi tiết đơn hàng</h1>
    <div class="card">
        @php
            $paymentStatus = [
                'pending' => 'Đang chờ',
                'paid' => 'Đã thanh toán',
                'cancelled' => 'Đã hủy',
            ];

            $paymentMethods = [
                'tructiep' => 'Trực tiếp',
                'chuyenkhoan' => 'Chuyển khoản',
            ]
        @endphp
        <div class="card-content">
            <p><strong>Email Khách hàng:</strong> {{ $show->user->email }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($show->total_amount) }} VND</p>
            <p><strong>Địa chỉ:</strong> {{ $show->address }}</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $paymentMethods[$show->payment] }}</p>
            <p><strong>Ngày lập hóa đơn:</strong> {{ $show->issued_date }}</p>
            <p><strong>Trạng thái:</strong>
                {{ $paymentStatus[$show->status] ?? 'Không xác định' }}
            </p>
            <p><strong>Ghi chú:</strong> {{ $show->note }}</p>
        </div>
    </div>
</div>
<a href="{{ route('admin.invoice') }}" class="btn-back">← Quay lại danh sách hóa đơn</a>

@endsection
