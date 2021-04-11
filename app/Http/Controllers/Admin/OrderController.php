<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ShopCart;

class OrderController extends Controller
{
    public function index()
    {
      $orders = Order::paginate('10');
      return view('admin.order.index')
        ->with('orders', $orders);
    }
}
