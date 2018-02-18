<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
          'code',
          'product_name',
          'description',
          'availability',
          'quantity',
          'sale_price',
          'price',
          'slug',
          'image',
          'category',
     ];
}
