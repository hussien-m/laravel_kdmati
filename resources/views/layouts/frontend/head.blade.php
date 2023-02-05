<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>خدماتي</title>
    <link rel="shortcut icon" href="https://kdmati.com/admin/uploads/logo.ico" type="image/x-icon">

    <link rel="icon" href="https://kdmati.com/admin/uploads/logo.ico" ttype="image/x-icon">

    <link rel="apple-touch-icon" sizes="57x57" href="https://kdmati.com/assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://kdmati.com/assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://kdmati.com/assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://kdmati.com/assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="https://kdmati.com/assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="https://kdmati.com/assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="https://kdmati.com/assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="https://kdmati.com/assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://kdmati.com/assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="https://kdmati.com/assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://kdmati.com/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://kdmati.com/assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://kdmati.com/assets/images/favicons/favicon-16x16.png">
    <link rel="stylesheet" media="all" href="{{ asset('frontend/assets/css/bootstrap-rtl.min.css') }}" defer async>
    <!--fontawesome 5-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style.css-->
    <link rel="stylesheet" media="all" href="{{ asset('frontend/assets/css/style.css') }}" defer async>
    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" defer async
        media="screen and (max-width: 767px)">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive-ipad.css') }}" defer async
        media="screen and (min-device-width : 768px) and (max-device-width : 1024px) ">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/cus.css') }}" />

    @yield('styles')

    <style>
        .navbar-nav .categories-dropdown  .dropdown-menu
        {
            left: 0;
            right: 0;
            margin: auto;
        }
        .navbar-light .navbar-nav.mr-auto .nav-link,.navbar-light .navbar-nav.ml-auto .nav-link
        {
            color:#ffffff;
        }
    </style>
    <livewire:styles/>
    
</head>
