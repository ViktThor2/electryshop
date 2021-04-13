<div class="w-100">

  <!--Comment -->
  <form class="mt-2 mb-2" method="post"
        action="{{ route('comment.store') }}" >
        @csrf

        <h4 class="modal-title mb-2">Új komment</h4>

        <!-- Name input -->
        <div class="input-group mb-3">
          <span class="input-group-text">Név :</span>
            <input type="text" class="form-control"
              name="name" id="commentName"/>
        </div>

        <!-- Description input -->
        <div class="form-outline mt-2 mb-2">
          <textarea class="form-control" name="description"
              id="description" rows="4" required></textarea>
          <label class="form-label" for="description">Leírás</label>
        </div>

        <!-- Description input -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <!--Button -->
        <button class="btn btn-primary btn-block" type="submit">Mentés</button>

  </form>

</div>
