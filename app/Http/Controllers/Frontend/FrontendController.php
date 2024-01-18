<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\AddtoCart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use File;

        class FrontendController extends Controller
        {
        public function index(){
            $categories = Category::with('subcategories')->get();
            $hot_offer = Product::where("hot_offer", "on")->take(8)->get();
            return view("frontend.home.index",compact("categories","hot_offer"));
        }





        public function category_product($slug){
            $categories = Category::with('subcategories')->get();
        $categoryproducts = Category::with('products')->where('slug',$slug)->get();

            return view("frontend.home.category_product",compact("categoryproducts","categories"));

        }

        public function subcategory_product($slug){
            $categories = Category::with('subcategories')->get();
            $subcatproducts = SubCategory::with('products')->where('slug',$slug)->get();
            return view("frontend.home.subcategory_product",compact("subcatproducts","categories"));

        }

        public function single_product($slug){
            $categories = Category::with('subcategories')->get();

            // Use where condition for both id and slug
            $single_product = Product::where('slug',$slug)->first();

            return view("frontend.home.single_product", compact("single_product", "categories"));
        }

        public function checkout(){
            $categories = Category::with('subcategories')->get();
            $products = AddtoCart::with('products')->orderBy('id','desc')->get();
            return view("frontend.home.checkout",compact("products","categories"));


        }

        public function cardproductqty($id){
            $qtyUpdate = AddtoCart::find($id);
            $qtyUpdate->qty = request()->qty;
            $qtyUpdate->update();
            return redirect()->back()->with("info","Quantity Updated");

        }
        public function peoduct_delete_form_cart($id){
            $cartdelete = AddtoCart::find($id);
            $cartdelete->delete();
            return redirect()->back()->with("message","Cart Deleted");

        }

}
