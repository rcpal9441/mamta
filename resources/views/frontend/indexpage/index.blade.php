<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('public/front/images/favicon.ico')}}" type="image/x-icon">
    <title>Make My Foam</title>
    <link href="{{url('public/front/css/global.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/front/css/nice-select.css')}}">

    <script src="{{url('public/front/js/jquery.nice-select.min.js')}}"></script>
    <style type="text/css">
        .dropdownmenuoption {
            box-shadow: 0 0 20px 0 #797979;
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            /* z-index: 99; */
            border-radius: 0 0 5px 5px;
            margin-top: 56px;
            /*position: absolute;*/
        /*top: 100%;*/
        /*width: 100%;
        background-color: #fff;
        box-shadow: 0 0 */0 1px rgba(68, 68, 68, 0.11);
        /*padding: 20px 30px;
        height: auto;
        z-index: 9;
        right: auto;
        left: 0;*/
        }
        .checkbox-cover .custom-check {
            display: inline-block;
            padding-right: 5px;
            text-align: left;
            float: left;
        }
    </style>
</head>

<body class="home">

   @include('includes.header')
    <!-- <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>
 -->




    <!-- HEADER END -->
    <section class="banner">
        <div class="banner-cnt">
            <h1 class="heading-01">all things foam
                <span>Quick & Easy</span>
            </h1>
        </div>
        <div class="make-my-form">
            <div class="toggle-btns">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach($data['featured_products'] as $key => $featured_product)
                    <label class="btn btn-secondary @if($key==0) active @endif">

                        <input type="radio" name="product_id" value="{{$featured_product->id}}" id="option1_{{$featured_product->name}}" onchange="removeItemsbanner()" autocomplete="off" @if($key==0) checked @endif> {{$featured_product->name}}
                    </label>
                    @endforeach
                    <!-- <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Memory Foam
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Latex
                    </label> -->
                </div>
            </div>
            <form class="" action="">
            <div class="main-form d-flex flex-column" id="top-fixed">
                <button onclick="openNav()" class="navbar-toggler d-none" type="button" data-toggle="collapse"
                    data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <img src="{{url('public/front/images/bars.png')}}">
                </button>
              <section class="d-flex headerCentered">
                    <div class="form-group fix-width lable-top hometext">
                        <input type="text" tabindex="1" name="width" class="inputText" required/>
                        <label for="Width" class="floating-label">Width</label>
                        <select class="form-control" name="width_par" id="exampleFormControlSelect1">
                            <option value="in">in</option>
                            <option value="cm">cm </option>
                            <option value="mm">mm </option>
                            <option value="ft">ft </option>
                            <option value="m">m</option>
                        </select>
                    </div>
                    <div class="form-group fix-width lable-top hometext">
                        <input type="text" tabindex="2" name="length" class="inputText" required/>
                        <label for="Length" class="floating-label">Length</label>
                        <select class="form-control" name="length_par" id="exampleFormControlSelect1">
                            <option value="in">in</option>
                            <option value="cm">cm </option>
                            <option value="mm">mm </option>
                            <option value="ft">ft </option>
                            <option value="m">m</option>
                        </select>
                    </div>
                    <div class="form-group fix-width lable-top hometext">
                        <div>
                            <input type="text" tabindex="3" name="depth" class="inputText" required/>
                            <label class="floating-label">Depth</label>
                            <select class="form-control" name="depth_par" id="exampleFormControlSelect1">
                                <option value="in">in</option>
                                <option value="cm">cm </option>
                                <option value="mm">mm </option>
                                <option value="ft">ft </option>
                                <option value="m">m</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group large-menu">
                        <div class="dropdown-main">
                            <a href="javascript:void(0)" onclick="showtoppings()">More Options</a>
                        
                        </div>

                    </div>

                    <div class="form-group submit-menu">
                        <button tabindex="4" id="search_button" class="btn btn-search  btn-01">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <div class="form-group submit-menu d-none">
                        <div class=" button-action dropdown">
                            

                            <button class="btn-user dropdown-toggle" type="button" id="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="">
                                <a class="dropdown-item" href="#">
                                    <i class="far fa-user"></i>Your Account</a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-shopping-bag"></i>Your Orders </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-heart"></i>Shortlist</a>
                                <div class="btn-inline d-flex flex-column">
                                    <button class="   btn-link" data-toggle="modal" data-target="#exampleModalCenter1">Register </button>
                                    <button class="btn-01 btn dropdown-login" data-toggle="modal" data-target="#exampleModalCenter">Log In</button>
                                </div>
                            </div>
                        </div>
                        <a href="cart.html" class="cart-mobile mr-0">
                            <span class="item-count">2</span>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>

                    <!-- <div class="dropdown-menu-option" id="product_density">
                        
                        
                    </div> -->


                    </div>



                    
                </section>
                
            </div>
            </form>
        </div>
        <div class="container dropdownmenuoption" id="product_density">
                    
        </div> 
    </section>

    <section class="direction">
           
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="first-direct">
                        <div class="first-size">
                            <i class="far fa-hand-point-up"></i>
                        </div>
                        <div class="size-head">
                            <h3>Select Size </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="first-direct">
                        <div class="first-size">
                            <i class="fas fa-arrow-left"></i>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <div class="size-head">
                            <h3>Decide Density </h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="first-direct">
                        <div class="first-size">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="size-head">
                            <h3>Buy Online</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BANNER START -->




    <section class="byuse-sec sec-pad bg-ornge">
        <div class="byuse-main">
            <div class="container">
                <div class="heading-02">
                    <h2>by use</h2>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="{{url('rv-list')}}"><img src="assets/images/Rv foam cushion.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="{{url('rv-list')}}" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>RV</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a href="#">

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="guiter-list.html"><img src="assets/images/Guitar foam image.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="guiter-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Guitar</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="motorcycle-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Motorcycle</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="motorcycle-list.html"><img src="{{public_path('assets/images/Motercycle-foam-image-2-2.png')}}" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="couch-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Couch</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="couch-list.html"><img src="assets/images/couch-foam-image.png" alt="images"></a>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="chair-list.html"><img src="assets/images/sofa chair foam cushion.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="chair-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Chair</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="stool-list.html"><img src="assets/images/bar-stool-image.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="stool-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Bar Stool</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <a href="gym-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Gym table</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="gym-list.html"><img src="assets/images/gym-table-image.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="boat-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Boat</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="boat-list.html"><img src="assets/images/Boat image.png" alt="images"></a>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="afghani-cushions-list.html"><img src="assets/images/Afghani Cushions.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="afghani-cushions-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Afghani Cushions</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="rounded-cushions-list.html"><img src="assets/images/rounded-cushion-foam-image.png" alt="images"></a>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <a href="rounded-cushions-list.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Rounded Cushions</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="arab-cushions.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Arab Cushions</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="arab-cushions.html">
                                <img src="assets/images/Arab-Cushions-foam-image.png" alt="images">
                                </a>
                        </div>

                    </div>

                    <div class="col-sm-3">
                        <a href="persian-cushions.html" class="byuse-content bg-white d-flex">
                            <div class="all-item text-center">
                                <div class="heading-03 ">
                                    <h3>Persian Cushions</h3>
                                </div>
                                <p class="para-1">
                                    High-density
                                </p>
                            </div>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <div class="byuse-img">
                            <a href="persian-cushions.html"><img src="assets/images/Persian-Cushions-foam-image.png" alt="images">
                                </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!---------- BYUSE END-------->


    <section class="service-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="first-service-box">
                        <div class="icon-bx">

                        </div>
                        <div class="content-bx">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SIZE START -->
    <section class="sizes sec-pad" id="foamtab">
        <div class="size-main">
            <div class="container">
                <div class="heading-02">
                    <h2>search by Shape</h2>
                </div>
                <div class="row">
                    @foreach($shapes as $shape)
                    <div class="custom-col">
                        <a href="{{route('shapefullview',$shape['slug'])}}" class="size-srch bg-gray">

                            <div class="size-icon icon1">
                                <img src="{{$shape['thumbnail']}}" alt="" />
                            </div>
                            <div class="size-head">
                                <h3>{{$shape['name']}} </h3>
                            </div>

                        </a>
                    </div>
                    @endforeach
                   
                    <div class="custom-col">
                        <a href="cushion-custome-size.html" class="size-srch bg-gray">

                            <div class="size-icon icon16">
                              <img class="w-75" src="assets/images/icon/Custom-foam-icon.png" alt="" />
                            </div>
                            <div class="size-head">
                                <h3>Custom Size</h3>
                            </div>

                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SIZE END -->

    <!---------- BUYFOAM START-------->
    <section class="buyfoam-sec bg-ornge sec-pad">
        <div class="buyfoam-main">
            <div class="container">
                <div class="heading-02 text-center">
                    <h2>buy foam</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="foam-box bg-white">
                            <div class="foam-icon text-center">
                                <img src="assets/images/bus-icon.png">
                            </div>
                            <div class="heading-04 text-center">
                                <h4>single RV</h4>
                            </div>
                            <div class="foam-content">
                                <ul>
                                    <li>-High-density</li>
                                    <li>-2 lbs Extra-Firm 2180</li>
                                    <li>-2 lbs Firm 2155</li>
                                    <li>-Circle foam/Round foam </li>


                                </ul>
                            </div>
                            <div class="custom-btn text-center">
                                <button class="btn btn-01">add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="foam-box bg-white">
                            <div class="foam-icon text-center">
                                <img src="assets/images/bus-icon.png">
                            </div>
                            <div class="heading-04 text-center">
                                <h4> RV Queen</h4>
                            </div>
                            <div class="foam-content">
                                <ul>
                                    <li>-High-density</li>
                                    <li>-2 lbs Extra-Firm 2180</li>
                                    <li>-2 lbs Firm 2155</li>
                                    <li>-Circle foam/Round foam </li>


                                </ul>
                            </div>
                            <div class="custom-btn text-center">
                                <button class="btn btn-01">add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="foam-box bg-white">
                            <div class="foam-icon text-center">
                                <img src="assets/images/bus-icon.png">
                            </div>
                            <div class="heading-04 text-center">
                                <h4> RV Long</h4>
                            </div>
                            <div class="foam-content">
                                <ul>
                                    <li>-High-density</li>
                                    <li>-2 lbs Extra-Firm 2180</li>
                                    <li>-2 lbs Firm 2155</li>
                                    <li>-Circle foam/Round foam </li>


                                </ul>
                            </div>
                            <div class="custom-btn text-center">

                                <button class="btn btn-01">add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------- BUYFOAM END-------->

    <!---------- W0RRYFOAM START-------->
    <section class="sec-pad bg-grey-01 ">
        <div class="worryfoam-main">
            <div class="container">
                <div class="worry-img position-relative">

                    <div class="worry-content position-relative">
                        <div class="heading-05 text-center">
                            <h2 class="text-white">worry out
                                <br /> of buying foam</h2>
                        </div>
                        <div class="custom-btn text-center">
                            <button class="btn-01 btn">buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------- W0RRYFOAM END-------->

    <!---------- BYOPTION START-------->
    <section class="byoption-sec sec-pad">
        <div class="byoption-main">
            <div class="container">
                <div class="heading-02 text-center">
                    <h2>FAQ</h2>
                </div>
                <div class="row">
                <div class="col-lg-6">
                    <div class="tab-content" id="faq-tab-content">
                        <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                            <div class="accordion" id="accordion-tab-1">
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-1">
                                        <h5>
                                            <button class="btn btn-link cardtext active2" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-1" aria-expanded="true"
                                                aria-controls="accordion-tab-1-content-1">Does a foam mattress need a box spring?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="accordion-tab-1-content-1" aria-labelledby="accordion-tab-1-heading-1" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>Typically modern spring based mattresses rely on box springs to get the added support they need within a bed frame. But Make My Foam mattresses aren’t typical. While we carry a full line of foundations to match our mattresses, if your bed frame is a solid base (wood or slats) you don’t need to lose any sleep over getting a new box spring.</p>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-2">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-2" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-2">What are Make My Foam Mattresses made of?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-1-content-2" aria-labelledby="accordion-tab-1-heading-2" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>Each Make My Foam mattress is made of a combination of soy based high density polyurethane foam and memory foam, as well as Natural Talalay Latex Rubber Foam.</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-3">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-3" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-3">What do you mean when you say ‘high density’?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-1-content-3" aria-labelledby="accordion-tab-1-heading-3" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>Density refers to weight, and so high density simply means more durable. It will last longer and keep its shape at the same time. It’s firmer than other foams. The higher the weight the longer the foam will keep its shape.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-4">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-4" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-4">Will Make My Foam products aggravate my allergies?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-1-content-4" aria-labelledby="accordion-tab-1-heading-4" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>Bugs and dust mites like warm, open places inside mattresses. Foam mattresses don’t have the environment for bugs and dust mites to thrive in like spring mattresses do. All of our mattresses naturally have some degree of resistance to insects and allergens based on the composition of the foam. Our Natural Talalay Rubber Latex models are hypoallergenic and come with a choice of 2” or 4” of rubber at the top. We still recommend using a mattress protector as you would with any mattress.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-5">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-5" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-5">How do I care for my new foam product?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-1-content-5" aria-labelledby="accordion-tab-1-heading-5" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>All of our mattresses come with a removable, machine-washable cover, but it is still recommended to use a mattress protector. Foam mattresses do not need to be flipped or rotated and do not require a box spring as long as they are on top of a base with even support underneath.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-1-heading-6">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-6" aria-expanded="false"
                                                aria-controls="accordion-tab-1-content-6">Are foam beds good for a bad back, hips, etc?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-1-content-6" aria-labelledby="accordion-tab-1-heading-6" data-parent="#accordion-tab-1">
                                        <div class="card-body">
                                            <p>Foam mattresses offer great support to relieve pain caused by pressure on certain points of the body. Bodies have many curves that a foam mattress can accommodate. For example when you lay on your side your spine should remain in its natural alignment, foam beds allow this as they mold to your shape. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                   <div class="tab-content" id="faq-tab-content">
                     <div class="tab-pane show active" id="tab2" role="tabpanel" aria-labelledby="tab2">
                            <div class="accordion" id="accordion-tab-2">
                                
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-2-heading-1">
                                        <h5>
                                            <button class="btn btn-link cardtext active2" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-1" aria-expanded="true"
                                                aria-controls="accordion-tab-2-content-1">Are foam beds hot to sleep on?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="accordion-tab-2-content-1" aria-labelledby="accordion-tab-2-heading-1" data-parent="#accordion-tab-2">
                                        <div class="card-body">
                                            <p>Foam has naturally insulating properties that can make foam mattresses (including memory foam) feel warmer than spring mattresses. Our newer foam products offer better air circulation and better response to changes in temperature. Sometimes switching to a foam mattress can take a few nights to get used to.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-2-heading-3">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-3" aria-expanded="false"
                                                aria-controls="accordion-tab-2-content-3">What does ‘motion transfer’ mean?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-2-content-3" aria-labelledby="accordion-tab-2-heading-3" data-parent="#accordion-tab-2">
                                        <div class="card-body">
                                            <p>'Motion transfer' is the movement you feel when your partner shifts in their sleep. Foam mattresses provide an independent sleeping surface that absorbs motion when your partner tosses and turns.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-2-heading-4">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-4" aria-expanded="false"
                                                aria-controls="accordion-tab-2-content-4">What is the warranty on Make My Foam products?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-2-content-4" aria-labelledby="accordion-tab-2-heading-4" data-parent="#accordion-tab-2">
                                        <div class="card-body">
                                            <p>Your comfort and happiness is our guarantee! We offer a manufacturer's warranty on all our products. See the individual mattress descriptions for details on each model’s warranty.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-2-heading-5">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-5" aria-expanded="false"
                                                aria-controls="accordion-tab-2-content-5">What is your return policy?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-2-content-5" aria-labelledby="accordion-tab-2-heading-5" data-parent="#accordion-tab-2">
                                        <div class="card-body">
                                            <p>Each Tangerine mattress is made to order, especially for you. This means that we’re unable to offer a trial period or sleep guarantee. For health reasons we cannot accept a returned mattress unless for a warranty or defect issue.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="accordion-tab-2-heading-6">
                                        <h5>
                                            <button class="btn btn-link cardtext" type="button" data-toggle="collapse" data-target="#accordion-tab-2-content-6" aria-expanded="false"
                                                aria-controls="accordion-tab-2-content-6">Do foam mattresses have a smell?</button>
                                        </h5>
                                    </div>
                                    <div class="collapse" id="accordion-tab-2-content-6" aria-labelledby="accordion-tab-2-heading-6" data-parent="#accordion-tab-2">
                                        <div class="card-body">
                                            <p>A newly manufactured memory foam mattress may have a slight odour when first unpacked. This is standard with all memory foam mattresses. We recommend airing out your new mattress in a well-ventilated room for 3-5 days. High density polyurethane and Natural Talalay Latex should not have any odours.</p>
