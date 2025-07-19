<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class apiProductController extends Controller
{
    public function showProductApi()
{
   
    $products = Product::with('media')->get();

   
    if ($products->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No categories found'
        ], 404);
    }

 
    $formattedProducts = $products->map(function ($product) {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'discrtion' => $product->discrtion,
            'qualty' => $product->qualty,
            'price' => $product->price,
            'Featured' => $product->Featured,
            'status' => $product->status,
            'view' => $product->view,
            'catgory_id' => $product->catgory_id,
            'image_url' => $product->getFirstMediaUrl('avtar') ?? null,
        ];//`id`, `name`, `discrtion`, `qualty`, `price`, `Featured`, `status`, `view`, `catgory_id`, `user_id`
    });

   
    return response()->json([
        
        'product' => $formattedProducts,
        
    ], 200);
}
    
}
