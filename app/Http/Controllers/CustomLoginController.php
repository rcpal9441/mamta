<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cart;
use App\Http\Controllers\frontend\RvController;

class CustomLoginController extends Controller
{
    public function login(Request $request) {
        $authenticate=[
            'email' => $request->get('email'),
            'password' => $request->get('password') 
        ];
        if (Auth::attempt($authenticate)) {
            session (['email' => $request->get ('email')]);
            $cart=session('cart');
            
            if($cart){
                $this->saveSessionCartToUser();
            }

            $shapeCart=session('shapeCart');
            
            if($shapeCart){
                $this->saveSessionShapeCartToUser();
            }

        $rv=new RvController;    
        $carts=$rv->getUserCarts();

        $total=0;
        $cartItem=0;
        foreach($carts as $detail)
        {
          $total += $detail['price'] * $detail['quantity'] ;
          $cartItem+=$detail['quantity'];
        }
        
        $view=view('frontend.cart.review-order-list',['carts'=>$carts])->render();
        $taxes=9+10;

        $response=['success'=>'1','cartview'=>$view,'total'=>$total,
        'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
        }else{
            $response=['success'=>'0','msg'=>'Invalid Credentials , Please try again.'];
        }
        return json_encode($response);
    }

    private function saveSessionCartToUser()
    {
        $userId=Auth::user()->id;
        
        foreach(session('cart') as $id => $details){
            $cart=Cart::where(['product_id'=>$id,'user_id'=>$userId])->first();
            
            if(count($cart)){
                $cart->quantity=$cart->quantity+1;
                $cart->save();
            }else{
                $carts=new Cart;
                $carts->product_id=$id;
                $carts->user_id=$userId;
                $carts->quantity=$details['quantity'];
                $carts->save();
            }
        }

        session()->put('cart', '');
    }

    private function saveSessionShapeCartToUser()
    {
        $userId=Auth::user()->id;
        //print_r(session('shapeCart'));die;
        foreach(session('shapeCart') as $id => $details){
            $carts=Cart::where(['shape_id'=>$id,'user_id'=>$userId])->first();
        
        if(count($carts)){
            $carts->quantity=1;
            $carts->shape_id=$id;
            $carts->type='shape';
            $carts->dimensions=$details['dimension'];
            $carts->oitems_ids=$details['oitem_ids'];
            $carts->firm_id=$details['firm_id'];
            $carts->category_id=$details['category_id'];
            $carts->save();
        }else{
            $carts=new Cart;
            $carts->product_id=0;
            $carts->shape_id=$id;
            $carts->user_id=$userId;
            $carts->type='shape';
            $carts->quantity=1;
            $carts->dimensions=$details['dimension'];
            $carts->oitems_ids=$details['oitem_ids'];
            $carts->firm_id=$details['firm_id'];
            $carts->category_id=$details['category_id'];
            $carts->save();
        }
        }

        session()->put('shapeCart', '');
    }
}
