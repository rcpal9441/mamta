<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
     protected $fillable = [
        'name', 'full_name', 'description',
    ];

    public static $rules = [
        'name' => 'required',
        'status' => 'required'
    ];
    public static $messages = [
        'name.required' => 'Name field is required!',
        'status.required' => 'Status is required!'
    ];

    public function updateTopping($data){
    	$productObj = Topping::where('id',$data['id'])->update($data);
    	return $productObj;
    }

    public function createTopping($data){
    	$productObj = Topping::create($data);
    	return $productObj;
    }

}
