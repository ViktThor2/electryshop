<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function setData($data, $category)
    {
      $this->name   =  $data['name'];
      $this->price  =  $data['price'];
      $this->qty    =  $data['qty'];
      $this->active =  $data['active'];
      $this->sub_category_id = $data['sub_category_id'];
      $this->category_id     = $category;
    }

    public function scopeFilter($query, $data)
    {
      if(null !== $data->sortProduct && $data->sortProduct) {
        switch ($data->sortProduct) {
          case 'sort_cheap':
            $query->orderBy('price', 'asc');
          break;

          case 'sort_expensive':
            $query->orderBy('price', 'desc');
          break;

          case 'sort_abc':
            $query->orderBy('name', 'asc');
          break;

          case 'sort_cba':
            $query->orderBy('name', 'desc');
          break;
        }
      }

      if(null !== $data->filterCategory && $data->filterCategory) {
        foreach ($data->filterCategory as $key => $value) {
          $query->orWhere('sub_category_id', 'LIKE', '%'.$value.'%');
        }
      }

      if(null !== $data->filterPrice && $data->filterPrice) {
        foreach ($data->filterPrice as $key => $value) {
          $query->whereBetween('price', [$value, $value+25000]);
        }
      }

    }

    public function scopeFiltercat($query, $data)
    {
      $query->orWhere('category_id', 'LIKE', '%'.$data.'%');
    }

    public function scopeSearch($query, $data)
    {
      $query->where('name', 'LIKE', '%' . $data . '%');
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
      return $this->belongsTo(SubCategory::class);
    }

    public function deliveries()
    {
      return $this->belongsToMany(Delivery::class);
    }

}
