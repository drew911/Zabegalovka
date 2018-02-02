<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  rotected $fillable = ['user_id','total_amount','tax_amount'];
  protected $table = 'orders';
}
