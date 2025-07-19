<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addproductToCartControll extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function showSingleProduct($id){
        $pro=Product::find($id);
        return view('clint\addProductToCart')->with('data',$pro);
    }
    public function addProductToCart($id)
{
    // تأكد من أنك تحصل على المنتج بشكل صحيح
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // احصل على سلة التسوق الخاصة بالمستخدم، أو قم بإنشائها إذا لم تكن موجودة
    $userId = auth()->user()->id;
    $cart = Cart::where('user_id', $userId)->first();

    if (!$cart) {
        $cart = new Cart();
        $cart->user_id = $userId;
        $cart->save();
    }

    // تحقق مما إذا كان المنتج موجودًا بالفعل في سلة التسوق
    $existingProduct = DB::table('cart__products')
        ->where('cart_id', $cart->id)
        ->where('product_id', $product->id)
        ->first();

    if ($existingProduct) {
        // إذا كان المنتج موجودًا بالفعل، يمكنك تحديث الكمية بدلاً من إضافته مرة أخرى
        DB::table('cart__products')
            ->where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->update([
                'total_quantity' => $existingProduct->total_quantity + 1, // زيادة الكمية
                'total_price' => ($existingProduct->total_quantity + 1) * $product->price // تحديث السعر الإجمالي
            ]);

        return response()->json(['message' => 'Product quantity updated successfully']);
    } else {
        // إذا لم يكن المنتج موجودًا، أضفه إلى السلة
        $data = [
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'total_price' => $product->price,
            'total_quantity' => 1,
            'discount' => 0,
        ];

        DB::table('cart__products')->insert($data);

        return response()->json(['message' => 'Product added to cart successfully']);
    }
}
    //
}
