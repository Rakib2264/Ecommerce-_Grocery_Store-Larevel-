<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $orders = Order::orderBy("id","desc")->get();
        return view('backend.home.index',compact("orders"));
    }

    public function invoice_print($id){
        $order = Order::find($id);
        return view("backend.invoice.invoice",compact("order"));
    }
}
