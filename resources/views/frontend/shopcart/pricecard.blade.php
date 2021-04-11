
        <!-- Card -->
        <div class="card w-100 mb-4">

          <div id="priceCard" class="card-body">

            <h5 class="mb-3">Teljes összeg :</h5>

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
                  <span>0 Ft
                  </span>
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
