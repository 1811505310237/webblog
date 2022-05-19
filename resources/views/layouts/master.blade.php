<!doctype html>
<html lang="en">

<head>
    <title>CodersE</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="CodersE blog lập trình" />
    <meta name="description" content="Trang web cá nhân Sret Ksor" />

    <!--  CSS -->
    <link rel="stylesheet" href="{{ asset('public/fe/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fe/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fe/assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fe/assets/css/style.css') }}">
    <!-- Font icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="icon" href="public/fe/images/fav.png">
    <!--Toastr-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    @include('layouts.header')
    <!-- End header -->

    <!--Mian start with section-->
    @yield('content')
    

    <!--Modal for loading page-->

    @include('layouts.footer')

    <!-- JS -->
    <script src="{{ asset('public/fe/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/fe/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/fe/assets/js/app.js') }}"></script>
    <!--Toaatr--->
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>