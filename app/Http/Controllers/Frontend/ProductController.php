<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product, SubCategory};

class ProductController extends Controller
{
    public function index()
    {
      $maxPrice = Product::max('price');
      $products = Product::paginate('12');
      $categories = SubCategory::all();

      return view('frontend.product.index')
          ->with('products', $products)
          ->with('categories', $categories)
          ->with('maxPrice', $maxPrice);
    }

    public function show($productId)
    {
      $product = Product::find($productId);
      return view('frontend.product.show')
        ->with('product', $product);
    }

}
