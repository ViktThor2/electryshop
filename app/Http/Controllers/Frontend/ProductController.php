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
      $products = Product::paginate('8');
      $categories = SubCategory::all();

      return view('frontend.product.index')
          ->with('products', $products)
          ->with('categories', $categories);
    }

    public function filterProduct(Request $request)
    {
      $products = new Product;
      $products = Product::filter($request)->paginate('8');
      $categories = SubCategory::all();

      return view('frontend.product.index')
        ->with('products', $products)
        ->with('categories', $categories);
    }


}
