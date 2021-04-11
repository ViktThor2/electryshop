@extends('frontend.layout.app')

@section('content')

  <h4>Rendelés véglegesítése</h4>
  <table class="table mb-5">

    <thead>
      <tr>
        <th scope="col">Név</th>
        <th scope="col">Email cím</th>
        <th scope="col">Telefonszám</th>
        <th scope="col">Irányítószám</th>
        <th>Város</th>
        <th>Utca</th>
        <th>Házszám</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">{{ $order->name }}</th>
        <td>{{ $order->email }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->postal }}</td>
        <td>{{ $order->city }}</td>
        <td>{{ $order->street }}</td>
        <td>{{ $order->house }}</td>
      </tr>
    </tbody>

  </table>


  <h4>Rendelés tételei</h4>
  <table class="table">

    <thead>
      <tr>
        <th scope="col">Név</th>
        <th scope="col">Ár / db</th>
        <th scope="col">Mennyiség</th>
        <th scope="col">Ár összesen</th>
      </tr>
    </thead>

    <tbody>

      @foreach(session('scart') as $id => $item)
        <tr>
          <td>{{ $item['name'] }}</td>
          <td>{{ $item['price'] }} Ft</td>
          <td>{{ $item['qty'] }} db</td>
          <td>{{ $item['sum'] }} Ft</td>
        </tr>
      @endforeach

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <a href="{{ route('order.final.store', $order->id) }}"
          class="btn btn-primary">Rendelés Leadása</a>
        </td>
      </tr>

    </tbody>

  </table>

@stop
