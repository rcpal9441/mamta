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
                            <h3>Our Additional Item</h3>
                            <p>Dashboard / <a href="javascript:void()">Our Additional Item</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="{{route('toppings.create')}}"><button type="button" class=""><i class="fa fa-plus" aria-hidden="true"></i></button></a></div>
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
                                            <th>Name</th>
                                           <!--  <th>Image</th> -->
                                            <th width="280px">Description</th>
                                            <!--th>Size</th-->
                                            <th>Status</th>
                                            <th width="80px">Action</th>
                                        </tr>
                                        @foreach($toppings as $key => $topping)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$topping->name}}</td>
                                            <td></td>
                                            <td>
                                                @if($topping->status==1)
                                                <p class="btn btn-success  btn-sm">Active</p>
                                                @else
                                                <p class="btn btn-danger  btn-sm">In-Active</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('toppings.edit',$topping->id)}}"><button type="button" class=""><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                               <a href="{{route('toppings.delete',$topping->id)}}"><button type="button" class="del"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
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