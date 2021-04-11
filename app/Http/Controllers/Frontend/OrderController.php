<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ShopCart;

class OrderController extends Controller
{
    public function create()
    {
      $scart = session()->get('scart');
      $sum = 0;
      if(isset($scart)){
        foreach ($scart as $id => $value) {
          $sum += $value['sum'];
        }
      }
      return view('frontend.order.create')
          ->with('sum', $sum);
    }

    public function store(Request $request)
    {
      $order = new Order;
      $this->validate($request, [
        'name'    =>  'required|max:255',
        'email'   =>  'required|email',
        'phone'   =>  'required|max:15',
        'postal'  =>  'required|max:4',
        'city'    =>  'required|max:50',
        'street'  =>  'required|max:50',
        'house'   =>  'required|max:5'
      ]);

      $order->setData($request->all());
      $order->save();

      return redirect()->route('order.final.create', $order->id);
    }

    public function finalCreate($orderId)
    {
      $order = Order::find($orderId);
      return view('frontend.order.final_create')
        ->with('order', $order);
    }

    public function finalStore($orderId)
    {
      foreach( session('scart') as $id => $item ) {
        $shopcart = new ShopCart;
        $shopcart->order_id = $orderId;
        $shopcart->saveData($item);
        $shopcart->save();
      }
      session()->forget('scart');

      return redirect()->route('index');
    }

}
