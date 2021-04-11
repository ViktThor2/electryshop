<h4 class="font-weight-bold mt-4 mb-2">Kategória</h4>

@foreach ($categories as $category)
   <div class="form-check pl-0 border">

     <input type="checkbox" name="filterCategory[]"
       class="form-check-input filled-in"
       id="{{ $category->id }}"
       value = "{{ $category->id }}" >

      <label class="form-check-label
             card-link-secondary"
             for="{{ $category->id }}">
              {{ $category->name }}
      </label>

    </div>

@endforeach
