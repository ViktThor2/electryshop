<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, ShopCart, Delivery};

class ShopCartController extends Controller
{
    public function index()
    {
      $scart = session()->get('scart');
      $sum = 0;

      if(isset($scart)){
        foreach ($scart as $id => $value) {
            $sum += $value['sum'];
        }
      }
      session()->put('scart', $scart);

      $deliveries = Delivery::all();

      return view('frontend.shopcart.index')
          ->with('deliveries', $deliveries)
          ->with('sum', $sum);
    }

    public function add($itemId)
    {
      $product = Product::findorFail($itemId);
      $scart = session()->get('scart');

      if(isset($scart[$itemId]))  {
        $scart[$itemId]["qty"] += 1;
        $scart[$itemId]["sum"] = $scart[$itemId]["qty"] * $scart[$itemId]["price"];
      }

      else {
        $scart[$product->id] = array(
           "id"     =>  $product->id,
           "name"   =>  $product->name,
           "price"  =>  $product->price,
           "qty"    =>  1,
           "sum"    =>  $product->price
        );
      }

       session()->put('scart', $scart);
       session()->flash('message', 'Termék hozzá adva');
       return redirect()->back();
    }

    public function plus($itemId)
    {
      $scart = session()->get('scart');
      $scart[$itemId]["qty"] += 1;
      $scart[$itemId]["sum"] = $scart[$itemId]["qty"] * $scart[$itemId]["price"];

      session()->put('scart', $scart);
      return redirect()->back();
    }

    public function minus($itemId)
    {
      $scart = session()->get('scart');
      if($scart[$itemId]["qty"] == 1) {
        unset($scart[$itemId]);
      }
      else {
        $scart[$itemId]["qty"] -= 1;
        $scart[$itemId]["sum"] =
            $scart[$itemId]["qty"] * $scart[$itemId]["price"];
      }

      session()->put('scart', $scart);
      return redirect()->back();
    }

    public function destroyProduct($itemId)
    {
      $scart = session()->get('scart');

      if( isset($scart[$itemId]) ) {
        unset($scart[$itemId]);
        session()->put('scart', $scart);
      }

      session()->put('scart', $scart);
      session()->flash('message', 'Termék törölve');
      return redirect()->back();
    }

    public function destroyCart()
    {
      session()->forget('scart');
      return redirect()->back();
    }
}
