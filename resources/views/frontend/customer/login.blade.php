@extends('frontend.layout.app')

@section('content')

  @if(session()->has('message'))
    <h3>{{session('message')}}</h3>
  @endif

  @if($errors->first('email'))
    <h2 style="color:red">{{$errors->first('email')}}</h2>
  @endif

<div class="w-25 mt-5" id="loginMain">

  <!--Login Form -->
  <form method="post" action="{{ route('customer.auth.store') }}">
        @csrf

      <h4 class="modal-title mb-4">Bejelentkezés</h4>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" class="form-control" name="email"/>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" class="form-control" name="password"/>
      </div>

      <!-- Login button -->
      <button class="btn btn-primary btn-block"
              type="submit">Bejelentkezés</button>

  </form>
</div>

@stop
