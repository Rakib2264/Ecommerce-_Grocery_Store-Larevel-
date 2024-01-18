<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function add(){
        $categoryes = Category::orderBy('id','desc')->get();
        return view("backend.pages.subcategory.add",compact("categoryes"));
    }

    public function manage(){
        $subcategoryes = SubCategory::orderBy('id','desc')->get();
        return view("backend.pages.subcategory.manage",compact("subcategoryes"));
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->save();
        return redirect()->back()->with("message","Sub_Category Added");
    }

    public function edit($id){
        $subcategory = SubCategory::find($id);
        $categoryes = Category::orderBy('id','desc')->get();
        return view("backend.pages.subcategory.edit",compact("subcategory","categoryes"));

    }

    public function update(Request $request , $id){
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->slug = Str::slug($request->name);

        $subcategory->save();
        return redirect()->route('subcategory.manage')->with("message","Sub_Category Updated");
    }

    public function delete($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with("message","Sub_Category Deleted");


    }
}
