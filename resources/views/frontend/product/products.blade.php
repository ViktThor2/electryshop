@foreach ($products as $product_item)

   <div class="col-lg-3 col-md-6 mb-4" id="productC">
     <div class="card h-100">

       <div class="card-img-top">
         <a href="{{ route('product.show', $product_item->id) }}">
           <img class="img-fluid" alt="{{ $product_item->name }}"
              src="{{ asset('img/'. $product_item->id.'.jpg') }}" >
          </a>
       </div>

       <div class="card-body" id="productBody">

         <div id="productName">
           <a href="{{ route('product.show', $product_item->id) }}"
                              class="card-title" id="product_name">
             {{ $product_item->brand }} {{ $product_item->name }}
           </a>
         </div>

         <div id="productPrice">
           <span id="product_p">
             {{number_format($product_item->price,0,",",".") }} Ft
           </span>
         </div>

       </div>

       <a href="{{ route('scart.add', $product_item->id) }}"
           class="btn btn-primary">Kosárba</a>

     </div>
   </div>

@endforeach
