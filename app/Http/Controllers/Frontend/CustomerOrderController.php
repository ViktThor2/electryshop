<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, ShopCart};

class CustomerOrderController extends Controller
{
    public function myorders()
    {
      $customer = \Auth::guard('customer')->user();
      $customerOrders = Order::where(
          'customer_id', '=', $customer->id)->paginate('10');

      return view('frontend.customer.order.myorders')
          ->with('customerOrders', $customerOrders);
    }

    public function show($orderId)
    {
      $order = Order::findOrFail($orderId);
      $orderItem = ShopCart::where(
          'order_id', '=', $orderId)->get();

      return view('frontend.customer.order.show')
          ->with('order', $order)
          ->with('orderItem', $orderItem);
    }

}
