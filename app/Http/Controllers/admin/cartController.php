<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cartController extends Controller
{
    // في CartController
public function addToCart(Request $request)
{
    $user = auth()->user();
    $productId = $request->product_id;
    $quantity = $request->quantity;

    $cart = $user->cart()->first();

    if (!$cart) {
        $cart = Cart::create(['user_id' => $user->id]);
    }

    $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $productId)
                        ->first();

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
    }

    return redirect()->back()->with('success', 'Product added to cart!');
}

    //
}
