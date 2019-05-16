<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Cart;
use Auth;
use App\Http\Controllers\frontend\RvController;
use App\Http\Controllers\ApiController;

class CartController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('frontend.cart.index');
    }



    private function saveCartToUser($product)
    {
        $userId=Auth::user()->id;
        
        $cart=Cart::where(['product_id'=>$product->id,'user_id'=>$userId])->first();
        
        if(count($cart)){
            $cart->quantity=$cart->quantity+1;
            $cart->save();
        }else{
            $carts=new Cart;
            $carts->product_id=$product->id;
            $carts->user_id=$userId;
            $carts->type='rv';
            $carts->quantity=1;
            $carts->save();
        }
        
    }


   private function saveShapeCartToUser($request)
   {
        $userId=Auth::user()->id;
        //echo $request->shapeId;
        $cart=Cart::where(['shape_id'=>$request->shapeId,'user_id'=>$userId])->first();
        
        if(count($cart)){
            $cart->quantity=1;
            $cart->shape_id=$request->shapeId;
            $cart->type='shape';
            $cart->shape_slug=$request->slug;
            $cart->dimensions=$request->l.'*'.$request->w.'*'.$request->d;
            $cart->oitems_ids=$request->oitem_ids;
            $cart->firm_id=$request->firm_ids;
            $cart->category_id=$request->pid;
            $cart->save();
        }else{
            $carts=new Cart;
            $carts->product_id=0;
            $carts->shape_id=$request->shapeId;
            $carts->user_id=$userId;
            $carts->shape_slug=$request->slug;
            $carts->type='shape';
            $carts->quantity=1;
            $carts->dimensions=$request->l.'*'.$request->w.'*'.$request->d;
            $carts->oitems_ids=$request->oitem_ids;
            $carts->firm_id=$request->firm_ids;
            $carts->category_id=$request->pid;
            $carts->save();
        }
        
    }

    function addShapeToCart(Request $request)
    {  //dd($request);
       if(Auth::user()){
          $this->saveShapeCartToUser($request);
       }else{

       $shapeCart = session()->get('shapeCart');
       $apiC=new ApiController;
       $price=$apiC->calculatePrice($request);
       $price=json_decode(json_encode($price),true);
       $priceData=$price['original']['data'];
       $shapes=\Config::get('data.shapes');
       $shapeName='';
       $shapeImage='';
       foreach ($shapes as $shape) {
           if($shape['slug']==$request->slug){
             $shapeName=$shape['name'];
             $shapeImage=$shape['thumbnail'];
             break;
           }
       }

        // if cart is empty then this the first product
        // if(!$shapeCart[$request->shapeId]) {
           
            $shapeCart = [
                    $request->shapeId => [
                        "dimension" => $request->l.'*'.$request->w.'*'.$request->d,
                        "quantity" => 1,
                        "shapeName"=>$shapeName,
                        "image"=>$shapeImage,
                        'slug'=>$request->slug,
                        "type" => 'shape',
                        "price"=>$priceData['price'],
                        "gst"=>$priceData['gst'],
                        "totalPrice"=>$priceData['totalprice'],
                        "oitem_ids" => $request->oitem_ids,
                        "firm_id" => $request->firm_ids,
                        "category_id"=>$request->pid
                    ]
            ];
 
        
            session()->put('shapeCart', $shapeCart);
        }

            $response=['success'=>1];
            return response()->json($response);
        // }
    }

    /**
    *Add to cart method to add product into cart
    */

    public function addToCart(Request $request)
    {
        //session()->put('cart', '');
        //dd($request);
        $id=$request->id;
        $product = Products::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }

        if(Auth::user()){
            $this->saveCartToUser($product);
            $rv=new RvController; 
            $carts=$rv->getUserCarts();
            $total=0;
            $cartItem=0;
            foreach($carts as $detail)
            {
              $total += $detail['price'] * $detail['quantity'] ;
              $cartItem+=$detail['quantity'];
            }

            $view=view('frontend.cart.cart-items',['carts'=>$carts])->render();
            $taxes=9+10;

            $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
            return json_encode($response);
        }
 
        $cart = session()->get('cart');

 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "description" => $product->description,
                        "quantity" => 1,
                        "type" => 'rv',
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];
 
        
            session()->put('cart', $cart);
 
            session()->flash('success', 'Product added to cart successfully!');
        

            $total=0;
            $cartItem=0;
            foreach(session('cart') as $detail)
            {
              $total += $detail['price'] * $detail['quantity'] ;
              $cartItem+=$detail['quantity'];
            }

            $view=view('frontend.cart.cart-items',['carts'=>session('cart')])->render();
            $taxes=9+10;

            $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
            return json_encode($response);
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Product added to cart successfully!');

            $total=0;
            $cartItem=0;
            //print_r($data['carts']);die;
            foreach(session('cart') as $detail)
            {
              $total += $detail['price'] * $detail['quantity'];
              $cartItem+=$detail['quantity'];
            }

            $view=view('frontend.cart.cart-items',['carts'=>session('cart')])->render();
            $taxes=9+10;

            $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
            return json_encode($response);
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "description" => $product->description,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];
 
        session()->put('cart', $cart);
 
        session()->flash('success', 'Product added to cart successfully!');

        $total=0;
        $cartItem=0;
        foreach(session('cart') as $detail)
        {
          $total += $detail['price'] * $detail['quantity'] ;
          $cartItem+=$detail['quantity'];
        }

        $view=view('frontend.cart.cart-items',['carts'=>session('cart')])->render();
        $taxes=9+10;

        $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
        return json_encode($response);
    }

    public function checkout()
    {
        $carts=session('cart');
        $shapeCarts=session('shapeCart');
        if(Auth::user()){
            $rv=new RvController; 
            $carts=$rv->getUserCarts();
            $shapeCarts=$this->getUserShapeCarts();
        }
        $data['carts']=$carts;
        $data['shapeCarts']=$shapeCarts;
        return view('frontend.cart.checkout',$data);
    }

    private function getUserShapeCarts()
    {
      $result=Cart::where(['type'=>'shape','user_id'=>Auth::user()->id])->get();
      $carts=[];
      $shapeCart=[];
      $apiC=new ApiController;
      $shapes=\Config::get('data.shapes');
      foreach ($result as $product) {
       $shapeName='';
       $shapeImage='';
       foreach ($shapes as $shape) {
           if($shape['slug']==$product->shape_slug){
             $shapeName=$shape['name'];
             $shapeImage=$shape['thumbnail'];
             break;
           }
       } 
     $dimension=explode('*',$product->dimensions);

       $request['l']=$dimension[0];
       $request['w']=$dimension[1];
       $request['d']=$dimension[2];
       $request['firm_ids']=$product->firm_id;
       $request['oitem_ids']=$product->oitems_ids;

       $price=$apiC->calculatePriceWithParams($request);
       $price=json_decode(json_encode($price),true);
       $priceData=$price['original']['data'];

       //print_r($priceData);
              
        // if cart is empty then this the first product
        // if(!$shapeCart[$request->shapeId]) {
           
            $shapeCart = [
                    $product->shape_id => [
                        "dimension" => $product->dimensions,
                        "quantity" => 1,
                        "slug"=>$product->shape_slug,
                        "shapeName"=>$shapeName,
                        "image"=>$shapeImage,
                        "type" => 'shape',
                        "price"=>$priceData['price'],
                        "gst"=>$priceData['gst'],
                        "totalPrice"=>$priceData['totalprice'],
                        "oitem_ids" => $product->oitems_ids,
                        "firm_id" => $product->firm_id,
                        "category_id"=>$product->category_id
                    ]
            ];
       }
       return $shapeCart;
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity && !Auth::user()){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
            $carts=session('cart');
        }else{
            $cart=Cart::where(['product_id'=>$request->id,'user_id'=>Auth::user()->id])->first();
            $cart->quantity=$request->quantity;
            $cart->save();
            $rv=new RvController;    
            $carts=$rv->getUserCarts();
        }

        $total=0;
        $cartItem=0;
        foreach($carts as $detail)
        {
          $total += $detail['price'] * $detail['quantity'] ;
          $cartItem+=$detail['quantity'];
        }
        
        $view=view('frontend.cart.'.$request->page,['carts'=>$carts])->render();
        $taxes=9+10;

        $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
        return json_encode($response);
    }
 
    public function remove(Request $request)
    {
        if($request->id && !Auth::user()) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
            $carts=session('cart');
        }else{
            $cart=Cart::where(['product_id'=>$request->id,'user_id'=>Auth::user()->id])->delete();
            $rv=new RvController;    
            $carts=$rv->getUserCarts();
        }

        $total=0;
        $cartItem=0;
        foreach($carts as $detail)
        {
          $total += $detail['price'] * $detail['quantity'] ;
          $cartItem+=$detail['quantity'];
        }

        $view=view('frontend.cart.review-order-list',['carts'=>$carts])->render();
        $taxes=9+10;

        $response=['cartview'=>$view,'total'=>$total,'subtotal'=>$total+$taxes,'cartItem'=>$cartItem];
        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
