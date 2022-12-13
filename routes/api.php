<?php

use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CategoyController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\OrderController;
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

    


Route::group(['prefix' => 'v1' ,'middleware' => 'lang'], function () {

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

    //   user start
    Route::post('/cart/user/store',[CartController::class,'userstore'])->middleware('auth:sanctum');
    Route::get('/cart/user/index',[CartController::class,'userindex'])->middleware('auth:sanctum');
    Route::post('/cart/user/update/{id}',[CartController::class,'userupdate'])->middleware('auth:sanctum');
    Route::post('/cart/user/delete/{id}',[CartController::class,'userdelete'])->middleware('auth:sanctum');
    Route::get('/cart/user/count',[CartController::class,'usercount'])->middleware('auth:sanctum');


    Route::post('/order/user/store',[OrderController::class,'userstore'])->middleware('auth:sanctum');


    //   user end

    //guest routes


    Route::post('/register',[UserController::class,'Register']);
    Route::post('/verify',[UserController::class,'verify'])->middleware('auth:sanctum');


    Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');
    Route::post('/login',[UserController::class,'login']);
    Route::get('/user/profile',[UserController::class,'profile'])->middleware('auth:sanctum');
    Route::post('/user/updateprofile',[UserController::class,'updateprofile'])->middleware('auth:sanctum');
    //password reset

    Route::post('/apforget-password', [UserController::class, 'ForgetPasswordEmail']);
    Route::post('/resetverify',[UserController::class,'resetverify']);
    Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware('auth:sanctum');

    // Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

    Route::post('/Regenerate',[UserController::class,'Regenerate'])->middleware('auth:sanctum');
    Route::get('/rules',[UserController::class,'rules']);
    Route::put('updaterules',[UserController::class , 'updaterules']);











});
