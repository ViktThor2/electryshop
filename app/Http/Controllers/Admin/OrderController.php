<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, ShopCart};

class OrderController extends Controller
{
    public function index()
    {
      $orders = Order::paginate('20');
      return view('admin.order.index')
        ->with('orders', $orders);
    }
}
