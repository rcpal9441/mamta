<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId=$request->user_id;
        $title=$request->title;
        $query=Order::select('user_id','id','transaction_id','payment_method','amount','payment_status', 'created_at');
       if($userId){
        $query->where(['user_id'=>$userId]);
       }
       if($title){
        $query->where(function($q) use($title) {
           $q->where('payment_method','like',"%{$title}%");
           $q->orwhereHas('user', function ($q1) use($title){
                $q1->where('email','like',"%{$title}%");
                $q1->orwhere('name','like',"%{$title}%");
            });
         });
        
       }
       $data['orders']=$orders=$query->paginate(10);
       $data['perPage']=$orders->toArray();
       $data['users']=User::where(['status'=>'1'])->pluck('name','id')->prepend('--Select User--','');
       return view('orders.order',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query=OrderDetail::where(['order_id'=>$id]);
        $data['products']=$query->get();
        return view('orders.orderDetails',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
