<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{


  protected $fillable = ['name', 'description', 'price', 'image'];
  protected $table = 'dishes';


}
