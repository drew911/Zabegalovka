<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  protected $fillable = ['user_id','total_amount','tax_amount'];

  protected $table = 'orders';

  public function carts(){
    return $this->hasMany('App\Cart', 'order_id');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
