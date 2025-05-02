<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
</head>
<body>
    <nav>
        <!-- Hàng 1: Logo + Thanh tìm kiếm -->
        <div class="nav-top">
            <div class="logo-search">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/image/logoweb.png') }}" alt="Logo" class="logo">
                </a>
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="keyword" placeholder="Nhập tên sản phẩm ..." value="{{ request('keyword') }}">
                    <button type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="auth-links">
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.product') }}">Quản trị</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            Đăng xuất ({{ Auth::user()->name }})
                        </a>
                    </form>
                @else
                    <a href="{{ route('login.form') }}">Đăng nhập</a>
                    <a href="{{ route('register.form') }}">Đăng ký</a>
                @endauth
            </div>
        </div>

        <!-- Hàng 2: Menu chính -->
        <div class="nav-bottom">
            <a href="{{ url('/') }}">Trang Chủ</a>
            <div class="dropdown">
                <a href="{{ url('/sanpham') }}" class="dropbtn">Sản phẩm ▾</a>
                <div class="dropdown-content">
                    <a href="{{ url('/sanpham') }}">Tất cả sản phẩm</a>
                    <a href="{{ url('/sanpham_go') }}">Sofa Gỗ</a>
                    <a href="{{ url('/sanpham_da') }}">Sofa Da</a>
                    <a href="{{ url('/sanpham_giuong') }}">Sofa Giường</a>
                    <a href="{{ url('/sanpham_da_dung') }}">Sofa Đa Dụng</a>
                </div>
            </div>
            <a href="{{ url('/lienhe') }}">Liên hệ</a>
            <a href="{{ url('/thongtin') }}">Thông tin</a>
            <a href="{{ url('/giohang') }}">Giỏ hàng</a>
        </div>
    </nav>

    <div class="container">
        @yield('body')
    </div>

    <footer>
        <p class="index">&copy; {{ date('Y') }} Shop Sofa - PS37640 - TaThanhTan. All rights reserved.</p>
    </footer>
</body>
</html>
