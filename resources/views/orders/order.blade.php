@extends('layouts.adminBody')

@section('title','Orders')

@section('body')

<div class="dashboard-wrapper dashboard-wrapper-lg">

        <!-- Container fluid Starts -->
        <div class="container-fluid">

            <!-- Top Bar Starts -->
            <div class="top-bar clearfix">
                <div class="row gutter">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="page-title">
                            <h3>Orders</h3>
                            <p>Dashboard / <a href="javascript:void()">Orders</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
                </div>
            </div>
            <!-- Top Bar Ends -->

            <!-- Row Starts -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel">
                        <form >
                          <input type="text"  name="title" value="{{Request::query('title')}}"> 
                        {!! Form :: select('user_id',$users,Request::query('user_id'),['class'=>"f"]) !!}
                        <input type="submit" class="" value="Submit"> 
                        </form>
                        <div class="panel-body">
                            <div class="row gutter">
                                <div class="responsiveTbl">
                                    <table class="productTbl" width="100%">
                                        <tr>
                                            <th width="70px">S No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Transaction Id</th>
                                            <th>Total Amount</th>
                                            <th>Payment Status</th>
                                            <th>Payment Type</th>
                                            <th width="80px">Action</th>
                                        </tr>

                                        @if($orders ?? '')
                                         @php
                                          $i=$perPage['from']
                                         @endphp
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>
                                                {{$order->user->email}}
                                            </td>
                                            <td>{{$order->transaction_id}}</td>
                                            <td>${{$order->amount}}</td>
                                            <!--td>22&#0176; W x 45&#0176; L x 3&#0176; D</td-->
                                            <td>{{$order->payment_status}}</td>
                                            <td>{{ucwords($order->payment_method)}}</td>
                                            <td>
                                                <div class="action">
                                                    <a href="{{route('orders.show',$order->id)}}">Order Details</a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </table>
                                </div>
                                <div class="pagination-section">
                            <nav aria-label="Page navigation example">
                                {{$orders->appends(Request::except('page'))->links()}}
                            </nav>
                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Ends -->



        </div>
        <!-- Container fluid ends -->

    </div>
    <!-- Dashboard Wrapper End -->

    @endsection