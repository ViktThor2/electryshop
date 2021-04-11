@extends('frontend.layout.app')

@section('content')

  @if(session()->has('message'))
    <h3>{{session('message')}}</h3>
  @endif

<div class="w-50" id="orderMain">

  <!--Order Form -->
  <form class="mt-5" id="orderForm" method="post"
        action="{{ route('order.store') }}">
        @csrf

      <h4 class="modal-title mb-2">Számlázási cím</h4>

      <!-- Name input -->
      <div class="input-group mb-3">
        <span class="input-group-text">Név :</span>
        <input type="text" class="form-control"
            name="name" id="name"
            value="{{ old('name') ?:
                \Auth::guard('customer')->user()->name }}" />
      </div>

      <!-- Email input  -->
      <div class="input-group mb-3">
        <span class="input-group-text">Email cím :</span>
        <input type="email" class="form-control"
                name="email" id="email"
                value="{{ old('email') ?:
                    \Auth::guard('customer')->user()->email }}" />
      </div>

      <!-- Phone input  -->
      <div class="input-group mb-3">
        <span class="input-group-text">Telefonszám :</span>
        <input type="string" class="form-control"
               name="phone" id="phone"
               value="{{ old('phone') ?:
                   \Auth::guard('customer')->user()->phone }}" />
      </div>


      <!--  Adress  -->

      <div class="input-group mb-3">
          <!-- Postal code input -->
          <span class="input-group-text">Irányítószám :</span>
          <input type="number" class="form-control"
              name="postal" id="postal"
              value="{{ old('postal') ?:
                  \Auth::guard('customer')->user()->postal }}" />

               <!-- City input  -->
          <span class="input-group-text">Város : </span>
          <input type="text" class="form-control"
              id="city" name="city"
              value="{{ old('city') ?:
                  \Auth::guard('customer')->user()->city }}" />
      </div>

      <div class="input-group mb-3">
        <!-- Street input  -->
        <span class="input-group-text">Utca: </span>
        <input type="text" class="form-control"
            id="street" name="street"
            value="{{ old('street') ?:
                \Auth::guard('customer')->user()->street }}" />

        <span class="input-group-text">Házszám : </span>
        <!-- house number input  -->
          <input type="string" class="form-control"
              id="house" name="house"
              value="{{ old('house') ?:
                  \Auth::guard('customer')->user()->house }}" />
      </div>

      <input type="hidden" name="customer_id"
             value="{{ \Auth::guard('customer')->user()->id }}">

      <input type="hidden" name="price" value="{{ $sum }}">

      <!-- Order button -->
      <button class="btn btn-primary btn-block mb-4"
              type="submit">Folytatás</button>

  </form>

</div>

@stop
