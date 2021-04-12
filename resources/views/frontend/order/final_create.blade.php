@extends('frontend.layout.app')

@section('content')

  <h4>Rendelés véglegesítése</h4>
  <table class="table mb-5">

    <thead>
      <tr>
        <th>Név</th>
        <th>Email cím</th>
        <th>Telefonszám</th>
        <th>Irányítószám</th>
        <th>Város</th>
        <th>Utca</th>
        <th>Házszám</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <th scope="row">{{ session('adress')['name'] }}</th>
        <td>{{ session('adress')['email'] }}</td>
        <td>{{ session('adress')['phone'] }}</td>
        <td>{{ session('adress')['postal'] }}</td>
        <td>{{ session('adress')['city'] }}</td>
        <td>{{ session('adress')['street'] }}</td>
        <td>{{ session('adress')['house'] }}</td>
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
          <td>{{ number_format($item['sum'],0,",",".") }} Ft</td>
        </tr>
      @endforeach

      <tr>
        <td></td>
        <td></td>
        <td>Végösszeg :</td>
        <td>{{ number_format($sum,0,",",".") }}  Ft</td>
        <td>
          <a href="{{ route('order.final.store') }}"
          class="btn btn-primary">Rendelés Leadása</a>
        </td>
      </tr>

    </tbody>

  </table>

@stop
