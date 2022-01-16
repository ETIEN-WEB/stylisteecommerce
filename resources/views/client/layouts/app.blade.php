<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Nov 2021 23:07:19 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Porto - Bootstrap eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset ('frontend/images/icons/favicon.png')}}">

    <!-- icon mdi -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'frontend/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset ('frontend/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset ('frontend/css/demo1.min.css')}}">
    <link rel="stylesheet" href="{{asset ('frontend/css/styleetien.css')}}">



    @yield('style')
    <link rel="stylesheet" type="text/css" href="{{asset ('frontend/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset ('frontend/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
</head>

<body>
    <div class="page-wrapper">
        <div class="all-notify" style="display: none;"></div>
        <div class="flash_notify text-center" style="display: none;">
            <div class="flash_type"> flash_type </div>
            <span class="flash_msg"> flash_msg </span>
        </div>
        <div class="top-notice text-white bg-dark">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo1-shop.html" class="category">MEN</a>
                <a href="demo1-shop.html" class="category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
            <!-- End .container -->
        </div>
        <!-- End .top-notice -->

        @include('client.include.header')
        <!-- End .header -->



        @yield('content')



        @include('client.include.footer')





        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    {{-- <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> --}}

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="demo1.html"><i class="icon-home"></i>Home</a></li>
                    @foreach ($categories as $categorie)
                    <li>
                        <a href="demo1-shop.html" class="sf-with-ul">{!! $categorie->icon !!} {{ $categorie->libelle }}</a>
                        <ul>
                            @foreach ($categorie->souscategorie as $souscategorie)
                            <li><a href="category-8col.html">{{ $souscategorie->libelle }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>

                {{-- <ul class="mobile-menu menu-with-icon mt-2 mb-2">
                    <li class="border-0">
                        <a href="#" target="_blank"><i class="sicon-star"></i>Buy Porto!<span
                                class="tip tip-hot">Hot</span></a>
                    </li>
                </ul> --}}

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo1-contact.html">Contact Us</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo1.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="demo1-shop.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    {{-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(frontend/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="{{asset ('frontend/images/logo.png')}}" width="111" height="44" alt="Logo" class="logo-newsletter">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>
        <!-- End .newsletter-popup-content -->

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div> --}}
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{asset ('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset ('frontend/js/plugins.min.js')}}"></script>
    <script src="{{asset ('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset ('frontend/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset ('frontend/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset ('frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset ('frontend/js/bootbox.min.js')}}"></script>
    
    <!-- Main JS File -->
    <script src="{{asset ('frontend/js/main.min.js')}}"></script>
    <!-- Flasher JS File -->
    <script>
        // jQuery(window).on("load", function(){
        //     alert('page is loaded');

        //     setTimeout(function () {
        //         alert('page is loaded and 1 minute has passed');   
        //     }, 60000);

        // });
    </script>
    <!-- Script pour afficher message flash   -->
    @if (session('MsgFlash'))
    <script type="text/javascript">
        jQuery(window).on("load", function(){
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
        setTimeout(hideFlashnotify, 3500);
        function hideFlashnotify(){
            flash_notify.hide()
        }
            //  {{ session('MsgFlash')['type'] }}("{{ isset(session('MsgFlash')['msg']) ? session('MsgFlash')['msg'] : null }}", "{{ isset(session('MsgFlash')['title']) ? session('MsgFlash')['title'] : null }}")
    });
    </script>
    @endif

    @stack('scripts')
    <script>  
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Voulez-vous vraiment supprimer ça  ?", function(confirmed){
            if(confirmed){
                window.location.href = link;
            };
            });
       });
    </script>
    <script>
        $(document).ready(function () {
            cartload();
        });
        function cartload()
        {

            $.ajax({
                url: '/load-cart-data',
                method: "GET",
                success: function (response) {
                    $('span.cart-count').html('');
                    
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('span.cart-count').html(value['totalcart']);
                    //$('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
                }
            });
        }
    </script>




        
    
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Nov 2021 23:07:57 GMT -->
</html>