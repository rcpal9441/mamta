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
                            <h3>Edit Product</h3>
                            <p>Dashboard / <a href="javascript:void()">Edit Product</a></p>
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
                        {{ Form::model($topping, ['route' => ['toppings.update', 'id'=> $topping->id], 'method' => 'post','enctype' => 'multipart/form-data']) }}
                        
                        
                        <div class="panel-body">
                            <div class="row gutter">
                                @csrf
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $topping->name ? $topping->name : old('name')  }}">
                                </div>
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                               <div class="form-group">
                                    <label class="control-label">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" value="{{ $topping->full_name}}">
                                </div>
                                @if($errors->has('full_name'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                               <div class="form-group">
                                    <label class="control-label">Description</label>
                                    <textarea rows="4" cols="50" name="description">{{ $topping->description}}</textarea>
                               </div>
                               @if($errors->has('description'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                <div class="clearfix"></div>

                                <div class="form-group">
                                    <label class="control-label">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" @if($topping->status==1) selected="selected" @endif>Active</option>
                                        <option value="0" @if($topping->status==0) selected="selected" @endif>In-Active</option>
                                    </select>
                                    </div>
                                </div>
                                </div>
                                @if($errors->has('status'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="btn3">Submit</button>
                                </div>                                  
                            </div>

                           
                        </div>
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