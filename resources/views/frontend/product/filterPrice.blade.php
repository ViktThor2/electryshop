<h4 class="font-weight-bold mt-4 mb-2">Árkategória</h4>

  @for ($i = 0; $i < $maxPrice ; $i = $i + 25000)
     <div class="form-check pl-0 border">

       <input type="checkbox" name="filterPrice[]"
         class="form-check-input filled-in"
         value = "{{ $i }}" id="{{ $i }}">

        <label class="form-check-label
               card-link-secondary"
               for="{{ $i }}">
                {{ number_format( $i, 0,",",".") }} -
                {{ number_format( $i + 25000, 0,",",".") }} Ft
        </label>
      </div>
    @endfor
