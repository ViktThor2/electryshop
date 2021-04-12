<form action="{{ route('product.search') }}" method="post">
      @csrf

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">

          <input type="search" class="form-control"
              placeholder="Keresés" name="search"/>

          <div class="input-group-append">
            <button class="btn btn-outline-primary">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>

        </div>
      </div>
  </form>
