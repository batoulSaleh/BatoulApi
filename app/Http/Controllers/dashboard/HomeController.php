<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\categoryy;
use App\Models\Orderr;
use App\Models\Productt;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $orders = Orderr::all();
        $products = Productt::all();
        $categories = categoryy::all();
        $users = User::all();
        return view('admin.index',compact('orders','products','categories','users'));
    }
}
