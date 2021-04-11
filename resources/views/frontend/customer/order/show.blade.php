@extends('frontend.layout.app')

@section('content')

  <h6>Rendelési szám : {{ $order->id }}</h6>
  <h6>Rendelés időpontja : {{ $order->created_at }}</h6>
  <h6>Rendelés végösszege :
    {{number_format($order->price,0,",",".") }} Ft

  <table class="table table-hover">

    <thead>
      <tr>
        <th></th>
        <th>Termék neve</th>
        <th>Termék Ára</th>
        <th>Mennyiség</th>
      </tr>
    </thead>

    <tbody>
      @foreach( $orderItem as $order)
        <tr>

          <td class="align-middle">
            <a href="{{ route('product.show', $order->product_id) }}">
              <img alt="{{ $order->product_name }}" id="order_product_img"
              class="img-fluid" src="{{asset('img/'. $order->product_id.'.jpg')}}">
            </a>
          </td>

          <td class="align-middle">
            <a href="{{ route('product.show', $order->product_id) }}">
              {{ $order->product_name }}
            </a>
          </td>

          <td class="align-middle">
            {{number_format($order->product_price,0,",",".") }} Ft
          </td>

          <td class="align-middle">{{ $order->product_qty }} db</td>
        </tr>
      @endforeach
    </tbody>

  </table>

@stop
