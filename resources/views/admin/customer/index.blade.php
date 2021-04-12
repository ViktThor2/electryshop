@extends('admin.layout.app')

@section('content')

  <table class="table table-hover">

    <thead>
      <tr>
        <th>Név</th>
        <th>Email cím</th>
        <th>Telefonszám</th>
        <th>Város</th>
        <th>Utca</th>
        <th>Regisztrált</th>
      </tr>
    </thead>

    <tbody>
      @foreach($customers as $customer)
        <tr>
          <td class="align-middle">{{ $customer->name }}</td>
          <td class="align-middle">{{ $customer->email }}</td>
          <td class="align-middle">{{ $customer->phone }}</td>
          <td class="align-middle">{{ $customer->city }}</td>
          <td class="align-middle">{{ $customer->street }} {{ $customer->house }}</td>
          <td class="align-middle">{{ $customer->created_at }}
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-end">
      {!! $customers->links() !!}
  </div>

@stop
