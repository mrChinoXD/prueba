@extends('layouts.site.head')
@section('title','Ver')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ Storage::disk('public')->url('products/slider/'.$product->img) }}"/>
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">${{$product->price}}</small>
                        @if($product->it_discount == 1)
                            <small class="text-muted">{{$product->discount}}% D.d.</small>
                        @else
                            <small class="text-muted" style="display: none">{{$product->discount}}%</small>
                        @endif
                    </div>
                    <form action="{{route('customer.buy',$product->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="text" hidden name="user" value="{{Auth::user()->id}}">
                        <input type="number" name="cuantiti">
                        <input type="submit" value="comparar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



