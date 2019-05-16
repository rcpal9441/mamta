<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{url('public/front/css/nice-select.css')}}" rel="stylesheet" >
    <link href="{{url('public/front/css/global.css')}}" rel="stylesheet">
    <link href="{{url('public/front/images/favicon.ico')}}" rel="shortcut icon"  type="image/x-icon">
    
</head>

<body class="inner-page">

    @include('includes.header')

    @yield('body')

   
   @include('includes.footer')


   @yield('script')

</body>

</html>