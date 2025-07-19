<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use App\Models\Product;
use Illuminate\Http\Request;

class clintCatgoryControll extends Controller
{public function index(){
    $cat=Catgory::take(4)->get();
    $pro=Product::take(4)->get();
    $allpro=Product::orderBy('id', 'DESC')->take(8)->get();
    //return response($cat);

     //return response($cat);
   return view('clint.index',compact('pro','allpro'))->with('data',$cat);
    //return response($cat);
}
public function showproduct(){

    //return view('clint.content')->with('showproduct',$pro);
}
//

    //
}
