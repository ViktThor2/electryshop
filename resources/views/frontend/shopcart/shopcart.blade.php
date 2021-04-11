
<table class="table table-hover">

  <thead>
    <tr>
      <th scope="col" width="15%"></th>
      <th scope="col" width="25%">Név</th>
      <th scope="col" width="15%">Ár / db</th>
      <th scope="col" width="25%">Mennyiség</th>
      <th scope="col" width="10%">Összesen</th>
      <th scope="col" width="10%" id="scart_delete">
          <a href="{{ route('scart.delete.all') }}"
            class="btn btn-danger btn-sm">Törlés</a>
      </th>
    </tr>
  </thead>

  <tbody>

    @foreach(session('scart') as $id => $item)
      <tr>
        <td class="align-middle"><a href="{{ route('product.show', $item['id']) }}">
                <img class="img-fluid" alt="{{ $item['name'] }}"
                  src="{{ asset('img/'. $item['id'].'.jpg') }}">
            </a>
        </td>

        <td class="align-middle">
          <a href="{{ route('product.show', $item['id']) }}">
            {{ $item['name'] }}</a>
        </td>

        <td class="align-middle">
          {{ number_format($item['price'],0,",",".") }} Ft</td>
        <td class="align-middle">
          <a href="{{ route('scart.minus', $item['id']) }}"
                                  class="btn btn-danger">-</a>

                                  {{ $item['qty'] }} db

          <a href="{{ route('scart.plus', $item['id']) }}"
                                 class="btn btn-success">+</a>
        </td>
        <td class="align-middle">
          {{ number_format($item['sum'],0,",",".") }} Ft</td>

        <td class="align-middle"><a href="{{ route('scart.delete', $item['id']) }}"
              class="btn btn-link"><i class="fas fa-trash-alt fa-3x"></i>
            </a>
        </td>

      </tr>
    @endforeach

  </tbody>

</table>
