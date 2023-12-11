<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description"
            content="This Bussiness platform has been designed by the Techclouds team, visit us on the footer link below or just https://cloudstechn.com">

        <!-- title -->
        <title>{{ config('app.name', 'Taylor Shop') }}</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/svg" href="/storage/images/logo/icon.png">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="assets/css/all.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- mean menu css -->
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <!-- main style -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!-- responsive -->
        <link rel="stylesheet" href="assets/css/responsive.css">

        <style>
        .success {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: #4CAF50;
            border: 1px solid #fff;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */
        }

        .size {
            margin: 1px;
            font-size: small;
            font-weight: 500;
            color: #F28123;
        }
        </style>
    </head>

    <body>

        <!--PreLoader-->
        <div class="loader">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>
        <!--PreLoader Ends-->

        <!-- header -->
        <div class="top-header-area" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 text-center">
                        <div class="main-menu-wrap">
                            <!-- logo -->
                            <div class="site-logo">
                                <a href="{{route('home')}}">
                                    <img src="/storage/images/logo/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo -->

                            <!-- menu start -->
                            <nav class="main-menu">
                                <ul>
                                    <!-- <li class="current-list-item"><a href="{{route('home')}}">Home</a></li> -->
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('about')}}">About</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>


                                    <li>
                                        <div class="header-icons">
                                            <!-- <li>
                                        <a class="shopping-cart" href="#"><i class="fas fa-user"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Log In</a></li>
                                            <li><a href="#">sign Up</a></li>
                                        </ul>
                                    </li>
                                    <li> -->
                                            <!-- <a class="mobile-hide search-bar-icon" href="#"><i
                                                    class="fas fa-search"></i></a> -->
                                            <!-- </li> -->
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                            
                            <div class="mobile-menu"></div>
                            <!-- menu end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->

        <!-- search area -->
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span class="close-btn"><i class="fas fa-window-close"></i></span>
                        <div class="search-bar">
                            <div class="search-bar-tablecell">
                                <h3>Search For:</h3>
                                <input type="text" placeholder="Keywords">
                                <button type="submit">Search <i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end search arewa -->

        @if(session('success'))
        <div class="success" id="message">
            {{@session('success')}}
        </div>
        @endif