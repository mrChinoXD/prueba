<?php

namespace App\Http\Controllers\Admin;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $req)
    {
        $this->validate($req,[
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
        ]);

        $sku = uniqid();
        $slug  = Str::slug($req->name);
        $image = $req->file('image');

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('products')){
                Storage::disk('public')->makeDirectory('products');
            }
            $productimg = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('products/'.$imagename,$productimg);

            if(!Storage::disk('public')->exists('products/slider')){
                Storage::disk('public')->makeDirectory('products/slider');
            }
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('products/slider/'.$imagename,$slider);

        }else{
            $imagename = 'default.png';
        }

        $product = new Product();
        $product->sku           = $sku;
        $product->slug          = $slug;
        $product->name          = $req->name;
        $product->description   = $req->description;
        $product->price         = $req->price;
        $product->stock         = $req->stock;
        if($req->discount > 0){
            $product->it_discount = 1;
        }else{
            $product->it_discount = 0;
        }
        $product->discount      = $req->discount;
        $product->img           = $imagename;
        $product->save();

        Toastr::success('Producto creado correctamente', 'Success');
        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::findorfail($id);
        return view('admin.products.edit' ,compact('product'));
    }

    public function update(Request $req, $id)
    {
        $this->validate($req,[
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
        ]);

        $sku = uniqid();
        $slug  = Str::slug($req->name);
        $image = $req->file('image');
        $product = Product::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('products')){
                Storage::disk('public')->makeDirectory('products');
            }
            if(Storage::disk('public')->exists('products/'.$product->img)){
                Storage::disk('public')->delete('products/'.$product->img);
            }
            $productimg = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('products/'.$imagename,$productimg);

            if(!Storage::disk('public')->exists('products/slider')){
                Storage::disk('public')->makeDirectory('products/slider');
            } if(Storage::disk('public')->exists('products/slider'.$product->img)){
                Storage::disk('public')->delete('products/slider'.$product->img);
            }
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('products/slider/'.$imagename,$slider);

        }else{
            $imagename = 'default.png';
        }

        $product->sku           = $sku;
        $product->slug          = $slug;
        $product->name          = $req->name;
        $product->description   = $req->description;
        $product->price         = $req->price;
        $product->stock         = $req->stock;
        if($req->discount > 0){
            $product->it_discount = 1;
        }else{
            $product->it_discount = 0;
        }
        $product->discount      = $req->discount;
        $product->img           = $imagename;
        $product->save();

        Toastr::success('Producto editado  correctamente', 'Success');
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if(Storage::disk('public')->exists('products/'.$product->img)){
            Storage::disk('public')->delete('products/'.$product->img);
        }
        if(Storage::disk('public')->exists('products/slider'.$product->img)){
            Storage::disk('public')->delete('products/slider'.$product->img);
        }
        $product->delete();
        Toastr::success('Producto borrado correctamente :D','Success');
        return redirect()->back();
    }
    public function active($id){

        $product = Product::find($id);
        if($product->public == 1){
            $product->public = 0;
            $message = 'des-publicado';
        }else{
            $product->public = 1;
            $message = 'publicado';
        }
        $product->save();
        Toastr::success('Producto '. $message.' correctamente :D','Success');
        return redirect()->back();
    }
}
