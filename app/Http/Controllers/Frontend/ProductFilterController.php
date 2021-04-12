<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, SubCategory};

class ProductFilterController extends Controller
{
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

        public function search(Request $request)
        {
          $products = Product::search($request->input('search'))->paginate('8');

          $maxPrice = Product::max('price');
          $categories = SubCategory::all();

            return view('frontend.product.index')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('maxPrice', $maxPrice);
        }
}
