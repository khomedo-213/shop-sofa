<?php

namespace App\Http\Controllers;
use App\Models\AdminInvoice;

use Illuminate\Http\Request;

class AdminInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = AdminInvoice::all();
        return view('admin.invoice',['show'=>$show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.invoice_form');
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
        $show = AdminInvoice::withoutTrashed()->where('id','=',$id)->first();
        return view('admin.invoice_detail',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = AdminInvoice::findOrFail($id);
        return view('admin.invoice_edit_show', ['invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'total_amount' => 'required|numeric',
            'address' => 'required|string',
            'issued_date' => 'required|string',
            'status' => 'required|string',
            'payment' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoice = AdminInvoice::findOrFail($id);
        $invoice->update([
            'total_amount' => $validated['total_amount'],
            'address' => $validated['address'],
            'issued_date' => $validated['issued_date'],
            'status' => $validated['status'],
            'payment' => $validated['payment'],
            'note' => $validated['note'] ?? null,
        ]);

        return redirect()->route('admin.invoice')->with('success', 'Cập nhật hóa đơn thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $invoice = AdminInvoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoice')->with('success', 'Hóa đơn đã được xóa!');
    }
}
