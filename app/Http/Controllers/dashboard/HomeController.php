<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\categoryy;
use App\Models\Cleaning;
use App\Models\Order;
use App\Models\Productt;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $new = Order::where('status','new')->get();
        $delivered = Order::where('status','delivered')->get();
        $users = User::all();
        $products = Productt::all();
        $categories = categoryy::all();
        $cleanings = Cleaning::all();

        return view('admin.index',compact('new','delivered','users','products','categories','cleanings'));
    }
}
