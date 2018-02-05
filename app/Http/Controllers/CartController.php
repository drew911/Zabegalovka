<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Dishes;
use App\Helpers\CartHelper;
use App\Http\Middleware\CheckCart;

class CartController extends Controller
{
  public function add(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($cart);
        $cart->add($dish, $dish->id);

        $request->session()->put('cart', $cart);
        return redirect('cart');
    }

    public function minus($id)
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($cart);
        $cart->reduce($id);

         if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect('cart');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $token = csrf_token();
      $carts = Cart::WHERE ('token', $token)->get();
      // $priceWithVat = $totalPrice * 1.21;
      return view('cart', [
          'carts' => $carts
      ]);

      // return view ('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $cart = new Cart;
      $cart->token = $request->_token;

      $cart->dish_id = $request->id;
      $cart->save();

      $dish = Dishes::where('id', $request->id)->first();

      $cart->price = $dish->price;

      echo json_encode($cart);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }
    public function show($_token)  // ar veiks????
    {
        // dd($_token)
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::findOrFail($id);
        $this->CartHelper->deleteFromCart($cart);
        return redirect()->route('cart');
    }
}
