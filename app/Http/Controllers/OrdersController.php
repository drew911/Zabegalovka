<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Cart;
use Auth;
// use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
      return view ('orders');
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // dd(Auth::user());
      $orders = Orders::all();
      // $orders = Auth::user()->orders;
      $orders->transform (function($order, $key){
        $order->cart = $order->cart;
        return $order;
      });
      return view ('orders',['orders' => $orders]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $orders = new Orders;
      $orders->token = $request->_token;
      $orders->user_id = $request->id;
      $orders->save();
      $user = User::where('id', $request->id)->first();
      $orders->totalPrice = $cart->totalPrice;
      return view ('orders');


      // $post = [
      //       'name' => $name,
      //       'description' => $description,
      //       'total_amount' => $totalPrice,
      //   ];
      //   // $post = $request->except('_token');
      //
      //   Order::create($post);
      //   return redirect()->route('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
    }
}
