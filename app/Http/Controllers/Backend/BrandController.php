<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class BrandController extends Controller
{
    public function add(){
        return view("backend.pages.brand.add");
    }

    public function manage(){
        $brands = Brand::orderBy('id','desc')->get();
        return view("backend.pages.brand.manage",compact("brands"));
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $brand = new Brand();
        if ($request->hasFile('image')) {
            $image = $request->file("image");
            $customName = rand() . "." . $image->getClientOriginalExtension();
            $location = public_path("uploads/product/" . $customName);
            Image::make($image)->resize(120, 120)->save($location);
            $brand->image = $customName;
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();

        return redirect()->back()->with("message", "Brand Added");
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view("backend.pages.brand.edit",compact("brand"));

    }

    public function update(Request $request , $id){
        $brand = Brand::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file("image");
            $customName = rand() . "." . $image->getClientOriginalExtension();
            $location = public_path("uploads/product/" . $customName);
            Image::make($image)->resize(120, 120)->save($location);
            $brand->image = $customName;
        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->save();

        return redirect()->back()->with("message", "Brand Updated");
    }

    public function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back()->with("message","Brand Deleted");


    }
}
