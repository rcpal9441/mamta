<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    function product()
    {
        return $this->belongsTo('App\Product')->select('image','name','description', 'title', 'sub_description');
    }
}
