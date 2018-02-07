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
    $carts = Cart::WHERE ('token', $token)->WHERE ('order_id', NULL)->get();
    $cartSize = $carts->count();
    return $cartSize;
  }


  public function getTotal(){
    $token = csrf_token();
    $carts = Cart::WHERE ('token', $token)->WHERE ('order_id', NULL)->get();
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

  public function add($item, $id)
     {
         $storedItem = ['quantity' => 0, 'price' => $item->getbeforeTaxes(), 'item' => $item];
         if ($this->items) {
             if (array_key_exists($id, $this->items)) {
                 $storedItem = $this->items[$id];
             }
         }
         $storedItem['quantity']++;
         $storedItem['price'] = $item->getBeforeTaxes() * $storedItem['quantity'];
         $this->items[$id] = $storedItem;
         $this->$cartSize++;
         $this->totalPrice += $item->getBeforeTaxes();
     }


     public function minus($id)
     {
         $this->items[$id]['quantity']--;
         $this->items[$id]['price'] -= $this->items[$id]['item']->getBeforeTaxes();
         $this->$cartSize--;
         $this->totalPrice =$this->items[$id]['item']->getBeforeTaxes() * $this->$cartSize;

         if ($this->items[$id]['quantity'] <= 0) {
             unset($this->items[$id]);
         }
     }

    
}
