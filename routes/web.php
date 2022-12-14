<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\HomeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\dashboard\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('admin');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
->name('login');



  Route::get('/dashboard/home', [HomeController::class,'home'])->middleware(['admin'])->name('dashboard');


Route::prefix('/dashboard')->name('admin.')->group(function (){


    Route::middleware('admin')->group(function () {

        Route::get('/logout',[AdController::class,'destroy'])->name('logout');

         //category routes

         Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
         Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
         Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
         Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
         Route::post('/category/update',[CategoryController::class,'update'])->name('category.update');
         Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
 
         //end categories routes


         //product routes
         Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
         Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
         Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
         Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
         Route::post('/product/update',[ProductController::class,'update'])->name('product.update');
         Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
 
         //end product routes
 


        //orders routes

        Route::get('/order/index',[OrderController::class,'index'])->name('order.index');
        Route::get('/order/details/{id}',[OrderController::class,'details'])->name('order.details');

        //end orders routes
        

        //user routes
        Route::get('/user/index',[UserController::class,'index'])->name('user.index');
        //end user routes




    });
    require __DIR__.'/admin_auth.php';

});



//  require __DIR__.'/auth.php';
