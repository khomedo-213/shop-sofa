<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = AdminUser::withoutTrashed()->get();
        return view('admin.user',['show'=>$show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'role' => 'required',
            ]);

            $user = AdminUser::findOrFail($id);
            $user->update([
                'role' => $validated['role'],
            ]);

            return redirect()->route('admin.user')->with('success', 'Cập nhật người dùng thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = AdminUser::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')->with('success', 'Người dùng đã được xóa!');
    }
}
