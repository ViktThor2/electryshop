<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
      $maxPrice = Product::max('price');
      $products = Product::paginate('8');
      $categories = SubCategory::all();

      return view('frontend.product.index')
          ->with('products', $products)
          ->with('categories', $categories)
          ->with('maxPrice', $maxPrice);
    }

    public function filterProduct(Request $request)
    {
      $maxPrice = Product::max('price');
      $products = Product::filter($request)->paginate('8');
      $categories = SubCategory::all();

      return view('frontend.product.index')
        ->with('products', $products)
        ->with('categories', $categories)
        ->with('maxPrice', $maxPrice);
    }

}
