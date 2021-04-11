@extends('admin.layout.app')

@section('content')

<div class="row">

  {{-- Létrehozás --}}
  <div class="col md-6 mt-4">

    <h3>Új Szállítási mód<h3>
    <form method="post" action="{{route('admin.delivery.store')}}">
          @csrf
      <div class="mb-3 w-75">

        {{-- Név --}}
        <div class="input-group mb-3">
          <span class="input-group-text">Név :</span>
          <input type="text" class="form-control"
                name="name" id="deliveryName"/>
        </div>

        {{-- Ár --}}
        <div class="input-group mb-3">
          <span class="input-group-text">Ár :</span>
          <input type="text" class="form-control"
                name="price" id="deliveryPrice"/>
          <span class="input-group-text"> Ft</span>
        </div>

        {{-- Mentés --}}
        <div class="d-flex justify-content-end mb-3">
          <button type="submit" class="btn btn-success">
            Mentés</button>
        </div>

      </div>
    </form>
  </div>

  {{-- Megjelenítés --}}
  <div class="col md-6 mt-4">

    <table class="table table-hover mt-3">
      <thead>
        <tr>
          <th>Szállítási mód</th>
          <th>Költsége</th>
        </tr>
      </thead>

      <tbody>
        @foreach($deliveries as $delivery)
          <tr>
            <td class="align-middle">{{ $delivery->name }}</td>
            <td class="align-middle">{{ $delivery->price }} Ft</td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>

@stop
