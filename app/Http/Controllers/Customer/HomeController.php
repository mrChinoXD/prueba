<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('customer.home', compact('products'));
    }
    public function show(Request $req,$id){
        $product = Product::find($id);
        return view('customer.show',compact('product'));
    }
    public function buy(Request $req,$id){
        $products = Product::all();
        $product = Product::find($id);
        $sale = New Sale();
        $sale->user_id      = $req->user;
        $sale->product_id   = $id;
        $sale->amount       = $req->cuantiti;
        $sale->total        = $product->price * $req->cuantiti;
        $sale->save();
        $message = 'producto comprado correctamente';
        return view('customer.response',compact('message','products'));
    }
}
