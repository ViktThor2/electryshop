<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function setData($data)
    {
      $this->customer_id = $data['customer_id'];
      $this->name   =  $data['name'];
      $this->email  =  $data['email'];
      $this->phone  =  $data['phone'];
      $this->postal =  $data['postal'];
      $this->city   =  $data['city'];
      $this->street =  $data['street'];
      $this->house  =  $data['house'];
      $this->price  =  $data['price'];

      if(isset($data['password']) && $data['password']) {
        $this->password = \Hash::make($data['password']);
      }
    }


}
