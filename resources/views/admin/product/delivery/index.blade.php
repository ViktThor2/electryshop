@extends('admin.layout.app')

@section('content')

  <table class="table table-hover">

    <thead>
      <tr>
        <th>Id</th>
        <th>Termék neve</th>
        <th>Szállítási módok</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td class="align-middle">{{ $product->name }}</td>
          <td class="align-middle">
            @foreach($product->deliveries as $delivery)
              {{ $delivery->name }} ( {{ $delivery->price }} Ft ) <br/>
            @endforeach
          </td>
          <td class="align-middle">
            <a href="{{ route('admin.product.delivery.edit', $product->id) }}"
                class="btn btn-link"><i class="fas fa-edit fa-lg"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-end">
      {!! $products->links() !!}
  </div>

@stop
