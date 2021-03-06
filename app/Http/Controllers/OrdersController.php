<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Cart;
use Auth;
use App\Helpers\CartHelper;

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


  // $orders = Orders::WHERE ('user_id', $userId)->WHERE ('total_amount', $totalOrderAmount)->get();
  // $totalOrderAmount = $orders->sum('total_amount');

    public function index()
    {


      $userId = Auth::user()->id;
      $orders = Orders::WHERE ('user_id', $userId)->get();

      // $token = csrf_token();
      // $orders = Cart::WHERE ('token', $token)->WHERE ('order_id', NULL)->get();
      $ordersSize = $orders->count();
      if ($ordersSize == 0){
        $ordersHeading = "You have no orders";
      } else if ($ordersSize == 1){
        $ordersHeading = "You have 1 order";
      } else {
        $ordersHeading = "You have " . $ordersSize . " orders";
      }
      // foreach ($orders as $order){
      //   $totalOrdersAmount = 0;
      //   $totalOrdersAmount = $totalOrdersAmount + $order->total_amount;
      // }

      $totalOrdersAmount = Orders::WHERE ('user_id', $userId)->sum('total_amount');

      return view('orders', [
          'orders' => $orders,
          'ordersSize' => $ordersSize,
          'ordersHeading' => $ordersHeading,
          'totalOrdersAmount' => $totalOrdersAmount
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

      // $orders->transform (function($order, $key){
      //   $order->cart = $order->cart;
      //   return $order;
      // });
      // return view ('orders',['orders' => $orders]);

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
        $orders->total_amount = $this->cartHelper->getTotal();
        $orders->tax_amount = $this->cartHelper->getVat();
        $orders->save();

        $token = csrf_token();
        $carts = Cart::WHERE ('token', $token)->get(); // atfiltruoti laukus pagal tokena
        foreach ($carts as $cart) {
          if ($cart->order_id == NULL) {
            $cart->order_id = $orders->id;
            $cart->save();
          }
        }


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
      $order=Orders::findOrFail($id);
      $order->delete();
      return redirect()->route('orders');
    }
}
