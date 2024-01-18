<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function add(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
         return view("backend.pages.product.add",compact("categories","subcategories","brands"));
    }

    public function manage(){
        $products = Product::all();
        return view("backend.pages.product.manage",compact("products"));
    }

    public function store(Request $request){

        // $request->validate([
        //     "cat_id "=>"required|integer",
        //     "subcat_id "=>"required|integer",
        //     "brand_id "=>"required|integer",
        //     "name"=>"required",
        //     "buy_price"=>"required",
        //     "sale_price"=>"required",
        //     "short_des"=>"required",
        //     "long_des"=>"required",
        //     "image"=>"required|image",
        // ]);

        $imageName = time().".".$request->image->extension();
        $request->image->move("product",$imageName);

        Product::create([
            "cat_id"=>$request->cat_id,
            "subcat_id"=>$request->subcat_id,
            "brand_id"=>$request->brand_id,
            "name"=>$request->name,
            "slug"=>Str::slug($request->name),
            "buy_price"=>$request->buy_price,
            "sale_price"=>$request->sale_price,
            "short_des"=>$request->short_des,
            "long_des"=>$request->long_des,
            "hot_offer"=>$request->hot_offer,
            "special_offer"=>$request->special_offer,
            "image"=>$imageName,
        ]);
        return redirect()->back()->with("message","Product Added");
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view("backend.pages.product.edit",compact("categories","subcategories","brands","product"));
    }

    public function update(Request $request , $id){

        $product = Product::find($id);
        if($request->hasFile("image")){
            if($product->image && file_exists("product/".$product->image)){
                unlink('product/'.$product->image);
            }
            $imageUpdateName = time().".".$request->image->extension();
            $request->image->move("product",$imageUpdateName);
            $product->image = $imageUpdateName;
        }

        $product->update([
            "cat_id"=>$request->cat_id,
            "subcat_id"=>$request->subcat_id,
            "brand_id"=>$request->brand_id,
            "name"=>$request->name,
            "slug"=>Str::slug($request->name),
            "buy_price"=>$request->buy_price,
            "sale_price"=>$request->sale_price,
            "short_des"=>$request->short_des,
            "long_des"=>$request->long_des,
            "hot_offer"=>$request->hot_offer,
            "special_offer"=>$request->special_offer,
        ]);
        return redirect()->back()->with("message","Product Updated");

    }

    public function delete(Request $request , $id){
        $product = Product::find($id);
       // Check if a new image is being uploaded
        if ($request->hasFile("image")) {
            // Delete the old image file if it exists
            if ($product->image && file_exists("product/" . $product->image)) {
                unlink("product/" . $product->image);
            }
        }
        // Delete the product record
        $product->delete();

        return redirect()->back()->with("info", "Product Deleted");

            }
}
