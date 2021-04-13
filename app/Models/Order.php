<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function setData()
    {
      $this->customer_id = \Auth::guard('customer')->user()->id;
      $this->delivery_id = session('scart')[100]['id'];
      $this->name   =  session('adress')['name'];
      $this->email  =  session('adress')['email'];
      $this->phone  =  session('adress')['phone'];
      $this->postal =  session('adress')['postal'];
      $this->city   =  session('adress')['city'];
      $this->street =  session('adress')['street'];
      $this->house  =  session('adress')['house'];
    }

    public function delivery()
    {
      return $this->belongsTo(Delivery::class);
    }

    public function customer()
    {
      return $this->belongsTo(Customer::class);
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }

}
