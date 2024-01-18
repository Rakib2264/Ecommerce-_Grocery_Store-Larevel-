<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function add(){
        return view("backend.pages.category.add");
    }

    public function manage(){
        $categoryes = Category::orderBy('id','desc')->get();
        return view("backend.pages.category.manage",compact("categoryes"));
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->back()->with("message","Category Added");
    }

    public function edit($id){
        $category = Category::find($id);
        return view("backend.pages.category.edit",compact("category"));

    }

    public function update(Request $request , $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();
        return redirect()->route('category.manage')->with("message","Category Updated");
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with("message","Category Deleted");


    }
}
