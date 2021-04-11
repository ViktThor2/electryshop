  <form action="{{route('admin.product.filter.category')}}" method="get">
        @csrf

    <!-- Section: Category -->
    <section class="mb-4" id="category">

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">

          {{-- Kategoria szürő --}}
          <select class="form-control w-50 mt-2" name="filterCategory">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">
              {{ $category->category->name }} \ {{ $category->name }}
            </option>
            @endforeach
          </select>

          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>

        </div>
      </div>

    </section>

  </form>
