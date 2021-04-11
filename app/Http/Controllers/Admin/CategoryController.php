<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
      $subCategories = SubCategory::paginate('10');
      return view('admin.category.index')
        ->with('subCategories', $subCategories);
    }

    public function create()
    {
      $categorys = Category::all();
      return view('admin.category.create')
          ->with('categorys', $categorys);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
      ]);

      $category = new Category;
      $category->name = $request->name;
      $category->save();

      return redirect()->route('admin.index');
    }

    public function subCategoryStore(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'category_id' => 'required'
      ]);

      $subCategory = new SubCategory;
      $subCategory->name = $request->name;
      $subCategory->category_id = $request->category_id;
      $subCategory->save();

      return redirect()->route('admin.index');
    }

}
