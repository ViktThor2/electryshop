@extends('admin.layout.app')

@section('content')

  <div class="d-flex justify-content-end">
    <a href="{{route('admin.category.create')}}"
    class="btn btn-primary mt-2">Új kategória</a>
  </div>

  <table class="table table-hover mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Főkategória</th>
        <th>Alkategória</th>
      </tr>
    </thead>

    <tbody>
      @foreach( $subCategories as $subCategory)
        <tr>
          <td>{{ $subCategory->id }}</td>
          <td>{{ $subCategory->category->name }}</td>
          <td>{{ $subCategory->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-end">
      {!! $subCategories->links() !!}
  </div>

@stop
