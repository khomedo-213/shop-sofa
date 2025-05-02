@extends('template.user')
<link rel="stylesheet" href="{{ asset('/css/lienhe.css') }}">
@section('body')

<div class="mainlh">
    <div class="title">Liên hệ với chúng tôi</div>
    <form class="lienhe" action="#" method="post">
        <div class="hoten">
            <label for="fullname">Họ và tên: </label><br>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="sdt">
            <label for="phone">Số điện thoại/Zalo:</label> <br>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="gmail">
            <label for="email">Email/Gmail:</label> <br>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="GTinh">
            Tôi là: <br>
            <input type="radio" name="gender" id="Nam" value="Nam" checked> <label for="Nam">Nam</label>
            <input type="radio" name="gender" id="Nu" value="Nu"> <label for="Nu">Nữ</label>
        </div>
        <div class="thacmac">
            <label for="question">Thắc mắc: </label> <br>
            <textarea id="question" name="question" cols="30" rows="5" required></textarea>
        </div>
        <div class="GHZ">
            <input class="gui" type="submit" value="Gửi">
            <input class="hot" type="text" value="Hotline: 0123456789" disabled>
            <input class="za" type="text" value="Zalo: 0123456789" disabled>
        </div>
    </form>
</div>
@endsection
