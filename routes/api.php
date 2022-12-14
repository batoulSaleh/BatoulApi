<?php

use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\password\ForgotPasswordController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    


Route::group(['prefix' => 'v1'], function () {

// Categories start
    Route::get('/categories/index',[CategoryController::class,'index']);
    Route::get('/categories/show/{id}',[CategoryController::class,'show']);    
    // Categories end

    //products start
    Route::get('/product/index',[ProductController::class,'index']);
    Route::get('/product/show/{id}',[ProductController::class,'show']);
    Route::get('/product/category/{cat_id}',[ProductController::class,'CategoriesProduct']);
    Route::get('/product/search/{word}',[ProductController::class,'search']);
    //products end

       //cart start

    //   cart start
    Route::post('/cart/user/store',[CartController::class,'userstore'])->middleware('auth:sanctum');
    Route::get('/cart/user/index',[CartController::class,'userindex'])->middleware('auth:sanctum');
    Route::post('/cart/user/update/{id}',[CartController::class,'userupdate'])->middleware('auth:sanctum');
    Route::post('/cart/user/delete/{id}',[CartController::class,'userdelete'])->middleware('auth:sanctum');
    Route::get('/cart/user/count',[CartController::class,'usercount'])->middleware('auth:sanctum');


    Route::post('/order/user/store',[OrderController::class,'userstore'])->middleware('auth:sanctum');


    //   cart end

    //user routes


    Route::post('/register',[UserController::class,'Register']);


    Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');
    Route::post('/login',[UserController::class,'login']);
    

//routes payment
Route::get('/payment',[PaymentController::class,'index']);

});
