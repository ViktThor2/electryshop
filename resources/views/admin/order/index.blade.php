@extends('admin.layout.app')

@section('content')

  <div class="d-flex justify-content-end">
    <a href="{{route('admin.order.create')}}"
    class="btn btn-primary mt-2">Új termék</a>
  </div>

  <table class="table table-hover mt-3">

    <thead>
      <tr>
        <th>Id</th>
        <th>Vásárló</th>
        <th>Elérhetőséek</th>
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
