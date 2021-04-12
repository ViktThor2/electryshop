<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <!-- Container wrapper -->
  <div class="container-fluid">

    <!--LEFT Collapsible wrapper -->
    <div class="collapse navbar-collapse">

      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page"
              href="{{route('index')}}">Kezdőlap
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index', 3) }}">
            Tv</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index', 2) }}">
            Fejhallgatók</a>
        </li>

      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <div class="w-25">
      @include('frontend.layout.search')
    </div>

    <!--RIGHT Collapsible wrapper -->
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <div class="card" id="shop_cart_card">
            <a class="nav-link" href="{{route('scart.index')}}">
                Kosár <i class="fas fa-shopping-bag fa-lg"></i>
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <div class="card">

            <a class="nav-link dropdown" href="#" role="button"
                    data-mdb-toggle="dropdown" aria-expanded="true">
                  @if( \Auth::guard('customer')->check() )
                    {{ \Auth::guard('customer')->user()->name }}
                  @else Saját fiók
                  @endif
              <i class="fas fa-user-alt fa-lg"></i>
            </a>

          <ul class="dropdown-menu dropdown-menu-lg-end">

            @if( \Auth::guard('customer')->check() )

                {{-- Profilom --}}
                <li><a class="dropdown-item btn btn-light"
                  href="\profil\modosit\{{ \Auth::guard('customer')->user()->id }}">
                            Profilom
                    </a>
                </li>

                {{-- Rendelésim --}}
                <li><a class="dropdown-item btn btn-light"
                        href="{{ route('customer.order.pivot') }}">
                        Rendeléseim
                    </a>
                </li>

                {{-- Kijelentkezés --}}
                <li><form action="{{route('customer.auth.destroy')}}" method="POST">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-light w-100">
                                  Kijelentkezés
                          </button>
                  </form>
                </li>

            @else

                {{-- Bejelentkezés --}}
                <li class="nav-item">
                  <a class="nav-link  btn btn-light" aria-current="page"
                  href="{{route('customer.auth.create')}}">Bejelentkezés</a>
                </li>

                {{-- Regisztráció --}}
                <li class="nav-item">
                  <a class="nav-link  btn btn-light" aria-current="page"
                     href="{{route('customer.create')}}">Regisztráció</a>
                </li>

            @endif

          </ul>

         </div>
        </li>

      </ul>
    </div>

  </div>
</nav>
