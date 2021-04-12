<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, ShopCart, Delivery, Product};

class OrderController extends Controller
{
    public function create(Request $request)
    {
      $scart = session()->get('scart');

      $delivery = Delivery::find($request->delivery_id);
      $scart['100'] = array(
         "id"     =>  $delivery->id,
         "name"   =>  $delivery->name,
         "price"  =>  $delivery->price,
         "qty"    =>  1,
         "sum"    =>  $delivery->price
      );

      session()->put('scart', $scart);
      return view('frontend.order.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name'    =>  'required|max:255',
        'email'   =>  'required|email',
        'phone'   =>  'required|max:15',
        'postal'  =>  'required|max:4',
        'city'    =>  'required|max:50',
        'street'  =>  'required|max:50',
        'house'   =>  'required|max:5'
      ]);

      session()->put('adress', $request->all());
      return redirect()->route('order.final.create');
    }

    public function finalCreate()
    {
      $sum = ShopCart::sum();
      return view('frontend.order.final_create')
        ->with('sum', $sum);
    }

    public function finalStore()
    {
      $order = New Order;
      $order->setData();
      $order->price = ShopCart::sum();
      $order->save();

      foreach( session('scart') as $id => $item ) {
        $shopcart = new ShopCart;
        $shopcart->order_id = $order->id;
        $shopcart->saveData($item);
        $shopcart->save();
        
        if( session('scart')[$id]['id'] != 1) {
          Product::find(session('scart')[$id]['id'])
            ->decrement('qty', session('scart')[$id]['qty']);
        }
      }

      session()->forget('scart');
      return redirect()->route('index');
    }

}
