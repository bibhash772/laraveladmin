<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <title>|| Jonah Ventures ||</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('css/user/stylesheet.css')}}" type="text/css">
      <link rel="stylesheet" href="{{asset('css/user/slick.css')}}" type="text/css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--       <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"> -->
  <!-- date time picker -->
    <link rel="stylesheet" href="{{asset('plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css')}}">
   </head>
   <body>
   		@include('layouts.partials.header-user')
        @yield('content')
        @include('layouts.partials.footer-user')

   </body>
</html>