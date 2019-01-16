<!DOCTYPE html>
<html lang="en">
<head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Masbro : Cari kerja semudah yang anda bayangkan" />
    <meta property="og:image" content="{{ asset('social-image.png')}} " />
    <meta name="format-detection" content="telephone=no">
    
    <!-- FAVICONS ICON -->
    <link rel="icon" href="https://s3.ap-south-1.amazonaws.com/dzon-html/job-board/xhtml/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />
    
    <!-- PAGE TITLE HERE -->
    <title>Masbro : Cari kerja semudah yang anda bayangkan</title>
    
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- [if lt IE 9]> -->
    <script src="{{ asset('js/html5shiv.min.js')}}"></script>
    <script src="{{ asset('js/respond.min.js')}}"></script>
    <!-- <![endif] -->
    
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/templete.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('/css/skin/skin-1.css')}}">
    <link rel="stylesheet" href="{{ asset('/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/revolution/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropify.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('css')
    <!-- Revolution Navigation Style -->

    <style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #fff;
        font-size: 14px;
        color: white;
        height: 68px;
        text-align: center;
        z-index: 1099;
        border-top:3px solid rgba(0,0,0,0.2);
    }

    .margin-footer{
        margin-bottom: 100px;
    }

    .menu-footer{
        margin: 5px;        
        background: #fff;
        color: #171d36;
        font-size: 20px;
    }

    .active-menu-btn {
        background: #17a2b8;
        color: #fff;
    }

    </style>

</head>
<body id="bg">

<div class="page-wraper">
    @include('layout.menu')

    @yield('content')
    <!-- Footer -->
    <div class="margin-footer hidden-md-up"></div>
    <div class="footer hidden-md-up">
        <div style="margin-top: 5px">
            <a href="{{ url('/') }}"><button class="btn menu-footer @if(isset($menu) AND ($menu ==  'home') ) active-menu-btn @endIf"><i class="fa fa-home"></i></button></a>
            @if (Auth::check())
                <button class="btn menu-footer"><i class="fa fa-building"></i></button>
                <button class="btn menu-footer"><i class="fa fa-folder"></i></button>
                <a href="{{ url('notification') }}"><button class="btn menu-footer @if(isset($menu) AND ($menu ==  'notification') ) active-menu-btn @endIf"><i class="fa fa-bell"></i></button></a>
                <a href="{{ url('profile/user') }}"><button class="btn menu-footer @if(isset($menu) AND ($menu ==  'profile') ) active-menu-btn @endIf"><i class="fa fa-user"></i></button></a>
            @endIf
        </div>        
    </div>

    <footer class="site-footer hidden-sm-down">    
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center"><span>© 2018 All rights reserved <i class="fa fa-heart text-red heart"></i>  </span></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('js/jquery.min.js')}} "></script><!-- JQUERY.MIN JS -->
<script src="{{ asset('plugins/wow/wow.js')}} "></script><!-- WOW JS -->
<script src="{{ asset('plugins/bootstrap/js/popper.min.js')}} "></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}} "></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js')}} "></script><!-- FORM JS -->
<script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}} "></script><!-- FORM JS -->
<script src="{{ asset('plugins/magnific-popup/magnific-popup.js')}} "></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset('plugins/counter/waypoints-min.js')}} "></script><!-- WAYPOINTS JS -->
<script src="{{ asset('plugins/counter/counterup.min.js')}} "></script><!-- COUNTERUP JS -->
<script src="{{ asset('plugins/imagesloaded/imagesloaded.js')}} "></script><!-- IMAGESLOADED -->
<script src="{{ asset('plugins/masonry/masonry-3.1.4.js')}} "></script><!-- MASONRY -->
<script src="{{ asset('plugins/masonry/masonry.filter.js')}} "></script><!-- MASONRY -->
<script src="{{ asset('plugins/owl-carousel/owl.carousel.js')}} "></script><!-- OWL SLIDER -->
<script src="{{ asset('plugins/rangeslider/rangeslider.js')}} " ></script><!-- Rangeslider -->
<script src="{{ asset('js/custom.js')}} "></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset('js/dz.carousel.js')}} "></script><!-- SORTCODE FUCTIONS  -->
<script src="{{ asset('recaptcha/api.js')}} "></script> <!-- Google API For Recaptcha  -->
<script src="{{ asset('js/dz.ajax.js')}} "></script><!-- CONTACT JS  -->
<script src="{{ asset('plugins/paroller/skrollr.min.js')}} "></script><!-- PAROLLER -->
<script src="{{ asset('js/dropify.js')}} "></script><!-- PAROLLER -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script> -->
<!-- <script src="{{ asset('js/datetimepicker.js')}}"></script> -->
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>



@yield('js')

</body>

</html>