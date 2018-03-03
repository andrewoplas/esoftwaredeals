<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
          'code',
          'type',
          'amount',
          'percent',
          'status',
          'start_datetime',
          'end_datetime',
    ];
}
