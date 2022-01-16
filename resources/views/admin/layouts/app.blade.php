<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/adomx-preview/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Dec 2021 06:35:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('backend/images/favicon.ico')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/vendor/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('backend/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('backend/css/vendor/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('backend/css/vendor/cryptocurrency-icons.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/plugins/plugins.css') }}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/helper.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset ('backend/css/style.css') }}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{ asset ('backend/css/style-primary.css') }}">

    <!-- form duplicate jquery css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/1.0.0/pure-min.css">
    <link rel="stylesheet" href="{{ asset ('backend/css/isia-form-repeater.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('backend/css/demo.css') }}">
    
    <!-- STYLE PAGE BY ETIEN -->
    <link rel="stylesheet" href="{{ asset ('backend/css/etien.css') }}">

    @yield('style')

</head>

<body>

    <div class="main-wrapper">
        <div class="flash_notify text-center" style="display: none;">
            <div class="flash_type"> flash_type </div>
            <span class="flash_msg"> flash_msg </span>
        </div>


        <!-- Header Section Start -->
        <!-- ==================   START HEADER===================== -->
        @include('admin.include.header')
        <!-- ==================   END HEADER===================== -->

        <!-- ==================   START HEADER===================== -->
        @include('admin.include.sidbar')
        <!-- ==================   END HEADER===================== -->

        <!-- Side Header Start -->


        <!-- Content Body Start -->
        @yield('content')


        <!-- Footer Section Start -->
        <div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">2019 &copy; <a href="https://themeforest.net/user/codecarnival">Codecarnival</a></p>
                </div>

            </div>
        </div><!-- Footer Section End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="{{ asset ('backend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ asset ('backend/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset ('backend/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset ('backend/js/vendor/bootstrap.min.js')}}"></script>
    <!--Plugins JS-->
    <script src="{{ asset ('backend/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/tippy4.min.js.js')}}"></script>
    <!--Main JS-->
    <script src="{{ asset ('backend/js/main.js')}}"></script>

    <!-- Plugins & Activation JS For Only This Page -->

    <!--Moment-->
    <script src="{{ asset ('backend/js/plugins/moment/moment.min.js')}}"></script>

    <!--Daterange Picker-->
    <script src="{{ asset ('backend/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/daterangepicker/daterangepicker.active.js')}}"></script>

    <!--Echarts-->
    <script src="{{ asset ('backend/js/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/chartjs/chartjs.active.js')}}"></script>

    <!--VMap-->
    <script src="{{ asset ('backend/js/plugins/vmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/vmap/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset ('backend/js/plugins/vmap/vmap.active.js')}}"></script>
    <!-- form duplicate jquery -->
    <script src="{{ asset ('backend/js/isia-form-repeater.min.js')}}"></script>
    <script src="{{ asset ('backend/js/demo.js')}}"></script>

    {{-- ======= START FLASHER     ======== --}}
    @if (session('MsgFlash'))
    <script type="text/javascript">
        //jQuery(window).on("load", function(){
        var flash_notify = $('.flash_notify');
        if ('{{ session('MsgFlash')['type'] == 'succes' }}') {
            flash_notify.css('background-color', 'green');
        } else {
        flash_notify.css('background-color', 'red');    
        }
        var flash_type = $('.flash_type');
        var flash_msg = $('.flash_msg');

        flash_notify.show();
        flash_type.html('');
        flash_type.html('{{ session('MsgFlash')['type'] }}');
        flash_msg.html('');
        flash_msg.html('{{ session('MsgFlash')['msg'] }}');
        setTimeout(hideFlashnotify, 4000);
        function hideFlashnotify(){
            flash_notify.hide()
        }
            //  {{ session('MsgFlash')['type'] }}("{{ isset(session('MsgFlash')['msg']) ? session('MsgFlash')['msg'] : null }}", "{{ isset(session('MsgFlash')['title']) ? session('MsgFlash')['title'] : null }}")
    //});
    </script>
    @endif
{{-- ======= END FLASHER     ======== --}}
    @stack('scripts')
</body>


<!-- Mirrored from demo.hasthemes.com/adomx-preview/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Dec 2021 06:36:32 GMT -->
</html>