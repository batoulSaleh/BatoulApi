<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Orderr;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders=Orderr::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function details($id){
        $order = Orderr::findOrFail($id);

        return view("admin.orders.details",compact('order'));
    }
}
