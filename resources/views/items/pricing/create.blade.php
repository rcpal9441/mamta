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
                            <h3>Add Product Percentage</h3>
                            <p>Dashboard / <a href="javascript:void()">Add Product Percentage</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"></div>
                </div>
            </div>
            <!-- Top Bar Ends -->

            <!-- Row Starts -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 
               <!--  @if(Session::has('success'))

                <div class="alert alert-success">

                    {{ Session::get('success') }}

                    @php

                        Session::forget('success');

                    @endphp

                </div>

                @endif -->
<!-- 
                    @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div><br />
                @endif -->
                    <div class="panel">
                        
                           
                    {{ Form::open(['route' => 'pricing.store','enctype' => 'multipart/form-data', 'class'=>'form_validate']) }}
                       
                        
                        <div class="panel-body">
                            <div class="row gutter">
                                @csrf
                                
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Product</label>
                                        <select class="form-control" name="product_id" id="status" onchange="getDensity()">
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('product_id'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('product_id') }}</strong>
                                        </span>
                                    @endif
    								 
    								<div class="form-group">
                                        <label class="control-label">Form Only</label>
                                        <select class="form-control" name="product_density_id" id="product_density">
                                           <!--  @foreach($densities as $density)
                                            <option value="{{$density->id}}">{{$density->name}}</option>
                                            @endforeach -->
                                        </select>
                                    </div>
                                    @if($errors->has('product_density_id'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('product_density_id') }}</strong>
                                        </span>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label">Form only (%)</label>
                                        <input type="text" class="form-control" name="Foam_Only" value="" placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Foam_Only'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Foam_Only') }}</strong>
                                        </span>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label">Polycover (%)</label>
                                        <input type="text" class="form-control" name="Polycover" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Polycover'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Polycover') }}</strong>
                                        </span>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label">Quilting (%)</label>
                                        <input type="text" class="form-control" name="Quilting" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Quilting'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Quilting') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label">Wool (%)</label>
                                        <input type="text" class="form-control" name="Wool" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Wool'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Wool') }}</strong>
                                        </span>
                                    @endif
                                     <div class="form-group">
                                        <label class="control-label">Vinyle (%)</label>
                                        <input type="text" class="form-control" name="Vinyle" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Vinyle'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Vinyle') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label">Cotton (%)</label>
                                        <input type="text" class="form-control" name="Cotton" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Cotton'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Cotton') }}</strong>
                                        </span>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label">Silk Fill (%)</label>
                                        <input type="text" class="form-control" name="Silk_Fill" value=""placeholder="Please enter percentage">
                                    </div>
                                    @if($errors->has('Silk_Fill'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('Silk_Fill') }}</strong>
                                        </span>
                                    @endif

                                   
                                    <!-- <div class="form-group">
                                        <label class="control-label">Additional Item</label>
                                        <select class="form-control" name="status" id="status">
                                            @foreach($toppings as $topping)
                                            <option value="{{$topping->id}}">{{$topping->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> -->

                                    
                                </div>

                                <!-- <div class="col-md-4 form-group">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product ? $product->name : old('name')  }}">
                                </div> -->
                              
                                <!-- <div class="col-md-4 form-group">
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
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Type</label>
                                    {!! Form :: select('type',[''=>'--Select Type--','f'=>'Foam','mf'=>'Memory Foam','l'=>'Latex'],$product ? $product->type : '',['class'=>"form-control",'required'=>'required','id'=>'type']) !!}
                                    
                                </div>

                                 <div class="col-md-4 form-group">
                                    <label class="control-label">Product Price</label>
                                    <input type="text" class="form-control" required name="price" value="{{ $product ? $product->price : old('price')  }}">
                                </div> -->
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
								<!--
                                <div class="col-md-4 form-group">
                                    <label class="control-label">Product Image</label>
                                    <input type="file" name="image" accept="image/*" class="form-control imgUpload">
                                    @if($product ?? '')
                                    <br/><img src="{{url('')}}/{{$product->image}}" width="40px">
                                    @endif
                                </div>
                                <div class="clearfix"></div>
-->
                                <!-- <div class="col-md-4 form-group">
                                    <label class="control-label">Status</label>
                                    {!! Form :: select('status',[''=>'--Select Status--','1'=>'Active','0'=>'In Active'],$product ? $product->status : '',['class'=>"form-control",'required'=>'required','id'=>'status']) !!}
                                    
                                </div> -->

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
                         {!! Form::close() !!} 
                   
                    </div>
                </div>
            </div>
            <!-- Row Ends -->



        </div>
        <!-- Container fluid ends -->

    </div>
@endsection
@section('script')
<script type="text/javascript">
function getDensity(){
    var product_id = $('select[name="product_id"]').val(); 

    $.ajax({url: "http://localhost:8888/ecommerce/admin/get.product.density?product_id="+product_id, success: function(result){
        
        if(result.status){
            $('#product_density').empty();
            $.each(result.data, function(key, value) {  
                $('#product_density')
                    .append($("<option></option>")
                                .attr("value",value.id)
                                .text(value.name)); 
            });
        }

  }});
}
getDensity();


$(document).ready(function(){

        if($('.form_validate').length > 0)
        {
            $('.form_validate').formValidation({
                framework: 'bootstrap',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    Quilting: {
                        validators: {
                            notEmpty: {
                                message: "Enter Quilting"
                            }
                        }
                    }
               }
            });
        }
    });



</script>
@endsection