<p>
Please feel free to contact us @ (780) 453-7997.<br>
Thanks!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div> 
                </div>
                <div class="clearfix"></div>
                </div>
                
            </div>
        </div>
    </section>
    <!---------- BYOPTION END-------->






    <!-- TYPE OF FOAM START-->
    <section class="foam bg-grey-01 sec-pad">
        <div class="container">
            <div class="heading-02">
                <h2>type of foam</h2>
            </div>
            <div class="foam-main">
                <div class="row no-gutters">
                    <div class="col-sm-6">
                        <div class="type-foam-main">
                            <div class="foam-img">
                                <img src="assets/images/polyurethin.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="type-foam-main bg-white">

                            <div class="foam-ctn  size-head">
                                <div class="inner-foam-ctn after position-relative">
                                    <h3>polyurethane foam
                                        <span>(high-density)</span>
                                    </h3>
                                    <p>Lorem ipsum elit briefcase dolor sit, consectetur adipisicing elit. Atque delectus voluptates
                                        dolorum sit nemo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters order-1-mobile">

                    <div class="col-sm-6">
                        <div class="type-foam-main bg-white">

                            <div class="foam-ctn  size-head">
                                <div class="inner-foam-ctn after position-relative">
                                    <h3>Memory foam
                                        <span>(high-density)</span>
                                    </h3>
                                    <p>Lorem ipsum elit briefcase dolor sit, consectetur adipisicing elit. Atque delectus voluptates
                                        dolorum sit nemo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="type-foam-main">
                            <div class="foam-img">
                                <img src="assets/images/memory.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-6">
                        <div class="type-foam-main">
                            <div class="foam-img">
                                <img src="assets/images/latex.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="type-foam-main bg-white">

                            <div class="foam-ctn  size-head">
                                <div class="inner-foam-ctn after position-relative">
                                    <h3>100% Latex Dunlop

                                    </h3>
                                    <p>Lorem ipsum elit briefcase dolor sit, consectetur adipisicing elit. Atque delectus voluptates
                                        dolorum sit nemo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="worry">
                    <div class="row no-gutters">
                        <div class="col-sm-8">
                            <div class="type-foam-main">
                                <div class="foam-img">
                                    <img src="assets/images/worry-out-01.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="foam-ctn size-head bg-white">
                                <div class="innerbuying-foam">
                                    <div class="heading-05">
                                        <h2>Worry Out of Buying Foam</h2>
                                    </div>
                                    <div class="custom-btn">
                                        <button class="btn-01 btn">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('includes.footer')


    <script type="text/javascript">
    
    </script>

</body>

</html>