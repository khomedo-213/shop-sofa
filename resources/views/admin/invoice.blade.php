@extends('template.admin')
@section('body')
<link rel="stylesheet" href="{{ asset('/css/admin_invoice.css') }}">
    <h2>Quản lý hóa đơn</h2>

    @if (session('success') || session('error'))
        <div id="alert-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') ?? session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày thanh toán</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $invoice)
                @php
                    $paymentStatus = [
                        'pending' => 'Đang chờ',
                        'paid' => 'Đã thanh toán',
                        'cancelled' => 'Đã hũy',
                    ];
                    $statusText = $paymentStatus[$invoice->status] ?? 'Không xác định';
                @endphp
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->issued_date }}</td>
                    <td class="status-{{ $invoice->status }}">{{ $statusText }}</td>
                    <td>
                        <form action="{{ route('admin.form_sua_hoa_don', $invoice->id) }}" method="GET" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>

                        <form action="{{ route('admin.xoa_hoa_don', $invoice->id) }}" method="POST" style="display:inline-block;"
                              onsubmit="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>

                        <form action="{{ route('admin.chi_tiet_hoa_don', $invoice->id) }}" method="GET" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Chi tiết</button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
