<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('public/admin/images/favIcon.png')}}" />
    <link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('public/admin/fonts/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/fonts/icomoon/icomoon.css')}}" rel="stylesheet" />
    <link href="{{asset('public/admin/css/main.css')}}" rel="stylesheet" media="screen" />
</head>

<body>

    <!-- Header starts -->
    <header>

        <!-- Logo starts -->
        <a href="{{url('')}}" class="logo">
            <img src="{{asset('public/admin/images/logo.png')}}" alt="" />
        </a>
        <!-- Logo ends -->

        <!-- Header actions starts -->
        <ul id="header-actions" class="clearfix">
            <li class="list-box user-admin hidden-xs dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i>
                </a>
                <ul class="dropdown-menu sm">
                    <li class="dropdown-content">
                        <a href="#">Edit Profile</a>
                        <a href="#">Change Password</a>
                        <a href="#">Settings</a>
                        <a href="{{url('admin/logout')}}">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" id="toggleMenu" class="toggle-menu">
                    <i class="collapse-menu-icon"></i>
                </button>
            </li>
        </ul>
        <!-- Header actions ends -->

        <div class="custom-search hidden-sm hidden-xs">
            <input type="text" class="search-query" placeholder="Search here ...">
            <i class="icon-search3"></i>
        </div>
    </header>
    <!-- Header ends -->

   @include('includes.adminMenu')

    @yield('body')

    </div>

    <!-- Footer Start -->
    <footer>
        Copyright &copy; Make My Foam <span>2019</span>. All Rights Reserved.
    </footer>
    <!-- Footer end -->

    <!-- -------Logout Form start           ---------->

    <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- -------Logout Form end           ---------->                          

    <script src="{{asset('public/admin/js/jquery.js')}}"></script>
    <script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/js/scrollup/jquery.scrollUp.js')}}"></script>
    <script src="{{asset('public/admin/js/bsvalidator/bootstrapValidator.js')}}"></script>
    <script src="{{asset('public/admin/js/bsvalidator/custom-validations.js')}}"></script>
    <script src="{{asset('public/admin/js/custom.js')}}"></script>

    @yield('script')

</body>
</html>
