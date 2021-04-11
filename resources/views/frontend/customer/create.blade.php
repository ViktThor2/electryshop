@extends('frontend.layout.app')

@section('content')

  @if(session()->has('message'))
    <h3>{{session('message')}}</h3>
  @else

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    @include('frontend.customer.form')
  @endif

@stop
