  <!-- Card -->
  <div class="card w-100 mb-4">

    <h5 class="mb-3">Szállítási mód</h5>

    {{-- Szállítási mód --}}
    <div class="form-group">
      <select class="form-control" name="delivery_id">
        @foreach($deliveries as $delivery)
          <option value="{{ $delivery->id }}">
            {{ $delivery->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div id="priceCard" class="card-body">

      <ul class="list-group list-group-flush">

        <li class="list-group-item d-flex justify-content-between
                          align-items-center border-0 px-0 pb-0">
            Termékek összesen :
            <span>
              {{ number_format($sum,0,",",".") }}  Ft
            </span>
        </li>

        <li id="sc_delivery_price" class="list-group-item d-flex
                justify-content-between align-items-center px-0">
            Szállítási költség :
            <span>{{ number_format($delivery->price,0,",",".") }} Ft</span>
        </li>

        <li class="list-group-item d-flex justify-content-between
                          align-items-center border-0 px-0 mb-3">
            <div>
              <strong>Végösszeg :</strong>
            </div>

            <span><strong>
                {{ number_format($sum,0,",",".") }} Ft
            </strong></span>
        </li>

      </ul>

      <a href="{{ route('order.create') }}"
        class="btn btn-primary w-100">Folytatás
      </a>

    </div>
  </div>
  <!--end Card -->
