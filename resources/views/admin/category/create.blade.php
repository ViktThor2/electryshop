@extends('admin.layout.app')

@section('content')

<div class="row">

  {{-- Főkategoria --}}
  <div class="col md-6 mt-4">

    <h3>Kategória létrehozása<h3>
    <form method="post" action="{{route('admin.category.store')}}">
          @csrf
      <div class="mb-3 w-75">

        {{-- Név --}}
        <div class="form-group">
          <input type="text" class="form-control" name="name">
        </div>

        {{-- Mentés --}}
        <div class="d-flex justify-content-end mb-3">
          <button type="submit" class="btn btn-success">
            Mentés</button>
        </div>

      </div>
    </form>
  </div>

  {{-- Alkategoria --}}
  <div class="col md-6 mt-4">

    <h3>Alkategória létrehozása<h3>
    <form method="post" action="{{route('admin.subCategory.store')}}">
          @csrf
      <div class="mb-3 w-75">

        {{-- Főkategoria --}}
        <div class="form-group">
          <select class="form-control" name="category_id">
            @foreach($categorys as $category)
              <option value="{{ $category->id }}">
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Alkategoria neve --}}
        <div class="form-group">
          <input type="text" class="form-control" name="name">
        </div>

        {{-- Mentés --}}
        <div class="d-flex justify-content-end mb-3">
          <button class="btn btn-success"
            type="submit">Mentés</button>
        </div>

      </div>
    </form>
  </div>

</div>

@stop
