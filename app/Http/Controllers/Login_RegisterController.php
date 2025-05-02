<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login_RegisterController extends Controller
{
    public function RegisterForm()
    {
        return view('user.dangky');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);

        return redirect()->route('login.form')->with('success', 'Đăng ký thành công');
    }

    public function LoginForm()
    {
        return view('user.dangnhap');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->deleted_at !== null) {
                Auth::logout();
                return back()->withErrors(['email' => 'Tài khoản đã bị khóa.'])->onlyInput('email');
            }

            if (strtolower(Auth::user()->role) === 'admin') {
                return redirect()->route('admin.product')->with('success', 'Đăng nhập thành công với quyền Admin');
            }

            return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
        }


        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng!',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công');
    }
}
