<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JobSeeker Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('user/img/work-in-progress.png') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/bootstrap.min.css') !!}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/font-awesome.min.css') !!}">
    
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/nalika-icon.css') !!}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/owl.carousel.css') !!}">
    <link rel="stylesheet" href="{!! url('dashboard/css/owl.theme.css') !!}">
    <link rel="stylesheet" href="{!! url('dashboard/css/owl.transitions.css') !!}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/animate.css') !!}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/normalize.css') !!}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/meanmenu.min.css') !!}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/main.css') !!}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/morrisjs/morris.css') !!}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/scrollbar/jquery.mCustomScrollbar.min.css') !!}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/metisMenu/metisMenu.min.css') !!}">
    <link rel="stylesheet" href="{!! url('dashboard/css/metisMenu/metisMenu-vertical.css') !!}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/calendar/fullcalendar.min.css') !!}">
    <link rel="stylesheet" href="{!! url('dashboard/css/calendar/fullcalendar.print.min.css') !!}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/style.css') !!}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{!! url('dashboard/css/responsive.css') !!}">
    <!-- modernizr JS
		============================================ -->
    <script src="{!! url('js/vendor/modernizr-2.8.3.min.js') !!}"></script>
    

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

   @include('layouts.dashboard.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper ">
        @include('layouts.dashboard.header')
        

        @yield('content-dashboard')
 
        @include('layouts.dashboard.footer')
        
    </div>
    <!-- jquery
		============================================ -->
    <script src="{!! url('dashboard/js/vendor/jquery-1.12.4.min.js') !!}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{!! url('dashboard/js/bootstrap.min.js') !!}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{!! url('dashboard/js/wow.min.js') !!}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{!! url('dashboard/js/jquery-price-slider.js') !!}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{!! url('dashboard/js/jquery.meanmenu.js') !!}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{!! url('dashboard/js/owl.carousel.min.js') !!}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{!! url('dashboard/js/jquery.sticky.js') !!}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{!! url('dashboard/js/jquery.scrollUp.min.js') !!}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{!! url('dashboard/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') !!}"></script>
    <script src="{!! url('dashboard/js/scrollbar/mCustomScrollbar-active.js') !!}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{!! url('dashboard/js/metisMenu/metisMenu.min.js') !!}"></script>
    <script src="{!! url('dashboard/js/metisMenu/metisMenu-active.js') !!}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{!! url('dashboard/js/sparkline/jquery.sparkline.min.js') !!}"></script>
    <script src="{!! url('dashboard/js/sparkline/jquery.charts-sparkline.js') !!}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{!! url('dashboard/js/calendar/moment.min.js') !!}"></script>
    <script src="{!! url('dashboard/js/calendar/fullcalendar.min.js') !!}"></script>
    <script src="{!! url('dashboard/js/calendar/fullcalendar-active.js') !!}"></script>
	<!-- float JS
		============================================ -->
    <script src="{!! url('dashboard/js/flot/jquery.flot.js') !!}"></script>
    <script src="{!! url('dashboard/js/flot/jquery.flot.resize.js') !!}"></script>
    <script src="{!! url('dashboard/js/flot/curvedLines.js') !!}"></script>
    <script src="{!! url('dashboard/js/flot/flot-active.js') !!}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{!! url('dashboard/js/plugins.js') !!}"></script>
    <!-- main JS
		============================================ -->
    <script src="{!! url('dashboard/js/main.js') !!}"></script>
</body>

</html>