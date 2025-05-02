<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>
<body>
    <nav class="nav-left">
        <div>
            <a href="{{ url('/') }}">Trang Chủ</a>
            <div class="dropdown">
                <a href="{{ url('/admin/sanpham') }}" class="dropbtn">Sản phẩm</a>
                <div class="dropdown-content">
                    <select onchange="location = this.value;">
                        <option value="">-- Chọn danh mục --</option>
                        <option value="{{ url('/admin/ad_sanpham_go') }}">Sofa Gỗ</option>
                        <option value="{{ url('/admin/ad_sanpham_da') }}">Sofa Da</option>
                        <option value="{{ url('/admin/ad_sanpham_giuong') }}">Sofa Giường</option>
                        <option value="{{ url('/admin/ad_sanpham_da_dung') }}">Sofa Đa Dụng</option>
                    </select>
                </div>
            </div>

            <a href="{{ route('admin.category') }}">Danh mục</a>
            <a href="{{ route('admin.user') }}">Người dùng</a>
            <a href="{{ route('admin.invoice') }}">Hóa đơn</a>
        </div>

        @auth
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    Đăng xuất ({{ Auth::user()->name }})
                </a>
            </form>
        @endauth
    </nav>

    <div class="container">
        @yield('body')
    </div>
</body>
</html>
