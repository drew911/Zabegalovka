<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
// use Illuminate\Eloquent\Collection;
use Closure;
use App\Cart;
use App\Helpers\CartHelper;

class CheckCart
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */

  protected $cartHelper;

  public function __construct(CartHelper $cartHelper){
    $this->cartHelper = $cartHelper;
  }


  public function handle($request, Closure $next)
  {

    $cartSize = $this->cartHelper->getQuantity();
    $totalPrice = $this->cartHelper->getTotal();
    $vat = $this->cartHelper->getVat();
    $beforeTaxes = $this->cartHelper->getbeforeTaxes();

    View::share('cartSize',$cartSize);
    View::share('totalPrice',$totalPrice);
    View::share('vat',$vat);
    View::share('beforeTaxes',$beforeTaxes);


    return $next($request);
  }



}
