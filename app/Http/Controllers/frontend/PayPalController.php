<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paypal;
use App\Order;
use App\Cart;
use Auth;
use DB;
use App\OrderDetail;
use App\Http\Controllers\ApiController;
use Carbon\Carbon;

class PayPalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function form(Request $request, $service_id)
    {

        $service = Service::findOrFail($service_id);


       
        $order = new Order;
        $transaction_id = rand(10000000,99999999);
        $order->user_id = 1 ;  //user id
        $order->transaction_id = $transaction_id;
        $order->service_id    = $service->id;
        $order->amount    = $service->amount;
        $order->save();

        // the above order is just for example.
        return view('form', compact('service','transaction_id'));
    }

    /**
     * @param $order_id
     * @param Request $request
     */
    public function checkout(Request $request)
    {
            $carts=$this->calculateAmount();
            $paypal = new PayPal;

            $response = $paypal->purchase([
                'amount' => $paypal->formatAmount($carts->totalAmount+$carts->taxes),
                //'transactionId' => '87345hrehkf',
                'currency' => 'USD',
                'cancelUrl' => $paypal->getCancelUrl($carts),
                'returnUrl' => $paypal->getReturnUrl($carts),
            ]);

            if ($response->isRedirect()) {
                $response->redirect();
            }

            return redirect()->back()->with([
                 'message' => $response->getMessage(),
            ]);
    }

// Calculate Amount from cart and product table
    private function calculateAmount(){
        $userId=Auth::user()->id;
        $apiC=new ApiController;
        $carts = DB::table('carts as c')->join('products as p','p.id','=','c.product_id')->where('c.user_id', $userId)->where('c.type','rv')->select('p.id','p.price','c.quantity','c.user_id')->get();

        $shapeCarts=Cart::where('user_id', $userId)->where('type','shape')->get();
        $total=0;
        $gst=0;
        if(count($carts)){
           foreach($carts as $cart){
            $total +=$cart->price*$cart->quantity;
           }
        }

          if(count($shapeCarts)){
               foreach ($shapeCarts as $product) {
                   $dimension=explode('*',$product->dimensions);
                   $request['l']=$dimension[0];
                   $request['w']=$dimension[1];
                   $request['d']=$dimension[2];
                   $request['firm_ids']=$product->firm_id;
                   $request['oitem_ids']=$product->oitems_ids;
                   $price=$apiC->calculatePriceWithParams($request);
                   $price=json_decode(json_encode($price),true);
                   $priceData=$price['original']['data'];
                   $total+=$priceData['price']*$product->quantity;
                   $gst +=$priceData['gst'];
               }
           }
        $taxes=10+9;
        $carts->totalAmount=$total;
        $carts->user_id=$userId;
        $carts->taxes=$taxes+$gst;
        return $carts;
    }

    private function insertOrderDetail($id){
        $apiC=new ApiController;
        $userId=Auth::user()->id;
        $carts = DB::table('carts as c')->join('products as p','p.id','=','c.product_id')->where('c.user_id', $userId)->where('c.type','rv')->select('p.id','p.price','c.quantity','c.user_id')->get();

        $shapeCarts=Cart::where('user_id', $userId)->where('type','shape')->get();

        $datetime = Carbon::now();
        $currentTime=$datetime->toDateTimeString();

        if($shapeCarts){
          foreach($shapeCarts as $cart){

            $dimension=explode('*',$cart->dimensions);

       $request['l']=$dimension[0];
       $request['w']=$dimension[1];
       $request['d']=$dimension[2];
       $request['firm_ids']=$cart->firm_id;
       $request['oitem_ids']=$cart->oitems_ids;

       $price=$apiC->calculatePriceWithParams($request);
       $price=json_decode(json_encode($price),true);
       $priceData=$price['original']['data'];

            OrderDetail::insert([
            'order_id'=>$id,
            'price'=>$priceData['price'],
            'type'=>'shape',
            'shape_slug'=>$cart->shape_slug,
            'quantity'=>$cart->quantity,
            'shape_id'=>$cart->shape_id,
            'dimensions'=>$cart->dimensions,
            "oitems_ids" => $cart->oitems_ids,
            "firm_id" => $cart->firm_id,
            "category_id"=>$cart->category_id,
            'created_at'=>$currentTime,
            'updated_at'=>$currentTime
            ]);
           }

           Cart::where(['user_id'=>$userId,'type'=>'shape'])->delete();
        }

        if($carts){
          foreach($carts as $cart){
            OrderDetail::insert([
            'order_id'=>$id,
            'product_id'=>$cart->id,
            'price'=>$cart->price,
            'type'=>'rv',
            'quantity'=>$cart->quantity,
            'created_at'=>$currentTime,
            'updated_at'=>$currentTime
            ]);
           }

           Cart::where(['user_id'=>$userId,'type'=>'rv'])->delete();
        }
    }

    /**
     * @param $order_id
     * @param Request $request
     * @return mixed
     */
    public function completed(Request $request)
    {

        $carts=$this->calculateAmount();

        $paypal = new PayPal;

        $response = $paypal->complete([
            'amount' => $paypal->formatAmount($carts->totalAmount+$carts->taxes),
            //'transactionId' => '87345hrehkf',
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($carts),
            'returnUrl' => $paypal->getReturnUrl($carts),
            'notifyUrl' => $paypal->getNotifyUrl($carts),
        ]);

        //dd($response);

        if ($response->isSuccessful()) {
            $datetime = Carbon::now();
            $currentTime=$datetime->toDateTimeString();
            $id=Order::insertGetId([
                'transaction_id' => $response->getTransactionReference(),
                'payment_status' => Order::PAYMENT_COMPLETED,
                'user_id'=>$carts->user_id,
                'payment_method'=>'paypal',
                'amount'=>$carts->totalAmount,
                'taxes'=>$carts->taxes,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ]);
            //$id=$order->lastInsertId();

            $this->insertOrderDetail($id);

            return redirect()->route('paymentCompleted',encrypt($id))->with([
                'message' => 'You recent payment is sucessful with reference code ' . $response->getTransactionReference(),
            ]);
        }

        return redirect()->back()->with([
            'message' => $response->getMessage(),
        ]);

    }
    public function paymentCompleted($userId)
    {
        # code...
        return "Thanks! payment completed";
    }

    /**
     * @param $order_id
     */
    public function cancelled($orderId)
    {
        //$order = Order::findOrFail($order_id);
        return 'You have cancelled your recent PayPal payment !';
        return redirect()->route('paypal.checkout.cancelled', encrypt($orderId))->with([
            'message' => 'You have cancelled your recent PayPal payment !',
        ]);
    }

        /**
     * @param $order_id
     * @param $env
     * @param Request $request
     */
    public function webhook($userId, $env, Request $request)
    {
        // to do with new release of sudiptpa/paypal-ipn v3.0 (under development)
    }
}
