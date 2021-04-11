<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview" role="menu" data-accordion="false">

        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p> Dashboard </p>
          </a>
        </li>

        {{-- Termékek fül --}}
        <li class="nav-item has-treeview">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Termékek <i class="right fas fa-angle-left"></i></p>
          </a>

          <ul class="nav nav-treeview">

            {{-- Kategóriák --}}
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Kategóriák </p>
              </a>
            </li>

            {{-- Termékek Szállítási módja --}}
            <li class="nav-item">
              <a href="{{ route('admin.product.delivery.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Termékek szállítása </p>
              </a>
            </li>

            {{-- Termékek --}}
            <li class="nav-item">
              <a href="{{ route('admin.product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Termékek</p>
              </a>
            </li>

          </ul>
        </li>

        {{-- Vásárlók fül --}}
        <li class="nav-item has-treeview">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p> Vásrlók
              <i class="right fas fa-angle-left"></i>
            </p>
           </a>

           {{-- Vásrlók --}}
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.customer.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Vásárlók </p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Rendelések fül --}}
        <li class="nav-item has-treeview">

          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p> Rendelések
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            {{-- Szállítási módok --}}
            <li class="nav-item">
              <a href="{{ route('admin.delivery.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Szállítási módok </p>
              </a>
            </li>

            {{-- Rendelések --}}
            <li class="nav-item">
              <a href="{{ route('admin.order.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Rendelések </p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
