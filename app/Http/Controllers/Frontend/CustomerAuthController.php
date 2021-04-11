<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function create()
    {
      return view('frontend.customer.login');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'email'     =>  'required|email',
        'password'  =>  'required'
      ]);

      $data = $request->only('email', 'password');
      \Auth::guard('customer')->attempt($data);
      $customer = \Auth::guard('customer')->user();

      if( \Auth::guard('customer')->check() ) {
        return redirect()->route('index');
      } else {
        session()->flash(
          'message', 'Hibás email cím vagy jelszó');
        return redirect()->back();
      }

    }

    public function destroy()
    {
      \Auth::guard('customer')->logout();
      return redirect()->route('index');
  }

}
