<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToppingPercentage extends Model
{
     
     protected $table = 'topping_percentage';
     
     protected $fillable = [
        'product_id', 'product_density_id','Foam_Only','Polycover','Quilting','Wool','Vinyle','Cotton','Silk_Fill','status'
    ];

    public static $rules = [
        'product_id' => 'required',
        'product_density_id' => 'required',
        'Foam_Only' => 'required',
        'Polycover' => 'required',
        'Quilting' => 'required',
        'Wool' => 'required',
        'Vinyle' => 'required',
        'Cotton' => 'required',
        'Silk_Fill' => 'required'
    ];
    public static $messages = [
        'name.required' => 'Name field is required!'
    ];

}
