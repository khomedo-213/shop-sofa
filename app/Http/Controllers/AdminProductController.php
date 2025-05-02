<?php

namespace App\Http\Controllers;
use App\Models\AdminProduct;
use App\Models\AdminCategory;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maxId = AdminProduct::max('id');
        $show = AdminProduct::withoutTrashed()->whereBetween('id', [1, $maxId])->orderBy('id', 'desc')->paginate(10);
        return view('admin.product',['show'=>$show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = AdminCategory::all();
        return view('admin.productadd', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|string',
            'name' => 'required|string|min:5',
            'description' => 'nullable|string',
            'categories_id' => 'required|integer',
            'price' => 'required|numeric',
            'saleprice' => 'nullable|numeric',
        ]);

        AdminProduct::create($validated);

        return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = AdminProduct::findOrFail($id);
        $categories = AdminCategory::all();
        return view('admin.product_edit_show', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'image' => 'required|string',
                'name' => 'required|string|min:5',
                'description' => 'nullable|string',
                'categories_id' => 'required|integer|exists:categories,id',
                'price' => 'required|numeric',
                'saleprice' => 'nullable|numeric',
            ]);

            $product = AdminProduct::findOrFail($id);
            $product->update([
                'image' => $validated['image'],
                'name' => $validated['name'],
                'description' => $validated['description'],
                'categories_id' => $validated['categories_id'],
                'price' => $validated['price'],
                'saleprice' => $validated['saleprice'],
            ]);

            return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = AdminProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product')->with('success', 'Sản phẩm đã được xóa!');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $show = AdminProduct::withoutTrashed()->where('name', 'LIKE', "%{$keyword}%")->orderBy('id', 'desc')->paginate(10);
        return view('admin.search', ['show'=>$show, 'keyword'=>$keyword]);
    }

    public function wood(){
        $show = AdminProduct::withoutTrashed()->where('categories_id','=',1 )->paginate(10);
        return view('admin.by_category',['show'=>$show]);
    }

    public function leather(){
        $show = AdminProduct::withoutTrashed()->where('categories_id','=',2 )->paginate(10);
        return view('admin.by_category',['show'=>$show]);
    }

    public function bed(){
        $show = AdminProduct::withoutTrashed()->where('categories_id','=',3 )->paginate(10);
        return view('admin.by_category',['show'=>$show]);

    }

    public function multi(){
        $show = AdminProduct::withoutTrashed()->where('categories_id','=',4 )->paginate(10);
        return view('admin.by_category',['show'=>$show]);

    }
}
