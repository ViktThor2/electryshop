<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Product, SubCategory};

class ProductController extends Controller
{
    public function index($category)
    {
      $maxPrice = Product::max('price');
      $products = Product::filtercat($category)->paginate('8');
      $categories = SubCategory::all();

      return view('frontend.product.index')
          ->with('products', $products)
          ->with('categories', $categories)
          ->with('maxPrice', $maxPrice);
    }

}
