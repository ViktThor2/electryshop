@extends('layout.app')

@section('content')

  <div class="row">

    <div class="col-lg-4">
      <div class="w-100 h-100" id="product_page_img">
        <img class="img-fluid" alt="{{ $product->name }}"
           src="{{ asset('img/'. $product->id.'.webp') }}">
      </div>
    </div>

    <div class="col-lg-8">
      <h1 class="mb-4">{{$product->name}}</h1>

      <h5>Ára : {{$product->price}} Ft</h5>
    </div>

  </div>

@stop
