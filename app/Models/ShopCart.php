<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCart extends Model
{
  public function saveData($data)  {
    $this->product_id    =  $data['id'];
    $this->product_name  =  $data['name'];
    $this->product_price =  $data['price'];
    $this->product_qty   =  $data['qty'];
  }

}
