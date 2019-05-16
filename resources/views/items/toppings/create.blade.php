@extends('layouts.adminBody')

@section('body')
<div class="dashboard-wrapper dashboard-wrapper-lg">
    <!-- Container fluid Starts -->
    <div class="container-fluid">
         <div class="top-bar clearfix">
            <div class="row gutter">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="page-title">
                        <h3>Add Product</h3>
                        <p>Dashboard / <a href="javascript:void()">Add Product</a></p>
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
                {!! Form::open(array('route' => 'toppings.store', 'method' => 'POST', 'role' => 'form')) !!}
                
                
                <div class="panel-body">
                    <div class="row gutter">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : ''  }}">
                            </div>
                            @if($errors->has('name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                           <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" value="{{ old('name') ? old('name') : ''  }}">
                            </div>
                            @if($errors->has('full_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </span>
                            @endif
                           <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea rows="4" cols="50" name="description">{{ old('name') ? old('name') : ''  }}</textarea>
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
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
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
                    {!! Form::close() !!}                              
                </div>
            </div>
         </div>
     </div>
            <!-- Row Ends -->
</div>
        <!-- Container fluid ends -->
@endsection