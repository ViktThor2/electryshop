  <!-- Card -->
  <div class="card w-100 mb-2">
    <form action="{{ route('order.create') }}" method="get">

    <div id="priceCard" class="card-body">

      <ul class="list-group list-group-flush">

        <li class="list-group-item d-flex justify-content-between
                          align-items-center border-0 px-0 pb-0 mb-4">
            Termékek összesen :
            <span>
              {{ number_format($sum,0,",",".") }}  Ft
            </span>
        </li>

        {{-- Szállítási mód --}}
        <div class="form-group mb-2">
          <select class="form-control" name="delivery_id">
            @foreach($deliveries as $delivery)
              <option value="{{ $delivery->id }}">
                {{ $delivery->name }} {{ $delivery->price }} Ft
              </option>
            @endforeach
          </select>
        </div>

      </ul>

      <div class="input-group-append">
        <button class="btn btn-primary w-100">
          Folytatás
        </button>
      </div>

    </div>
  </div>
  <!--end Card -->
