<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        // ddd($cart);
        return view('pages.cart', [
            'cart' => $cart,
        ]);
    }

    public function delete(Request $request, $id) {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success() {
        return view('pages.success');
    }
}
