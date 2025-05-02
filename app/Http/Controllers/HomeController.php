<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Home;

class HomeController extends Controller
{
    public function index(){
        $maxId = Home::withoutTrashed()->max('id');
        $showAll = Home::withoutTrashed()->whereBetween('id', [1, $maxId])->inRandomOrder()->limit(10)->get();
        $showHot = Home::withoutTrashed()->orderBy('buying', 'desc')->limit(5)->get();
        $showNew= Home::withoutTrashed()->orderBy('created_at','desc')->limit(5)->get();

        return view('user.index',['showAll'=>$showAll,'showHot'=>$showHot,'showNew'=>$showNew]);
    }

    public function contact(){
        return view('user.lienhe');
    }

    public function about(){
        return view('user.thongtin');
    }

    public function login(){
        return view('user.dangnhap');
    }

    public function register(){
        return view('user.dangky');
    }
}
