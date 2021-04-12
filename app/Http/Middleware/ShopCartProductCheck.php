<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ShopCartProductCheck
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $productId = $request->route('itemId');
    $product = Product::find($productId);

    if ( $product->qty != 0 && $product->active == 1 ) {
      return $next($request);
    }

    session()->flash('message', 'Ez a termék nem elérhető');
    return redirect()->route('product.index');

  }
}
