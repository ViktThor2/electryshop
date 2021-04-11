  <!-- Section: Category -->
  <section class="mb-4" id="category">

    <h4 class="font-weight-bold mb-3">Kategória</h4>

    @foreach ($categories as $category)
       <div class="form-check pl-0 border">

          <input type="checkbox" name="filterCategory"
                 class="form-check-input filled-in"
                 id="categoryCheck"
                 value = "{{ $category->id }}" >

          <label  id="categoryLabel"
                  class="form-check-label small
                  text-uppercase card-link-secondary"
                  for="{{ $category->category_name }}">
                      {{ $category->name }}
          </label>
        </div>

    @endforeach

  </section>
