<?php

namespace App;

// use App\Dishes;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\CartHelper;

class Cart extends Model
{

  protected $fillable = ['count'];
  protected $table = 'carts';

  public function dishes(){
    return $this->belongsTo('App\Dishes', 'dish_id');
    // $dishes = App\Cart::find(1)->dishes;
    // foreach ($dishes as $dish){
    // }

    // return $this->hasMany('App\Dishes', 'dish_id', 'id');
  }

  //Dishes -> id = Carts -> dish_id


  // public $items = null;
  // public $totalQuantity = 0;
  // public $totalPrice = 0;

  // public function __construct($otherCart)
  // {
  //   if ($otherCart) {
  //     $this->items = $otherCart->items;
  //     $this->$totalQuantity = $otherCart->$totalQuantity;
  //     $this->totalPrice = $otherCart->totalPrice;
  //   }
  // }

  // public function getPrice()
  // {
  //   return $this->nettprice * 1.21;
  // }
  //
  // public function add($item, $id)
  // {
  //   $storedItem = ['quantity' => 0, 'price' => $item->getPrice(), 'item' => $item];
  //   if ($this->items) {
  //     if (array_key_exists($id, $this->items)) {
  //       $storedItem = $this->items[$id];
  //     }
  //   }
  //   $storedItem['quantity']++;
  //   $storedItem['price'] = $item->getPrice() * $storedItem['quantity'];
  //   $this->items[$id] = $storedItem;
  //   $this->$totalQuantity++;
  //   $this->totalPrice += $item->getPrice();
  // }
  //
  // public function minus($id)
  // {
  //   $this->items[$id]['quantity']--;
  //   $this->items[$id]['price'] -= $this->items[$id]['item']->getPrice();
  //   $this->$totalQuantity--;
  //   $this->totalPrice =$this->items[$id]['item']->getPrice() * $this->$totalQuantity;
  //
  //   if ($this->items[$id]['quantity'] <= 0) {
  //     unset($this->items[$id]);
  //   }
  // }
  //
  // public function removeItem($id)
  // {
  //   $this->$totalQuantity -= $this->items[$id]['quantity'];
  //   $this->totalPrice -=$this->items[$id]['price'];
  //   unset($this->items[$id]);
  // }
  //



}
