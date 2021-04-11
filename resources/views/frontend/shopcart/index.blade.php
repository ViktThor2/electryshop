@extends('frontend.layout.app')

@section('content')

  @if(session()->has('message'))
    <h6>{{session('message')}}</h6>
  @endif

  @if(!session('scart'))
    <h5>A kosár üres</h5>

  @else
  <div class="row">

    <div class="col-9">
      @include('frontend.shopcart.shopcart')
    </div>

    <div class="col-3">
      @include('frontend.shopcart.pricecard')
    </div>

  </div>
  @endif

@stop
