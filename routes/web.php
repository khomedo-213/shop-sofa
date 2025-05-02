<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login_RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminInvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/timkiem', [ProductController::class, 'search'])->name('search');

Route::get('/thongtin', [HomeController::class, 'about'])->name('about');
Route::get('/lienhe', [HomeController::class, 'contact'])->name('contact');

Route::get('/sanpham', [ProductController::class, 'index'])->name('products');
Route::get('/sanpham_go', [ProductController::class, 'wood']);
Route::get('/sanpham_da', [ProductController::class, 'leather']);
Route::get('/sanpham_giuong', [ProductController::class, 'bed']);
Route::get('/sanpham_da_dung', [ProductController::class, 'multi']);

Route::get('/chitiet/{id}', [ProductController::class, 'detail']);

Route::get('/giohang', [CartController::class, 'cart'])->name('cart.index');
Route::post('/giohang/them/{id}', [CartController::class, 'addcart'])->name('cart.add');
Route::post('/giohang/capnhat/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/giohang/xoa/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/giohang/xoatatca', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/thanhtoan', [CartController::class, 'store'])->name('cart.checkout');

Route::get('/dangky', [Login_RegisterController::class, 'RegisterForm'])->name('register.form');
Route::post('/dangky', [Login_RegisterController::class, 'register'])->name('register');
Route::get('/dangnhap', [Login_RegisterController::class, 'LoginForm'])->name('login.form');
Route::post('/dangnhap', [Login_RegisterController::class, 'login'])->name('login');

//logged
Route::post('/dangxuat', [Login_RegisterController::class, 'logout'])->name('logout')->middleware('auth');

//admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //product
    Route::get('/sanpham', [AdminProductController::class, 'index'])->name('admin.product');

    Route::get('/ad_sanpham_go', [AdminProductController::class, 'wood']);
    Route::get('/ad_sanpham_da', [AdminProductController::class, 'leather']);
    Route::get('/ad_sanpham_giuong', [AdminProductController::class, 'bed']);
    Route::get('/ad_sanpham_da_dung', [AdminProductController::class, 'multi']);

    Route::get('/themsanpham', [AdminProductController::class, 'create']);
    Route::post('/themsanpham2', [AdminProductController::class, 'store'])->name('admin.productadd');

    Route::get('/suasanpham/{id}', [AdminProductController::class, 'edit'])->name('admin.suasanpham');
    Route::put('/suasanpham2/{id}', [AdminProductController::class, 'update'])->name('admin.suasanpham2');

    Route::delete('admin/xoasanpham/{id}', [AdminProductController::class, 'destroy'])->name('admin.productdelete');

    Route::get('/timkiem_admin', [AdminProductController::class, 'search'])->name('admin.search_admin');

    //category
    Route::get('/danhmuc', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/them_danh_muc', [AdminCategoryController::class, 'create']);
    Route::post('/form_them_danh_muc', [AdminCategoryController::class, 'store'])->name('admin.category_add');

    Route::get('/form_sua_danh_muc/{id}', [AdminCategoryController::class, 'edit'])->name('admin.form_sua_danh_muc');
    Route::put('/sua_danh_muc/{id}', [AdminCategoryController::class, 'update'])->name('admin.sua_danh_muc');

    Route::delete('admin/xoa_danh_muc/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.xoa_danh_muc');

    //user
    Route::get('/nguoidung', [AdminUserController::class, 'index'])->name('admin.user');
    Route::put('/nguoi_dung/{id}', [AdminUserController::class, 'update'])->name('admin.cap_nhap_nguoi_dung');
    Route::delete('admin/xoa_nguoi_dung/{id}', [AdminUserController::class, 'destroy'])->name('admin.xoa_nguoi_dung');

    //invoice
    Route::get('/hoadon', [AdminInvoiceController::class, 'index'])->name('admin.invoice');
    Route::get('/chitiet_hoadon/{id}', [AdminInvoiceController::class, 'show'])->name('admin.chi_tiet_hoa_don');
    Route::get('/form_sua_hoa_don/{id}', [AdminInvoiceController::class, 'edit'])->name('admin.form_sua_hoa_don');
    Route::put('/sua_hoa_don/{id}', [AdminInvoiceController::class, 'update'])->name('admin.sua_hoa_don');

    Route::delete('admin/xoa_hoa_don/{id}', [AdminInvoiceController::class, 'destroy'])->name('admin.xoa_hoa_don');


});
