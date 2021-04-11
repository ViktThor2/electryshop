<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Delivery;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::paginate('10');
      $categories = SubCategory::all();

      return view('admin.product.index')
        ->with('products', $products)
        ->with('categories', $categories);
    }

    public function create()
    {
      $subCategories = SubCategory::all();
      return view('admin.product.create')
        ->with('subCategories' ,$subCategories);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name'    =>  'required|max:255',
        'price'   =>  'required',
        'qty'     =>  'required',
        'active'  =>  'required',
        'sub_category_id' => 'required'
      ]);

      $subCat = SubCategory::find($request->sub_category_id);
      $category = $subCat->category->id;

      $product = new Product;
      $product->setData($request->all(), $category);
      $product->save();

      return redirect()->route('admin.product.index');
    }

    public function destroy($productId)
    {
      $product = Product::find($productId);
      $product->delete();

      return redirect()->route('admin.product.index');
    }

    public function filterCategory(Request $request)
    {
      $products = Product::filterCategory($request->filterCategory)->paginate('8');
      $categories = SubCategory::all();

      return view('admin.product.index')
        ->with('products', $products)
        ->with('categories', $categories);
    }

}
