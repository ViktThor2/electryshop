<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\{Customer, Order};

class CommentHas
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {dd(Auth::guard('customer')->user()->orders());
    foreach (Auth::guard('customer')->user()->orders() as $order) {
      if($request->product_id == $order->products->id)
      {
        return $next($request);
      }
    }

    session()->flash('message', 'Csak megvásárolt termékhez írhatsz véleményt');
    return redirect()->route('product.show', $request->product_id);

  }
}
