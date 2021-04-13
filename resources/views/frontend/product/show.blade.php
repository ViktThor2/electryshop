@extends('frontend.layout.app')

@section('content')

  <div class="row">

    <div class="col-lg-4">
      <div class="card">
        <img class="img-fluid" alt="{{ $product->name }}"
           src="{{ asset('img/'. $product->id.'.jpg') }}">
      </div>
    </div>

    <div class="col-lg-8">

      <div class="card mb-3">
        <h2 class="mb-3">{{$product->name}}</h2>

        <h5>Ára : {{ number_format($product->price,0,",",".") }} Ft</h5>
        <h5>Kategória : {{ $product->category->name}} \
          {{ $product->subcategory->name}}
        </h5>
        <h5>Mennyiség : {{ $product->qty }} db</h5>
      </div>

      <a href="{{ route('scart.add', $product->id) }}"
          class="btn btn-primary">Kosárba</a>


      <div class="card">
        <h3>Vélemények</h3>
        @include('frontend.comment.index');
        @include('frontend.comment.create');
      </div>

    </div>

  </div>

@stop
