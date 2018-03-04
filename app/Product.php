<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
          'product_name',
          'description',
          'sale_price',
          'price',
          'slug',
          'image',
          'category',
     ];
}
