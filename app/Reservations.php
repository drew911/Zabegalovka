<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
  protected $fillable = ['name', 'phone','date', 'time', 'duration', 'guests'];
  protected $table = 'reservations';
}
