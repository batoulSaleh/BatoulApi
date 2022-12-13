<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\categoryy;
use Illuminate\Http\Request;
use App\Models\Productt;

class ProductController extends Controller
{
    public function index(){
        $products = Productt::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){

        $categories = categoryy::all();

        return view('admin.products.store',compact('categories'));
    }

    public function store(Request $request){


        $request->validate([
            'name' => 'required|max:150',
            'description'=> 'max:500',
            'price'=> 'required',
            'img' => 'required|image|max:2048',
            'categoryy_id'=> 'required|exists:categoryys,id',
            'stock'=>'required|numeric'
        ]);

        $image_path = $request->file('img')->store('api/productss','public');


        $product = Productt::create([
            'name' => $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'img' => asset('storage/'.$image_path),
            'stock'=> $request->stock,
            'categoryy_id'=> $request->categoryy_id,
        ]);

        return redirect()->route('admin.product.index');
    }

    public function edit($id){

        $product = Productt::findOrFail($id);
        $categories = categoryy::all();

        return view('admin.products.update',compact('product','categories'));

    }

    public function update(Request $request){

        $request->validate([

            'name' => 'required|max:150',
            'description'=> 'max:500',
            'price'=> 'required',
            'categoryy_id'=> 'required|exists:categoryys,id',
            'stock'=>'required|numeric'
        ]);

        $product =  Productt::findOrFail($request->id);



        $product->update([
            'name' => $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'categoryy_id'=> $request->categoryy_id,
        ]);

        if($request->file('img')){
            $image_path = $request->file('img')->store('api/productss','public');
            $product->img = asset('storage/'.$image_path);
            $product->save();
        }

        return redirect()->route('admin.product.index');

    }

    public function delete($id){


        $product = Productt::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product.index');

    }
}
