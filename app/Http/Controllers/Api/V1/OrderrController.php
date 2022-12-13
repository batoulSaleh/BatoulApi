<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Itemm;
use App\Models\Orderr;
use App\Models\Cartt; 

use Illuminate\Http\Request;

class OrderrController extends Controller
{
    public function userstore(Request $request){

        $request->validate([

            'payment_id' => 'required',
            'guest_address' => 'required|exists:addresses,id',
            'customer_name' => 'required|max:250',
            'customer_phone' => 'required|numeric',
        ]);

        $user_id = $request->user()->id;
        $cart=Cartt::where('user_id',$user_id)->first();
        $items = Itemm::where('cartt_id',$cart->id)->where('order_id',null)->get();
        

        if(count($items) > 0){
            $total = 0;
    foreach($items as $item){
        
        $total_price = 0;

        $product=Productt::find($item->product_id);

        $total_price += $product->price * $item->quantity;
        $total += $total_price;

    }

        $order = Orderr::create([
            'user_id' => $user_id,
            'payment_id' => $request->payment_id,
            'guest_address' => $request->guest_address,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => $total
        ]);


        $items = Itemm::where('user_id',$user_id)->get();

        foreach($items as $item){
            $item->update([
                'order_id' => $order->id,
                'cartt_id'=>null,
            ]);
        }

        $response = [
            'message' => trans('api.orderstored'),
            'order items' => $items,
        ];
        $stat = 201;

        return response($response,$stat);
    }else{
        return response('you do not have any items' , 404);
    }


    }
}
