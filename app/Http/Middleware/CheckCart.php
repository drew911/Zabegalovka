<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\View;
// use Illuminate\Eloquent\Collection;
use Closure;
use App\Cart;

class CheckCart
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

        // $carts = Carts::all();
        $token = csrf_token();
        $carts = Cart::WHERE ('token', $token)->get();
        // dd($carts);
        $cartSize = $carts->count();
        // dd($cartSize);
        // $totalPrice = Cart::WHERE('token', $token)->dishes()->SELECT (['price']);

        // $totalPrice = Cart::WHERE ('token', $token)->get();
        // dump($totalPrice);


        // $totalPrice = Cart::WHERE ('token', $token)->get('price');
        $totalPrice = 0;
        foreach ($carts as $cart) {
          // dd($cart->dishes->price);
          // dump($cart->id);
          $totalPrice = $cart->dishes->price + $totalPrice;
          // $totalPrice = $cart['price'] + $totalPrice;
          //cart modelyje aprasyti sarysi su dish id su cart'o dish id
          //is modelio pasiimam Cart::carts -> dish_id -> price
        }

        View::share('cartSize',$cartSize);
        View::share('totalPrice',$totalPrice);
        return $next($request);
    }
}
