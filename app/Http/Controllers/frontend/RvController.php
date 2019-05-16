<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Auth;
use App\Cart;
use DB;

class RvController extends Controller
{
    function index()
    {
    	if(Auth::user()){
          $carts=$this->getUserCarts();
    	}else{
          $carts=session('cart');
    	}
    	$data['carts']=$carts;
    	$data['rvList']=Products::where(['status'=>'1'])->paginate(6);
    	return view('frontend.rv.rvlist',$data);
    }

    public function getUserCarts()
    {
       $userId=Auth::user()->id;
       $query=DB::table('carts as c')->join('products as p', 'p.id', '=', 'c.product_id');
       $result=$query->where(['c.user_id'=>$userId,'c.type'=>'rv'])->select('c.product_id','p.price','p.image','p.name','p.description', 'c.id', 'c.quantity')->get();

       $carts=[];
       foreach ($result as $product) {
       	$carts[$product->product_id]=[
                        "name" => $product->name,
                        "description" => $product->description,
                        "quantity" => $product->quantity,
                        "price" => $product->price,
                        "image" => $product->image
                    ];
       }
       return $carts;
    }
}
