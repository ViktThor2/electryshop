@extends('admin.layout.app')

@section('content')

  <table class="table table-hover">

    <thead>
      <tr>
        <th>Id</th>
        <th>Vásárló</th>
        <th>Elérhetőségek</th>
        <th>Végösszeg</th>
        <th>Cím</th>
        <th>Rendelés ideje</th>
      </tr>
    </thead>

    <tbody>
      @foreach($orders as $order)
        <tr>
          <td class="align-middle">{{ $order->id }}</td>
          <td class="align-middle">{{ $order->name }}</td>
          <td class="align-middle">
            {{ $order->email }} <br/> {{ $order->phone }}
          </td>
          <td class="align-middle">
            {{number_format($order->price,0,",",".") }} Ft
          </td>
          <td class="align-middle">
            {{ $order->city }} {{ $order->street }} {{  $order->house}}
          </td>
          <td class="align-middle">{{ $order->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-end">
      {!! $orders->links() !!}
  </div>

@stop
