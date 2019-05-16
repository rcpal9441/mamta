<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     
     protected $table = 'product';
     
     protected $fillable = [
        'name', 'description','sub_description'
    ];

    public function densities()
    {
        return $this->hasMany('App\ProductDensity', 'product_id');
    }
}
