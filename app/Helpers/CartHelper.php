<?php
namespace App\Helpers;
use App\Http\Middleware\CheckCart;
use App\Cart;


class CartHelper
{

  // public $items = null;
  // public $cartSize = 0;
  // public $totalPrice = 0;

  public function getQuantity(){
    $token = csrf_token();
    $carts = Cart::WHERE ('token', $token)->get();
    $cartSize = $carts->count();
    return $cartSize;
  }


  public function getTotal(){
    $token = csrf_token();
    $carts = Cart::WHERE ('token', $token)->get();
    $totalPrice = 0;
    foreach ($carts as $cart) {
      $totalPrice = $cart->dishes->price + $totalPrice;
    }
    return $totalPrice;
  }


  public function getVat(){
    $token = csrf_token();
    $carts = Cart::WHERE ('token', $token)->get();
    $vat = $this->getTotal() / 121 * 21;
    // return $this->getTotal() / 121 * 21;
    return $vat;
  }


  public function getbeforeTaxes(){
    $token = csrf_token();
    $carts = Cart::WHERE ('token', $token)->get();
    $beforeTaxes = $this->getTotal() - $this->getVat();
    // return $this->getTotal() - $this->getVat();
    return $beforeTaxes;
  }

}
