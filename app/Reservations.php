<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
  protected $fillable = ['name', 'user_id', 'phone','date', 'time', 'duration', 'guests'];
  protected $table = 'reservations';
}
