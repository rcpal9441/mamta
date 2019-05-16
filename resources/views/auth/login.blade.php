<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Make My Foam</title>
    <link href="{{url('public/admin/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet" />
</head>
<body class="login_page">
    <div class="login_form">

        <div class="login_header">
            <div class="login_logo">
                <img src="{{url('public/admin/images/logo.png')}}" class="img-responsive" />
            </div>
            
        </div>

        <div class="login_form_content">
            <h4>Make My Foam Admin</h4>
            <form method="POST" action="{{ route('login') }}">
                        @csrf
            <div class="form-group ffl-wrapper">
                <label for="username" class="ffl-label">{{ __('Username/Email') }}</label>
               <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
               @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group ffl-wrapper">
                <label for="password" class="ffl-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">
                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="remember_row">
                <div class="remember_text">
                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </div>
                

                @if (Route::has('password.request'))
                <div class="forget_password">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                     </div>
                @endif
            </div>
            <div class="form_btn">
                <!--<input type="button" name="Login" value="Login" />-->
                <!--a href="Dashboard.html">Login</a-->
                <button type="submit">
                                    {{ __('Login') }}
                                </button>
            </div>
            </form>
        </div>

    </div>

    <script src="{{url('public/admin/js/jquery.min.js') }}"></script>
    <script src="{{url('public/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{url('public/admin/js/Sidenav/sidebar.js') }}"></script>
    <script src="{{url('public/admin/js/Sidenav/collapsibleMenu.min.js') }}"></script>
    <script src="{{url('public/admin/js/Sidenav/classtoggle.min.js') }}"></script>
    <script src="{{url('public/admin/js/Sidenav/jquery.slimscroll.min.js') }}"></script>
    <script src="{{url('public/admin/js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{url('public/admin/js/floatingFormLabels.min.js') }}"></script>
    <script src="{{url('public/admin/js/script.js') }}"></script>
</body>
</html>
