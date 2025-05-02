<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $maxId = Product::withoutTrashed()->max('id');
        $show = Product::withoutTrashed()->whereBetween('id', [1, $maxId])->inRandomOrder()->paginate(10);
        return view('product.sanpham',['show'=>$show]);
    }

    public function wood(){
        $show = Product::withoutTrashed()->where('categories_id','=',1 )->get();;
        return view('product.by_category',['show'=>$show]);
    }

    public function leather(){
        $show = Product::withoutTrashed()->where('categories_id','=',2 )->get();;
        return view('product.by_category',['show'=>$show]);
    }

    public function bed(){
        $show = Product::withoutTrashed()->where('categories_id','=',3 )->get();;
        return view('product.by_category',['show'=>$show]);

    }

    public function multi(){
        $show = Product::withoutTrashed()->where('categories_id','=',4 )->get();;
        return view('product.by_category',['show'=>$show]);

    }

    public function detail($id){
        $show = Product::withoutTrashed()->where('id','=',$id)->first();
        $show->quantity += 100;
        $show->buying += 139;
        $show->save();
        return view('product.chitiet',['show'=>$show]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $show = Product::withoutTrashed()->where('name', 'LIKE', "%{$keyword}%")->get();
        return view('product.timkiem', ['show'=>$show, 'keyword'=>$keyword]);
    }
}
