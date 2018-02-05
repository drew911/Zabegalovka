<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Cart;
use Auth;
use App\Helpers\CartHelper;
// use App\Http\Controllers\Controller;

class OrdersController extends Controller

{

    protected $cartHelper;

    public function __construct(CartHelper $cartHelper) {
      $this->cartHelper = $cartHelper;
      // $this->view = $view;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {


      $user = Auth::user()->id;
      $orders = Orders::WHERE ('user_id', $user)->get();
      return view('orders', [
          'orders' => $orders
      ]);

  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$orders = Orders::all();
        //
        // $post = [
        //   'user_id' => $user_id,
        //   'total_amount' => $total_amount,
        //   'tax_amount' => $tax_amount
        // ]

        // $orders = Auth::user()->orders;

      // jei auth (true) - >  show order
      // $orders = Auth::user()->orders;
      //else go to route register user

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
    public function store()
    {



      if (Auth::check()) {

        $orders = new Orders;
        $orders->user_id = Auth::user()->id;
        //$orders->token = $request->_token;
        $orders->total_amount = $this->cartHelper->getTotal();
        $orders->tax_amount = $this->cartHelper->getVat();
        // dd($orders->tax_amount);
        $orders->save();

        // $user = User::where('id', $request->id)->first();
        return redirect()->route('orders');

      } else {
        return redirect()->route('login');
      }

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
