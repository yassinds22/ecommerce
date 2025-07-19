<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Catgorey;
use App\Models\Product;
use Illuminate\Http\Request;

class productControll extends Controller
{
    public function index(){
        $cat=Product::with('product')->get();
        return response($cat);
    }
    //
    //
}
