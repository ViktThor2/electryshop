<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopCart extends Model
{
  public function saveData($data)  {
    $this->product_id    =  $data['id'];
    $this->product_name  =  $data['name'];
    $this->product_price =  $data['price'];
    $this->product_qty   =  $data['qty'];
  }

  public function scopeSum()
  {
    $scart = session()->get('scart');
    $sum = 0;
    if(isset($scart))
    {
      foreach ($scart as $id => $value) {
        $sum += $value['sum'];
      }
    }
    return $sum;
  }

  public function productDecrement($projectId)
  {
    DB::table('products')->decrement('qty', 3)->where('projectId', '=', $projectId);
  }

}
