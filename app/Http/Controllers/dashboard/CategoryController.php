<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\categoryy;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){ 
        $categories = categoryy::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.store');
    }

    public function store(Request $request){


        $request->validate([
            'name' => 'required|max:150'
        ]);
        
        $cat = categoryy::create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.category.index');
    }

    public function edit($id){

        $category = categoryy::findOrFail($id);

        return view('admin.categories.update',compact('category'));

    }

    public function update(Request $request){

        $request->validate([
            'name' => 'required|max:150'
        ]);

        $cat =  categoryy::findOrFail($request->id);

        $cat->update([

            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index');

    }

    public function delete($id){
        $cat = categoryy::findOrFail($id);

        $cat->delete();
        return redirect()->route('admin.category.index');

    }
}
