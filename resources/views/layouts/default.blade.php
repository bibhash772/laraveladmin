<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JONAH VENTURES</title>
    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('plugins/animation/css/animate.min.css')}}">
    <!-- notification css -->
    <link rel="stylesheet" href="{{asset('plugins/notification/css/notification.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/data-tables/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css')}}">

    @stack('css')
    
</head>
<body class="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
        @include('layouts.partials.sidebar')
        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')
        @yield('footer-script')
</body>
</html>