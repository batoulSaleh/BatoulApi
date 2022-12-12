<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categoryy;
use Illuminate\Http\Request;
use App\Models\Productt;

class ProducttController extends Controller
{
    public function index(){
        $products = Productt::all();
        return view('admin.productss.index',compact('products'));
    }

    public function create(){

        $categories = Categoryy::all();

        return view('admin.productss.store',compact('categories'));
    }

    public function store(Request $request){


        $request->validate([
            'name' => 'required|max:150',
            'description'=> 'max:500',
            'price'=> 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'categoryy_id'=> 'required|exists:categoryys,id',
        ]);

        $image_path = $request->file('img')->store('api/productss','public');


        $product = Productt::create([
            'name' => $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'img' => asset('storage/'.$image_path),
            'categoryy_id'=> $request->categoryy_id,
        ]);

        return redirect()->route('admin.productt.index');
    }

    public function edit($id){

        $product = Productt::findOrFail($id);
        $categories = Categoryy::all();

        return view('admin.productss.update',compact('product','categories'));

    }

    public function update(Request $request){

        $request->validate([

            'name' => 'required|max:150',
            'description'=> 'max:500',
            'price'=> 'required',
            'categoryy_id'=> 'required|exists:categoryys,id',

        ]);

        $product =  Productt::findOrFail($request->id);



        $product->update([
            'name' => $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'categoryy_id'=> $request->categoryy_id,


        ]);

        if($request->file('img')){
            $image_path = $request->file('img')->store('api/productss','public');
            $product->img = asset('storage/'.$image_path);
            $product->save();
        }

        return redirect()->route('admin.productt.index');

    }

    public function delete($id){


        $product = Productt::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.productt.index');

    }
}
