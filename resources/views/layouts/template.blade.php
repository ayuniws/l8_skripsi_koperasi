<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="{{ config('app.name') }}">
  <title>{{ config('app.name') }} - Page</title>
  <link rel="apple-touch-icon" href="{{ asset('modernadmin/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('modernadmin/app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/vendors.css') }}">
  @yield('data-tables')
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/weather-icons/climacons.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/fonts/meteocons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/charts/chartist.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/app.css') }}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/pages/timeline.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/css/pages/dashboard-ecommerce.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/assets/css/style.css') }}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
@include('layouts.navbar')
@yield('sidemenu')
@yield('content')
@include('layouts.footer')
<!-- BEGIN VENDOR JS-->
@include('layouts.js-standard')
</body>
</html>