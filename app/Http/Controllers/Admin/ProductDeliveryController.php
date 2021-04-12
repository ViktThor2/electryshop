<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Delivery};

class ProductDeliveryController extends Controller
{
    public function index()
    {
      $products = Product::paginate('10');
      return view('admin.product.delivery.index')
        ->with('products', $products);
    }

    public function edit($productId)
    {
      $product = Product::find($productId);
      $deliveries = Delivery::all();

      return view('admin.product.delivery.create')
        ->with('product', $product)
        ->with('deliveries', $deliveries);
    }

    public function update(Request $request, $productId)
    {
      $product = Product::find($productId);
      $product->deliveries()->attach($request->input('delivery_id'));

      return redirect()->route('admin.product.delivery.index');
    }

}
