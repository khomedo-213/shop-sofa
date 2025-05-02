<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{


    public function cart()
    {
    $cart = session()->get('cart', []);
    return view('cart.giohang', compact('cart'));
    }

    public function addcart(Request $request, $id)
    {
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += 1;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "saleprice" => $product->saleprice,
            "image" => $product->image,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);
    return redirect()->intended('/')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|string',
            'total_amount' => 'required|string|min:5',
            'issued_date' => 'time|string',
            'status' => 'required|integer',
            'note' => 'nullable|text',
        ]);

        AdminInvoice::create($validated);

        return redirect()->route('admin.invoice')->with('success', 'Thành công!');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->quantity > $product->quantity) {
                return redirect()->route('cart.index')->with('error', 'Số lượng yêu cầu vượt quá số lượng có sẵn. Số lượng tối đa là ' . $product->quantity);
            }

            if ($request->quantity < 1) {
                return redirect()->route('cart.index')->with('error', 'Số lượng phải lớn hơn 0');
            }

            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('success', 'Cập nhật số lượng thành công');
        }
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã bị xóa');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Đã xóa toàn bộ giỏ hàng');
    }
}
