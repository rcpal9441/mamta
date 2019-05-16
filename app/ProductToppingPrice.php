<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToppingPrice extends Model
{
     
     protected $table = 'product_topping_price';
     
     protected $fillable = [
        'product_id', 'density_id','topping_id','topping_id','price'
    ];
}
