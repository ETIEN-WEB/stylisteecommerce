@extends('client.layouts.app')
@section('content')
@if (Session::get('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
@if (Session::get('fail'))
<div class="alert alert-danger">
{{ Session::get('fail') }}
</div>
@endif
        <main class="main home">
            <div class="container mb-2">
                <div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						    }">
                            <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #2699D0;" src="{{asset ('frontend/images/demoes/demo1/slider/slide-1.png')}}" width="880" height="428" alt="home-slider">
                                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="text-white mb-0">Find the Boundaries. Push Through!</h4>
                                    <h2 class="text-white mb-0">Summer Sale</h2>
                                    <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                    <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                        Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                                class="align-text-top">199</em>99</b></h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #dadada;" src="{{asset ('frontend/images/demoes/demo1/slider/slide-2.jpg')}}" width="880" height="428" alt="home-slider">
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Over 200 products with discounts</h4>
                                    <h2 class="m-b-3">Great Deals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->
                            <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw  d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #e5e4e2;" src="{{asset ('frontend/images/demoes/demo1/slider/slide-3.jpg')}}" width="880" height="428" alt="home-slider" />
                                <div class="banner-layer text-uppercase appear-animate" data-animation-name="fadeInUpShorter">
                                    <h4 class="m-b-2">Up to 70% off</h4>
                                    <h2 class="m-b-3">New Arrivals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-5 mb-2">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="demo1-shop.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->
                        </div>
                        <!-- End .home-slider -->
                        {{-- <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Featured Products</h2> --}}
                    </div>
                    <!-- End .col-lg-9 -->
                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                        <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                            <h2 class="side-menu-title bg-gray ls-n-25">Nos Categories</h2>
                            <nav class="side-nav">
                                <ul class="menu menu-vertical sf-arrows">
                                    {{-- <li class="active"><a href="demo1.html"><i class="icon-home"></i>Home</a></li> --}}
                                    @foreach ($categories as $categorie)
                                    <li>
                                        <a href="demo1-shop.html" class="sf-with-ul">{!! $categorie->icon !!} {{ $categorie->libelle }}</a>
                                        <div class="megamenu megamenu-fixed-width {{ $categorie->position }}">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="submenu">
                                                        @foreach ($categorie->souscategorie as $souscategorie)
                                                        <li><a href="{{ route('souscategorie', ['souscategorie'=>$souscategorie]) }}">{{ $souscategorie->libelle }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 p-0">
                                                    <div class="menu-banner">
                                                        <figure>
                                                            <img src="{{asset ('frontend/images/menu-banner.jpg')}}" width="192" height="313" alt="Menu banner">
                                                        </figure>
                                                        <div class="banner-content">
                                                            <h4>
                                                                <span class="">UP TO</span><br />
                                                                <b class="">50%</b>
                                                                <i>OFF</i>
                                                            </h4>
                                                            <a href="demo1-shop.html" class="btn btn-sm btn-dark">SHOP
                                                                NOW</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End .megamenu -->
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!-- End .side-menu-container -->
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row --> 
                <section class="rowsection"> 
                <div class="info-boxes-container row row-joined mb-1 font2 bordwhite">
                    <div class="col-lg-12 prodlist d-flex align-items-center">
                        <div class="">
                            <p class="-m -fs20 -elli">Meilleures Offres<span class="-r"> | Noël avant l'heure</span></p>
                        </div>
                        
                            <a href="" class="ml-auto">
                                
                            </a>
                        
                    </div>
                </div>
                <div class="row products-group">
                    @foreach ($produits as $produit)
                    {{-- dd($produit->) --}}
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="{{ route('produit.show', $produit) }}" class="imghegt">
                                    <img src="{{asset ('backend/img-produit/'.$produit->firstImage())}}" alt="{{ $produit->libelle }}">
                                    <img src="{{asset ('backend/img-produit/'.$produit->latestImage())}}" alt="{{ $produit->libelle }}">
                                </a>
                                <!-- End .product-countdown-container -->
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><span class="iconify" data-icon="ant-design:shopping-cart-outlined"></span></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('produit.show', $produit) }}">{{ucfirst(substr($produit->libelle,0,16))}}...</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    {{-- <span class="old-price">$90.00</span> --}}
                                    <span class="product-price">{{ $produit->firstPrice() }} fcfa</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->
                    @endforeach
                </div>
                <!-- End .row products-group -->
            </section>
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->
    
    @endsection
