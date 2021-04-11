@extends('frontend.layout.app')

@section('content')

<div class="row">

  <div class="col-lg-3" id="productFilterBar">
    <form action="{{ route('product.filter') }}" method="get">
        @csrf
        <div class="card h-100">
            @include('frontend.product.sortProduct')
            @include('frontend.product.filterCategory')
      <button type="input" class="btn btn-primary">Keresés</button>
    </div>
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
