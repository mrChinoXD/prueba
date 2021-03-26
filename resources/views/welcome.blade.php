@extends('layouts.site.head')
@section('title','Inicio')
@section('content')

    <div class="row">
    @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ Storage::disk('public')->url('products/'.$product->img) }}"/>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-info btn-outline-secondary">Ver</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary">Comprar</a>
                            </div>
                            <small class="text-muted">${{$product->price}}</small>
                            @if($product->it_discount == 1)
                                <small class="text-muted">{{$product->discount}}% D.d.</small>
                            @else
                                <small class="text-muted" style="display: none">{{$product->discount}}%</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        </div>


@endsection


