<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;
Use App\User;
use App\Http\Controllers\Controller;


class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $sales = Sale::all();
        return view('admin.sales.index',compact('sales'));
    }
}
