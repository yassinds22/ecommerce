<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 // تأكد من أن اسم الـ Controller صحيح

use App\Http\Controllers\admin\CatgoryController;
use App\Http\Controllers\Api\apiProductController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| هنا يمكنك تسجيل الـ API routes لتطبيقك. جميع هذه الـ routes
| سيتم تحميلها بواسطة RouteServiceProvider وسيتم تعيينها جميعًا
| إلى مجموعة middleware "api".
|
*/
//use App\Http\Controllers\Api\PostController;


//Route::get('posts', [PostController::class, 'index']);  // عرض جميع المنشورات


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); // إرجاع المستخدم المتوثق
});

// route لـ showcat API
//Route::get('showData', [ApiCatgoryController::class, 'showData']);
Route::get('showcatgoryApi',[CatgoryController::class,'showcatgoryApi'])->name('showcatgoryApi');
Route::get('howProductApi',[apiProductController::class,'showProductApi'])->name('showProductApi');
//showProductApi