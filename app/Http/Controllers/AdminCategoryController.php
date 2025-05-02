<?php

namespace App\Http\Controllers;
use App\Models\AdminCategory;

use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = AdminCategory::withoutTrashed()->get();
        return view('admin.category',['show'=>$show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'nullable|string',
        ]);

        AdminCategory::create($validated);

        return redirect()->route('admin.category')->with('success', 'Thêm danh mục thành công!');
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
        $categories = AdminCategory::findOrFail($id);
        return view('admin.category_edit_show', ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'name' => 'required|string|min:5',
                'description' => 'nullable|string',
            ]);

            $categories = AdminCategory::findOrFail($id);
            $categories->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            return redirect()->route('admin.category')->with('success', 'Cập nhật Danh mục thành công!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = AdminCategory::findOrFail($id);
        $categories->delete();

        return redirect()->route('admin.category')->with('success', 'Danh mục đã được xóa!');
    }
}
