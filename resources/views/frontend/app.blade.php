
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{url('public/front/images/favicon.ico')}}" type="image/x-icon">
        <title>Ecommerce - @yield('title')</title>
        <link href="{{url('public/front/css/global.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('public/front/css/nice-select.css')}}">
         <script src="{{url('public/front/js/3.1.1.jquery.min.js')}}"></script>
        <script src="{{url('public/front/js/jquery.nice-select.min.js')}}"></script>
        <script src="{{url('public/front/js/custom.js')}}"></script>
        </head>
            <body class="inner-page" data-gr-c-s-loaded="true">
            <header class="header-main">
            <nav class="navbar navbar-expand-all fixed-top-head header-innerpage">
                <a class="navbar-brand" href="{{route('landing')}}">

                    <img src="{{url('public/assets/images/logo.png')}}" class="image" alt="logo">

                </a>
                <div class="ml-auto button-action ml-auto dropdown">
                    <!-- <button class="btn-01 btn">Log In
                        <i class="fas fa-user"></i>
                    </button> -->

                    <button class="btn-user dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-user"></i>Your Account</a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-shopping-bag"></i>Your Orders </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-heart"></i>Shortlist</a>
                        <!-- <span class="para-1-dropdown">If you are new user</span> -->
                        <div class="btn-inline d-flex flex-column">
                            <button class="   btn-link" data-toggle="modal" data-target="#exampleModalCenter1">Register </button>
                            <button class="btn-01 btn dropdown-login" data-toggle="modal" data-target="#exampleModalCenter">Log In</button>
                        </div>
                    </div>
                </div>
                <a href="cart.html" class="cart-mobile">
                    <span class="item-count">2</span>
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <button onclick="openNav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="assets/images/bars.png">
                </button>

            </nav>
        </header>

        <div class="container">
            @yield('content')
        </div>
         <script src="{{asset('public/front/js/3.1.1.jquery.min.js')}}"></script>
    <script src="{{asset('public/front/js/popper.min.js')}}"></script>
    <script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>

    <!-- <script src="assets/js/jquery.js "></script> -->
    <script src="{{asset('public/front/js/jquery.nice-select.min.js')}} "></script>
    <script src="{{asset('public/front/js/fastclick.js')}} "></script>
    <script src="{{asset('public/front/js/prism.js')}} "></script>
    <script src="{{url('public/js/custom.js')}}"></script>
    </body>
</html>











<!-- <!DOCTYPE html>
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
</head>

<body>

   

  

</body>

</html> -->
