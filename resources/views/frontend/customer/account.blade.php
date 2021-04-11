@extends('frontend.layout.app')

@section('content')

    @if(session()->has('message'))
      <h3>{{session('message')}}</h3>
    @endif

    @include('frontend.customer.form')

@stop
