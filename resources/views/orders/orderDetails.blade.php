@extends('layouts.adminBody')

@section('title','Order Details')

@section('body')

<div class="dashboard-wrapper dashboard-wrapper-lg">

        <!-- Container fluid Starts -->
        <div class="container-fluid">

            <!-- Top Bar Starts -->
            <div class="top-bar clearfix">
                <div class="row gutter">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="page-title">
                            <h3>Order Details</h3>
                            <p>Dashboard / <a href="javascript:void()">Order Details</a></p>
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
                        <div class="panel-body">
                            <div class="row gutter">
                                <div class="responsiveTbl">
                                    <table class="productTbl" width="100%">
                                        <tr>
                                            <th width="70px">S No.</th>
                                            <th>Product Name & Title</th>
                                            <th>Image</th>
                                            <th width="280px">Description</th>
                                            <th width="280px">Sub Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            
                                        </tr>

                                        @if($products ?? '')
                                         @php
                                          $i=1
                                         @endphp
                                        @foreach($products as $prod)
                                          @if($prod->type=='rv')
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><b>{{$prod->product->name}}</b> <span>({{$prod->product->title}})</span></td>
                                            <td>
                                                <figure>@php $image = $prod->product->image @endphp
                                                    <img src="{{url($image)}}" style="width:30px;" />
                                                    <!--img src="{{url('public/admin/images/other/rv.png')}}" style="width:30px;" />
                                                    <img src="{{url('public/admin/images/other/rv.png')}}" style="width:30px;" />
                                                    <span>+5</span-->
                                                </figure>
                                            </td>
                                            <td>{{$prod->product->description}}</td>
                                            <td>{{$prod->product->sub_description}}</td>
                                            <td>{{$prod->quantity}}</td>
                                            <td>${{$prod->price*$prod->quantity}}</td>
                                        </tr>
                                        @elseif($prod->type=='shape')
                                              @php
                                               $shapes=\Config::get('data.shapes');
                                               $shapeName='';
                                               $shapeImage='';
                                               @endphp
                                               @foreach($shapes as $shape)
                                                   @if($shape['slug']==$prod->shape_slug)
                                                     @php
                                                     $shapeName=$shape['name'];
                                                     $shapeImage=$shape['thumbnail'];
                                                     break;
                                                     @endphp
                                                   @endif
                                               @endforeach

                                       <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{$shapeName}}</td>
                                       <td>
                                                <figure>
                                                    <img src="{{url('public/assets/images/icon/'.$shapeImage)}}" style="width:30px;" />
                                                    <!--img src="{{url('public/admin/images/other/rv.png')}}" style="width:30px;" />
                                                    <img src="{{url('public/admin/images/other/rv.png')}}" style="width:30px;" />
                                                    <span>+5</span-->
                                                </figure>
                                            </td>
                                        <td>{{$prod->dimensions}}</td>
                                            <td>----</td>
                                            <td>{{$prod->quantity}}</td>
                                            <td>${{$prod->price*$prod->quantity}}</td>
                                       </tr>        

                                        @endif

                                        @endforeach
                                        @endif
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