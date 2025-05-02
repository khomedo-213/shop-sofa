<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // return redirect()->route('login.form')->with('error', 'Vui lòng đăng nhập');
            return "<script>alert('Vui lòng đăng nhập!'); window.location.href='/login';</script>";
        }

        if (Auth::user()->role !== 'admin') {
            abort(403, 'Chỉ Admin có quyền truy cập trang này');
        }

        return $next($request);
    }
}
