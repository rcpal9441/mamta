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
                            <h3>Add RV Product</h3>
                            <p>Dashboard / <a href="javascript:void()">Add RV Product</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
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

                    @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif
                    <div class="panel">
                        @if($product)
                            {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch','enctype' => 'multipart/form-data']) }}
                        @else
                            {{ Form::open(['route' => 'products.store','enctype' => 'multipart/form-data']) }}
                        @endif
                        
                        <div class="panel-body">
                            <div class="row gutter">
                                @csrf
                                <!--div class="col-md-12 form-group">
                                    <div class="form-group no-margin">
                                        <label class="radio-inline">
                                            <input type="radio" >
                                            Foam
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Memory Foam
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Latex
                                        </label>
                                    </div>
                                </div-->
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product ? $product->name : old('name')  }}">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Title</label>
                                    <input type="text" class="form-control" required name="title" value="{{ $product ? $product->title : old('title') }}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Description</label>
                                    <textarea class="form-control" required name="description">{{$product ? $product->description :  old('description') }}</textarea>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Sub Description</label>
                                    <textarea class="form-control" required name="sub_description">{{$product ? $product->sub_description :  old('sub_description')  }}</textarea>
                                </div>
                                <!--div class="col-md-4 form-group">
                                    <label class="control-label">Type</label>
                                    {!! Form :: select('type',[''=>'--Select Type--','f'=>'Foam','mf'=>'Memory Foam','l'=>'Latex'],$product ? $product->type : '',['class'=>"form-control",'required'=>'required','id'=>'type']) !!}
                                    
                                </div-->

                                 <div class="col-md-4 form-group">
                                    <label class="control-label">Product Price</label>
                                    <input type="text" class="form-control" required name="price" value="{{ $product ? $product->price : old('price')  }}">
                                </div>
                                <!--div class="col-md-4 form-group">
                                    <div class="row gutter">
                                        <div class="col-md-4">
                                            <label class="control-label">Width</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Height</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Depth</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div-->
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Image</label>
                                    <input type="file" name="image" accept="image/*" class="form-control imgUpload">
                                    @if($product ?? '')
                                    <br/><img src="{{url('')}}/{{$product->image}}" width="40px">
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-md-4 form-group">
                                    <label class="control-label">Status</label>
                                    {!! Form :: select('status',[''=>'--Select Status--','1'=>'Active','0'=>'In Active'],$product ? $product->status : '',['class'=>"form-control",'required'=>'required','id'=>'status']) !!}
                                    
                                </div>

                                <!--div class="col-md-2">
                                    <label class="control-label">More Options:</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="form-group no-margin">
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Cover
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Dacron Wrap/Fill
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Foam Type
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio">
                                            Delivery
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="form-group no-margin">
                                        <label class="checkbox-inline">
                                            <input type="checkbox">
                                            Cover
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox">
                                            Dacron Wrap/Fill
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox">
                                            Foam Type
                                        </label>
                                    </div>
                                </div-->
                            </div>

                            <button type="submit" class="btn3">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- Row Ends -->



        </div>
        <!-- Container fluid ends -->

    </div>

    @endsection