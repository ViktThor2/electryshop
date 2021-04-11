<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
      $customer = new Customer;
      return view('frontend.customer.create')
        ->with('customer', $customer);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name'  =>  'required|max:255',
        'email' =>  'required|email|unique:customers,email',
        'password'  => 'required|confirmed',
        'phone'   =>  'required|max:15',
        'postal'  =>  'required|max:4',
        'city'    =>  'required|max:50',
        'house'   =>  'required|max:5'
      ]);
      $customer = new Customer;
      $customer->setAttributes($request->all());
      $customer->save();

      session()->flash('message', 'Sikeres Regisztráció');
      return redirect()->route('customer.auth.create');
    }

    public function edit($customerId)
    {
      $customer = Customer::findOrFail($customerId);
      return view('frontend.customer.account')
        ->with('customer', $customer);
    }

    public function update(Request $request, $customerId)
    {
      $customer = Customer::findOrFail($customerId);
      $customer->setAttributes($request->all());
      $customer->save();

      session()->flash('message', 'Adatok frissítve');
      return redirect()->back();
    }

    public function account()
    {
      return view('customer.account');
    }

}
