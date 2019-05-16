<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDensity extends Model
{
     
     protected $table = 'product_densities';
     
     protected $fillable = [
        'name', 'description','status'
    ];
}
