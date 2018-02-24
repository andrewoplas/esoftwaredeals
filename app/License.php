<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable = [
      	'key',
      	'product_id',
    ];
}
