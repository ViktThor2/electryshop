@extends('admin.layout.app')

@section('content')

  <div class="row">

    {{-- Termék --}}
    <div class="form-group">
      <h3>{{$product->name}}</h3>
    </div>

    {{-- Szállítási mód --}}
    <div class="col-lg-5">
      <form method="post" action =
        "{{ route('admin.product.delivery.update', $product->id) }}">
        @csrf

        <div class="card h-100">

            {{-- Főkategoria --}}
            <div class="form-group">
              <select class="form-control" name="delivery_id">
                @foreach ($deliveries as $delivery)
                  <option value="{{ $delivery->id }}">
                    {{ $delivery->name }}
                  </option>
                @endforeach
              </select>
            </div>

          <button type="input" class="btn btn-primary">Mentés</button>

        </div>
      </form>
    </div>

  </div>

@stop
