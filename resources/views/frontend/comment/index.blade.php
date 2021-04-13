<div class="row">
  <table class="table table-hover mt-3">

    <thead>
      <tr>
        <th width="15%">Vásárló neve</th>
        <th width="40%">Leírás</th>
      </tr>
    </thead>

    <tbody>
      @foreach($product->comments()->get() as $comment)
        <tr>
          <td class="align-middle">{{ $comment->customer->name }}</td>
          <td class="align-middle">{{ $comment->description }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
