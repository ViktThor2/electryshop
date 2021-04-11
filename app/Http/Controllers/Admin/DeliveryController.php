<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function index()
    {
      $deliveries = Delivery::all();
      return view('admin.order.delivery')
        ->with('deliveries', $deliveries);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name'  => 'required|max:255',
        'price' => 'required'
      ]);

      $delivery = new Delivery;
      $delivery->name  = $request->name;
      $delivery->price = $request->price;
      $delivery->save();

      return redirect()->route('admin.delivery.index');
    }
}
