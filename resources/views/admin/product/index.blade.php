@extends('admin.layout.app')

@section('content')

  <div class="d-flex justify-content-end">
    <a href="{{route('admin.product.create')}}"
    class="btn btn-primary mt-2">Új termék</a>
  </div>

  <table class="table table-hover mt-3">

    <thead>
      <tr>
        <th scope="col" width="5%">Id</th>
        <th scope="col" width="25%">Név</th>
        <th scope="col" width="15%">Kategória</th>
        <th scope="col" width="15%">Alkategória</th>
        <th scope="col" width="10%">Ár</th>
        <th scope="col" width="10%">Mennyiség</th>
        <th scope="col" width="10%">Státusz</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach($products as $product)
        <tr>
          <td class="align-middle">{{ $product->id }}</td>
          <td class="align-middle">{{ $product->name }}</td>
          <td class="align-middle">{{ $product->category->name }}</td>
          <td class="align-middle">{{ $product->subcategory->name }}</td>
          <td class="align-middle">{{ $product->price }} Ft</td>
          <td class="align-middle">{{ $product->qty }} db</td>
          <td class="align-middle">@if($product->active == 1) Rendelhető
              @else Nem rendelhető
              @endif
          </td>
          <td class="align-middle"><a href="{{ route('admin.product.delete', $product->id) }}"
                class="btn btn-link"><i class="fas fa-trash-alt fa-lg"></i>
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
