<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Categoryy;

use Illuminate\Http\Request;

class CategoryyController extends Controller
{
    public function index(){
        $categories=Categoryy::all();
        $response=[
            "message"=>"All Categories",
            "code"=>"200",
            "data"=>$categories
        ];

        return response($response);
    }

    public function show($id){
        $category=Categoryy::find($id);
        if($category){
            $response=[
                "message"=>"category retuned  successfuly",
                "code"=>"200",
                "data"=>$category
            ];
    
            return response($response);
        }else{
            $response=[
                "message"=>"category not found",
                "code"=>"404"
            ];
    
            return response($response,404);
        }
    }
}
