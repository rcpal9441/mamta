@extends('layouts.frontBody')
 @section('title','RV Products')
   @section('body')
    <section class="search-wraper bg-gray">
        <div class="custom-breadcrb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="text-orange">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="rv-list.html" class="text-orange">RV Cushions</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="search-result-column">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9 ord1-mobile">
                        <div class="top-panel d-flex align-items-center" id="filterMain">
                            
                            <div class="short-by d-flex align-items-center justify-content-between w-100">

                                <button id="btn-filter" class="form-control button-filter d-flex align-items-center justify-content-between">
                                    <span>Filter</span> 
                                    <i class="fa fa-filter"></i>
                                </button>
                                
                                <span class="showing-items text-gray font-14">Showing 1-8 out of 1000 items</span>
                                <div class="form-group h-40 d-flex align-items-center pr-0">
                                    
                                    <span class="sorbyLabel">Sort By</span>
                                    <select class="form-control z-99" id="exampleFormControlSelect1">
                                        <option>Popular</option>
                                        <option>Price High To Low</option>
                                        <option>Price Low To High</option>
                                        <option>Newest First</option>
                                    </select>
                                </div>
                            </div>
                           
                            <!-- filter options start -->
                            <div class="dropdown-menu-option">
                                <div class="row justify-content-between">
                                    <div class="col-filter-1">
                                        <h4>By Size</h4>
                                        <div class="checkbx-wrap customScrollBar">
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Single
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                            
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Single Xl
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                            
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Double
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" checked name="options" id="" autocomplete="">Double XL
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                            
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" checked name="options" id="" autocomplete="">Queen
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" checked name="options" id="" autocomplete="">King
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                           
                                        </div>
                            
                            
                            
                                    </div>
                                    <div class="col-filter-2">
                                        <h4>By Use</h4>
                                        <div class="checkbx-wrap d-flex customScrollBar">
                                            <section>
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">RV
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">Guitar
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">MotorCycle
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Couch
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Chair
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Bar Stool
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </section>
                                            <section class="ml-5">
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">RV
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">Guitar
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" name="options" id="" autocomplete="">MotorCycle
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Couch
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Chair
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <label class=" custom-check">
                                                        <input type="checkbox" checked name="options" id="" autocomplete="">Bar Stool
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </section>
                                    
                                        </div>
                                    
                                    
                                    
                                    </div>
                                    <div class="col-filter-3">
                                        <h4>Foam Type</h4>
                                        <div class="checkbx-wrap customScrollBar">
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">polyurethane
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Memory
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Latex
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                    
                                        </div>
                                    
                                    
                                    
                                    </div>
                                    <div class="col-filter-4">
                                        <h4>Discount</h4>
                                        <div class="checkbx-wrap customScrollBar">
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">Less than 10%
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                    
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">10% or more
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                    
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">20% or more
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">30% or more
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                    
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">40% or more
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                    
                                            <div class="form-group ">
                                                <label class=" custom-check">
                                                    <input type="checkbox" name="options" id="" autocomplete="">50% or more
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                    
                                        </div>
                                    
                                    
                                    
                                    </div>
                                </div>
                            </div>
                            <!-- filter options start -->
                        </div>
                        <div class="row test">
                            @foreach($rvList as $rlist)
                            <div class="col-sm-6 col-lg-4 mb-30 grid-view">
                                <div class="item-box">
                                    <div class="item-img item-img-rv">
                                     <img src="{{url($rlist->image)}}" alt="rv-cushion" />
                                     <!-- <img src="assets/images/big-icon/rv-cushion-with-cover.png" class="d-none" alt="rv-cushion-with-cover" /> -->
                                        <!-- when hover on second bullet, please toggle "d-none" class ^ on above img element -->
                                    </div>
                                    <div class="bullets d-flex justify-content-center">
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="RV Foam"></a>
                                        <a href="#" data-toggle="tooltip" title="" data-original-title="RV Foam with Cover"></a>
                                    </div>
                                    <div class="item-description">
                                        <div class="title-section">
                                            <h3 class="item-name para-1">{{$rlist->name}}</h3>
                                            <!-- <p class="item-configr">22°W x 45° L x 3° D</p> -->
                                        </div>
                                        <div class="main-description">
                                            <h3 class="para-1">{{$rlist->description}}</h3>
                                            <p>{{$rlist->sub_description}}</p>
                                        </div>
                                    </div>
                                    <div class="boxadd-cart d-flex align-items-center">
                                        <h3 class="price"> ${{$rlist->price}}</h3>
                                        <button class="btn btn-01" onclick="commn.addToCart({{$rlist->id}});">add to cart</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach                            
                            
                            @csrf
                           
                        </div>


                        <div class="pagination-section">
                            <nav aria-label="Page navigation example">
                                {{$rvList->links()}}
                                <!-- <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fa fa-caret-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul> -->
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="chekc-out-box checkoutbox-list-pages">
                            <div class="cover-total title-section d-flex">
                                <h3>Covers</h3>
                                <h3 class="ml-auto" id="covers"></h3>
                            </div>
                            <div class="mt-3 mb-4">
                                  <a href="{{url('checkout')}}" class="btn btn-01 w-100" id="checkout">Checkout</a>
                            </div>
                            <hr>
                            <div class="addedItemsScroller customScrollBar" id="addCartItems">
                                @php 
                                 $i=1;
                                 $total=0;
                                 @endphp 
                                @if($carts)

                                 @foreach($carts as $id => $details)
                                   @php 
                                    $total += $details['price'] * $details['quantity'] 
                                    @endphp
                                <div class="item-added">
                                    <div class="p-15 d-flex">

                                        <h3 class="font-12 position-relative">
                                            <span class="item-number">{{$i++}}</span>{{$details['name'] }}</h3>
                                        <div class="ml-auto">
                                            <form method="post" action="">
                                                <div class="input-group plus-minus-input">
                                                    <input class="input-group-field" type="number" onchange="commn.updateCart({{$id}},this,'cart-items');"  name="quantity" value="{{ $details['quantity'] }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="p-15">
                                        <ul class="list-01">
                                            <li> </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                @endif
                            </div>
                            <hr>
                            <div class="cover-total title-section ">
                                <h3 class="font-16 mb-2">Deliver to</h3>
                                <div class="form-group fix-width delivery clr-after  p-0 pb-2">
                                    <input class="pt-0" type="text" value=" M3C 0C1 " onfocus="this.placeholder = ''" onblur="this.placeholder = 'M3C 0C1'">
                                    <a href="#" class="chake-locat text-orange"> Change</a>
                                </div>
                            </div>
                            <div class="cover-total subtotal  d-flex">
                                <h3>Subtotal</h3>
                                <h3 class="ml-auto" id="subtotal">${{$total}}</h3>
                            </div>
                            <div class="cover-total subtotal  d-flex">
                                <h3>+5% GST</h3>
                                <h3 class="ml-auto">$9</h3>
                            </div>
                            <div class="cover-total subtotal  d-flex">
                                <h3>+7% GST</h3>
                                <h3 class="ml-auto">$10</h3>
                            </div>
                            <hr>
                            <div class="cover-total total d-flex align-items-center justify-content-between total mb-0 pb-0">
                                <h5 class="mb-0">Total</h5>
                                <h2 class="mb-0" id="total">${{$total+9+10}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @endsection