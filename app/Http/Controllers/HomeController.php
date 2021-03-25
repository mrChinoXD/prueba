<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){
        $products = Product::orderby('id','DESC')->where('public',1)->get();
        return view('welcome',compact('products'));
    }
}
