@extends('admin.layout.app')

@section('content')
  <div class="w-75">

    <h3>Termék létrehozása<h3>
    <form method="post" action="{{route('admin.product.store')}}">
          @csrf

        {{-- Név --}}
        <div class="input-group mb-3 mt-4">
          <span class="input-group-text w-25">Termék neve :</span>
          <input type="text" class="form-control" name="name">
        </div>

        {{-- Kategória --}}
        <div class="input-group mb-3">
          <span class="input-group-text w-25">Kategória :</span>
          <select class="form-control" name="sub_category_id">
            @foreach($subCategories as $category)
              <option value="{{ $category->id }}">
                {{ $category->category->name }} / {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Ár --}}
        <div class="input-group mb-3">
          <span class="input-group-text w-25">Termék ára :</span>
          <input type="text" class="form-control" name="price">
          <span class="input-group-text"> Ft</span>
        </div>

        {{-- Mennyiség --}}
        <div class="input-group mb-3">
          <span class="input-group-text w-25">Mennyiség :</span>
          <input type="text" class="form-control" name="qty">
          <span class="input-group-text"> db</span>
        </div>

        {{-- Rendelhető --}}
        <div class="input-group mb-3">
          <span class="input-group-text w-25">Rendelhető :</span>
          <select class="form-control" name="active">
              <option value="1">Igen</option>
              <option value="0">Nem</option>
          </select>
        </div>

        {{-- Mentés --}}
        <div class="d-flex justify-content-end mb-3">
          <button type="submit" class="btn btn-success">Mentés</button>
        </div>

    </form>
  </div>
@stop
