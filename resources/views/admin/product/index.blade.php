@extends('admin.layout.app')

@section('content')

<div class="row">

  <div class="col-lg-10">
    @include('admin.product.filterCategory')
  </div>

  <div class="col-lg-2 d-flex justify-content-end">
    <a href="{{route('admin.product.create')}}"
    class="btn btn-primary mt-2 mb-4">Új termék</a>
  </div>
</div>

  <table class="table table-hover mt-3">

    <thead>
      <tr>
        <th>Id</th>
        <th>Név</th>
        <th>Kategória</th>
        <th>Ár</th>
        <th>Mennyiség</th>
        <th>Státusz</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach($products as $product)
        <tr>
          <td class="align-middle">{{ $product->id }}</td>
          <td class="align-middle">{{ $product->name }}</td>
          <td class="align-middle">
            {{ $product->category->name }} \ {{ $product->subcategory->name }}
          </td>
          <td class="align-middle">
            {{number_format($product->price,0,",",".") }} Ft
          </td>
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

@stop
