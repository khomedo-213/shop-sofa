@extends('template.admin')
@section('body')
<link rel="stylesheet" href="{{ asset('/css/admin_invoice_edit_form.css') }}">

<h2>Cập nhật hóa đơn</h2>

<form class="edit" action="{{ route('admin.sua_hoa_don', ['id' => $invoice->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="total_amount">Tổng tiền:</label>
        <input type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $invoice->total_amount) }}" required>
        @error('total_amount')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="address">Địa chỉ:</label>
        <input type="text" name="address" id="address" value="{{ old('address', $invoice->address) }}" required>
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="issued_date">Ngày xuất:</label>
        <input type="date" name="issued_date" id="issued_date" value="{{ old('issued_date', $invoice->issued_date) }}" required>
        @error('issued_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="status">Trạng thái:</label>
        <select name="status" id="status" required>
            <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
            <option value="cancelled" {{ old('status', $invoice->status) == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
            <option value="pending" {{ old('status', $invoice->status) == 'pending' ? 'selected' : '' }}>Đang chờ</option>
        </select>
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="payment">Hình thức thanh toán:</label>
        <select name="payment" id="payment" required>
            <option value="tructiep" {{ old('payment', $invoice->payment) == 'tructiep' ? 'selected' : '' }}>Trực tiếp</option>
            <option value="chuyenkhoan" {{ old('payment', $invoice->payment) == 'chuyenkhoan' ? 'selected' : '' }}>Chuyển khoản</option>
        </select>
        @error('payment')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="note">Ghi chú:</label>
        <textarea name="note" id="note" placeholder="Nhập ghi chú">{{ old('note', $invoice->note) }}</textarea>
        @error('note')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Cập nhật hóa đơn</button>
</form>
@endsection
