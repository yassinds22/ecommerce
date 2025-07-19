<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\clint\clintCatgoryControll;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\CatgoryController;

use App\Http\Controllers\auth\authController;
use App\Http\Controllers\clint\addproductToCartControll;







Route::get('/', function () {
    return view('welcome');
});
Route::get('logout',[authController::class, 'logout'])->name('logout');

Route::get('login', [authController::class, 'index'])->name('login');
Route::post('regster', [authController::class, 'stor'])->name('regster');
Route::post('login', [authController::class, 'checkuser'])->name('checkuserLogin');

//Route::get('showcatgoryApi',[CatgoryController::class,'showcatgoryApi'])->name('showcatgoryApi');


// Route::group(['prefix' => 'admin'], function()->middleware('') {
//     //
// });
Route::middleware(['auth', 'admin'])->group(function () {

/////////////////////////////////////////this is routing id table Catgory ////////////////////////////////////////////////
Route::get('layout', [catgoryController::class, 'index'])->name('layout');

Route::view('index', 'admin.index');
Route::get("addCatgory",[catgoryController::class, "index"])->name('addCatgory');
Route::post("storCatgory",[catgoryController::class, "stor"])->name('storCatgory');
Route::get('listallcatgory',[CatgoryController::class,'show'])->name('listallcatgory');


Route::get('editCatgory/{id}',[CatgoryController::class, "editCatgory"])->name("editCatgory");
//Route::get('editCatgory/{id}',[CatgoryController::class, "showCatgory"])->name("editCatgory");
Route::post('updatecatgory/{id}',[catgoryController::class, "updateCategory"])->name("updatecatgory");

Route::get("deleteRecordCatgory/{id}",[catgoryController::class, "deleteRecordCatgory"]);
#######################################################end routing Table Catgory #############################################################



/////////////////////////////////////////this is routing id table product ////////////////////////////////////////////////
Route::get("addproduct",[productController::class, "index"])->name('addproduct');//storCatgory
Route::post("storproduct",[productController::class, "stor"])->name('storproduct');//storCatgory

Route::get("listproduct",[productController::class, "listProduct"])->name('listProduct');//storCatgory

Route::get('editProduct/{id}',[productController::class, "editProduct"])->name("editProduct");

Route::post("updateproduct/{id}",[productController::class, "updateProduct"])->name('updateproduct');//storCatgory
Route::get("deleteRecordProduct/{id}",[productController::class, "deleteRecordProduct"]);



//Route::get('addproductToCart/{id}',[addproductToCartControll::class, 'addproductTocart'])->name('addproductToCart');



#######################################################end routing Table Product#############################################################
//Route::get('home',[clintCatgoryControll::class,'index' ])->name('home');

Route::get('home',[clintCatgoryControll::class,'index' ])->name('home');
Route::get('addproductToCart/{id}',[addproductToCartControll::class, 'addproductTocart'])->name('addproductToCart');
   //Route::get('hello',[CatgoController::class, 'index']);
   Route::get('addSingleProduct/{id}',[addproductToCartControll::class, 'showSingleProduct'])->name('addSingleProduct');
});



####################################################Routing page clint############################################
//Route::get('addSingleProduct/{id}',[addproductToCartControll::class, 'showSingleProduct'])->name('addSingleProduct');

//Route::get('hello',[CatgoController::class, 'index']);
//Route::get('showproduct',[clintCatgoryControll::class,'showproduct' ])->name('showproduct');


//Route::get('showproduct',[clintCatgoryControll::class,'showproduct' ])->name('showproduct');
Route::view('pagepracts','clint.practs');


####################################################Routing page clint############################################


// Route::middleware(['auth', 'user'])->group(function () {


//     // Route::get('mmmm',function(){
//     //     return 'hello';
//      Route::get('home',[clintCatgoryControll::class,'index' ])->name('home');
//      Route::get('addproductToCart/{id}',[addproductToCartControll::class, 'addproductTocart'])->name('addproductToCart');
//         //Route::get('hello',[CatgoController::class, 'index']);
//         Route::get('addSingleProduct/{id}',[addproductToCartControll::class, 'showSingleProduct'])->name('addSingleProduct');
//     // });
//         });











//storCatgory



// Route::get('relatiopUser',[relatiopController::class, 'relatiopUser'])->name('dataUser');
// Route::get('detDataUser',[relatiopController::class, 'detDataUser'])->name('detDataUser');
// Route::get('relanshpProduct',[relatiopController::class, 'relanshpProduct'])->name('relanshpProduct');


