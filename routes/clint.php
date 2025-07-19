<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Routing\Route;

use App\Http\Controllers\admin\CatgoController;
use App\Http\Controllers\clint\addproductToCartControll;
use App\Http\Controllers\clint\clintCatgoryControll;
use App\Http\Middleware\checkUser;
use Illuminate\Support\Facades\Auth;
// Route::middleware(['auth', 'user'])->group(function () {


// // Route::get('mmmm',function(){
// //     return 'hello';
//  Route::get('home',[clintCatgoryControll::class,'index' ])->name('home');
//  Route::get('addproductToCart/{id}',[addproductToCartControll::class, 'addproductTocart'])->name('addproductToCart');
//     //Route::get('hello',[CatgoController::class, 'index']);
//     Route::get('addSingleProduct/{id}',[addproductToCartControll::class, 'showSingleProduct'])->name('addSingleProduct');
// // });
//     });
    

//Route::get('showproduct',[clintCatgoryControll::class,'showproduct' ])->name('showproduct');
//Route::get('home',[clintCatgoryControll::class,'index' ])->name('home');




