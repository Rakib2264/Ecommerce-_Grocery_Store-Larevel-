<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddtoCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddtoCartController extends Controller
{
public function addtocart(Request $request){

    $cart = AddtoCart::create([
        "user_id"=>Auth::user()->id,
        'price' => $request->price,
        'product_id' => $request->product_id,
        'qty'=>$request->qty ? $request->qty : 1,
        'image' => $request->image,
        'ip_address' => $request->ip(),
    ]);

    return redirect()->back()->with("message","Product Has Been Added To Cart");

}
}
