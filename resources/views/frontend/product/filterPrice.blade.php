
<!-- Section: price -->
<section class="mb-4" id = "price">

  <div class="slider-price d-flex align-items-center my-4">

    <span class="font-weight-normal small text-muted mr-2">
      0 Ft
    </span>

    <form class="multi-range-field w-100" method="post"
          action="{{route('filter.price')}}">
          @csrf

      <input id="multi" name="price_filter"
             class="multi-range w-100" type="range" />

      <button type="submit" class="btn btn-primary">
             Keresés</button>
    </form>

    <span class="font-weight-normal small text-muted ml-2">
      {{ $maxPrice }} Ft
    </span>

  </div>

</section>
