@extends('frontend.layout.app')

@section('content')

<div class="row">

  <div class="col-lg-3">
    <form action="{{route('product.filter')}}" method="get">
        @csrf
        @include('frontend.product.sorting')
        @include('frontend.product.filterCategory')
        @include('frontend.product.filterPrice')
        <button type="input" class="btn btn-primary mt-4 w-100">Keresés</button>
    </form>
  </div>


  <div class="col-lg-9">
    <div class="row">
      @include('frontend.product.products')
    </div>

    <div class="d-flex justify-content-end">
        {!! $products->links() !!}
    </div>

  </div>

</div>

@endsection
