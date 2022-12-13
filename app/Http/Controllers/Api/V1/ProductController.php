<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Productt;
use App\Models\categoryy;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products =Productt::with('categoryy')->get();
            $response = [
                'message' =>  "All Products",
                'code' =>200,
                'data' => $products,
            ];
            return response($response);
    }

    public function show($id){
        $product=Productt::with('categoryy')->where('id',$id)->first();
        if($product){
            $response=[
                "message"=>"product retuned  successfuly",
                "code"=>"200",
                "data"=>$product
            ];
    
            return response($response);
        }else{
            $response=[
                "message"=>"product not found",
                "code"=>"404"
            ];
    
            return response($response,404);
        }
    }

    public function CategoriesProduct($cat_id){
        $category=categoryy::find($cat_id);
        $product = Productt::where('categoryy_id',$cat_id)->get();
        if($category){
            $response = [
                'message' => 'all products of category',
                'code'=>200,
                'category name'=>$category->name,
                'data' => $product
            ];
            return response($response);
        }else{
            $response = [
                'message' => 'not found products of category',
                'code'=>404
            ];
            return response($response,404);
            }
    }

    public function search($word){
        $products =Productt::where('name','Like','%'.$word.'%')->get();
        $response = [
            'message' =>"All Products",
            'code' =>200,
            'data' => $products,
        ];
        return response($response);
    }
    }

