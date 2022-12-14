<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Itemm;
use App\Models\Orderr;
use App\Models\Cartt; 
use App\Models\Productt; 

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function userstore(Request $request){

        $request->validate([

            'payment_id' => 'required',
            'guest_address' => 'required',
            'customer_name' => 'required|max:250',
            'customer_phone' => 'required|numeric',
        ]);

        $user_id = $request->user()->id;
        $cart=Cartt::where('user_id',$user_id)->first();
        $items = Itemm::where('cartt_id',$cart->id)->where('orderr_id',null)->get();
        

        if(count($items) > 0){
            $total = 0;
            foreach($items as $item){
        
        $total_price = 0;

        $product=Productt::find($item->productt_id);
        
        $new_quantity=$product->stock-$item->quantity;

        $product->update([
            'stock'=>$new_quantity,
        ]);

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


        foreach($items as $item){
            $item->update([
                'orderr_id' => $order->id,
                'cartt_id'=>null,
            ]);
        }

        $cart->delete();

        $response = [
            'message' => 'the order',
            'order items' => $items,
        ];
        $stat = 201;

        return response($response,$stat);
    }else{
        return response('you do not have any items' , 404);
    }


    }
}
