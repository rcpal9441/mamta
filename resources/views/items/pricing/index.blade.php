@extends('layouts.adminBody')

@section('body')

<div class="dashboard-wrapper dashboard-wrapper-lg">

        <!-- Container fluid Starts -->
        <div class="container-fluid">

            <!-- Top Bar Starts -->
            <div class="top-bar clearfix">
                <div class="row gutter">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="page-title">
                            <h3>Our Price</h3>
                            <p>Dashboard / <a href="javascript:void()">Our Products Price</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="{{route('pricing.create')}}"><button type="button" class=""><i class="fa fa-plus" aria-hidden="true"></i></button></a></div>
                </div>
            </div>
            <!-- Top Bar Ends -->

            <!-- Row Starts -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    <div class="panel">
                        <div class="panel-body">
                            <div class="row gutter">
                                <div class="responsiveTbl">
                                    <table class="productTbl" width="100%">
                                        <tr>
                                            <th width="70px">S No.</th>
                                            <th>Product Name</th>
                                            <th>Density</th>
                                            <th>Foam Only</th>
                                             <th>Polycover</th>
                                           <th>Quilting</th>
                                           <th>Wool</th>
                                            <th>Vinyle</th>
                                             <th>Cotton</th>
                                            <th>Silk Fill</th>
                                            <th width="80px">Action</th>
                                        </tr>
                                        @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{$product->density_name}}</td>
                                            <td>{{$product->Foam_Only}}</td>
                                            <td>{{$product->Polycover}}</td>
                                            <td>{{$product->Quilting}}</td>
                                            <td>{{$product->Wool}}</td>
                                            <td>{{$product->Vinyle}}</td>
                                            <td>{{$product->Cotton}}</td>
                                            <td>{{$product->Silk_Fill}}</td>

                                            




                                            <td>
                                                <a href="{{route('pricing.edit',$product->id)}}"><button type="button" class=""><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                <a href="{{route('pricing.delete',$product->id)}}"><button type="button" class="del"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
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