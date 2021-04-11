<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
      $customers = Customer::paginate('10');
      return view('admin.customer.index')
        ->with('customers', $customers);
    }
}
