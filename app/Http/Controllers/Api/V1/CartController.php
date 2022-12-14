<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Itemm;
use App\Models\Cartt;
use App\Models\Productt;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function userstore(Request $request)
    {
        # code...
        $request->validate([
            'product_id' => 'required|exists:productts,id',
            'quantity' => 'required|numeric|max:200',
        ]);

        $product = Productt::findOrFail($request->product_id);
        if($product->stock<$request->quantity){
            $response = [
                'message' =>  'the stock is not enough',
            ];
            return response($response,201);
        }

        $oldCart=Cartt::where('user_id',$request->user()->id)->first();

        if($oldCart){

            $old = Itemm::where('productt_id',$request->product_id)->where('cartt_id',$oldCart->id)->first();

            if($old){
            $old->update([
                'quantity' => $old->quantity + $request->quantity,
            ]);
            $response = [
                'message' =>  'cart added',
                'data' => $old,
            ];

            return response($response,201);

            }
            else{
            $product = Productt::findOrFail($request->product_id);


            $item = Itemm::create([
            'product_id' => $request->product_id,
            'orderr_id' => null,
            'cartt_id' => $oldCart->id,
            'quantity' => $request->quantity,
            ]);

            $response = [
            'message' =>  'cart added',
            'data' => $item,
            ];

            return response($response,201);
            }
        }else{
            $cart=Cartt::create([
                'user_id'=>$request->user()->id,
            ]);

            $item = Itemm::create([
                'product_id' => $request->product_id,
                'orderr_id' => null,
                'cartt_id' => $cart->id,
                'quantity' => $request->quantity,
            ]);

            $response = [
                'message' =>  'cart added',
                'data' => $item,
            ];
            return response($response,201);
    }

    }

    public function userindex(Request $request)
    {
        # code...

        $cart=Cartt::where('user_id',$request->user()->id)->first();
 
        if($cart){
        $items = Itemm::with('productt')->where('cartt_id',$cart->id)->get();

        $total = 0;
    foreach($items as $item){
        
        $total_price = 0;

        $product=Productt::find($item->product_id);

        $total_price += $product->price * $item->quantity;
        $total += $total_price;

    }
        $response = [
            'message' =>  'your items',
            'cart count' => count($items),
            'items  ' => $items,
            'total_price' => $total 
        ];

        return response($response,201);
    }else
    {
        $response = [
            'message' => "you don't have any items",
        ];
        return response($response,201);
    }
    }

    public function userupdate(Request $request,$id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|max:200',

        ]);
        # code...
        $cart=Cartt::where('user_id',$request->user()->id)->first();


        $item = Itemm::where('id',$id)->first();

        $product = Productt::findOrFail($request->product_id);

        $item->update([
            'productt_id' => $request->product_id,
            'orderr_id' => null,
            'cartt_id' => $cart->id,
            'quantity' => $request->quantity,
        ]);

        $response = [
            'message' =>  'the cart updated',
            'data' => $item,


        ];

        return response($response,201);
    }

    public function userdelete($id)
    {
        # code...

        $item = Itemm::findOrFail($id);
        if($item){
            $item->delete();
            $response = [
               'message' => 'the cart deleted',

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => 'not found',


            ];
            $stat = 201;
            }

            return response($response,$stat);


    }

    public function usercount(Request $request){
        $cart=Cartt::where('user_id',$request->user()->id)->first();

        $items = Itemm::where('cartt_id',$cart->id)->get();
        $response = [
            'message' => 'count of cart',
            'cart_count' => count($items),
        ];
        $stat = 201;

        return response($response,$stat);

    }
}
