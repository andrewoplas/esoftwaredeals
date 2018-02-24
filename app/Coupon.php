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
          'is_enabled',
          'start_datetime',
          'end_datetime',
    ];
}
