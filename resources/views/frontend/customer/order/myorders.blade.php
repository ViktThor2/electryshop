@extends('frontend.layout.app')

@section('content')

  <h3>Rendeléseim</h3>

  <table class="table table-hover">

    <thead>
      <tr>
        <th>Rendelési szám</th>
        <th>Ár</th>
        <th>Eléhetőségek</th>
        <th>Rendelési leadása</th>
        <th><th>
      </tr>
    </thead>

    <tbody>

      @foreach( $customerOrders as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{number_format($order->price,0,",",".") }} Ft</td>
          <td>{{ $order->email }}<br>{{ $order->phone }}</td>
          <td>{{ $order->created_at }}</td>
          <td><a href="{{ route('myorder.show', $order->id) }}"
                class="btn btn-primary">Megtekintés
              </a>
          </td>
        </tr>
      @endforeach

    </tbody>

  </table>

@stop
