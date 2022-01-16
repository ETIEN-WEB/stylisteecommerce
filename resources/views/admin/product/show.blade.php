@extends('client.layouts.app')


    @section('style')
    <!-- START Fancy css -->
    <link rel="stylesheet" href="{{asset ('frontend/css/tailwind.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.12/dist/fancybox.css">
    <style>
        #mainCarousel {
        width: 300px;
        height: 325px;
        margin: 0 auto 1rem auto;

        --carousel-button-color: #170724;
        --carousel-button-bg: #fff;
        --carousel-button-shadow: 0 2px 1px -1px rgb(0 0 0 / 20%),
            0 1px 1px 0 rgb(0 0 0 / 14%), 0 1px 3px 0 rgb(0 0 0 / 12%);

        --carousel-button-svg-width: 20px;
        --carousel-button-svg-height: 20px;
        --carousel-button-svg-stroke-width: 2.5;
        }

        #mainCarousel .carousel__slide {
        width: 100%;
        padding: 0;
        }

        #mainCarousel .carousel__slide img{
            cursor: pointer;
        }

        #mainCarousel .carousel__button.is-prev {
        left: -1.5rem;
        }

        #mainCarousel .carousel__button.is-next {
        right: -1.5rem;
        }

        #mainCarousel .carousel__button:focus {
        outline: none;
        box-shadow: 0 0 0 4px #A78BFA;
        }

        #thumbCarousel .carousel__slide {
        opacity: 0.5;
        padding: 0;
        margin: 0.25rem;
        width: 96px;
        height: 64px;
        }

        #thumbCarousel .carousel__slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
        cursor: pointer;
        }

        #thumbCarousel .carousel__slide.is-nav-selected {
        opacity: 1;
        }
    </style>
  <!-- END Fancy css --> 
    @endsection

    @section('content')
        <main class="main">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo1.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Produits</a></li>
                    </ol>
                </nav>
                <div class="product-single-container product-single-default">
                    {{-- <div class="cart-message d-none">
                        <strong class="single-cart-notice">“ Men Black Sports Shoes ”</strong>
                        <span>has been added to your cart.</span> 
                    </div> --}}

                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                              <div id="mainCarousel" class="carousel w-10/12 max-w-5xl mx-auto">
                                @foreach ($produit->images as $img)
                                <div
                                    class="carousel__slide"
                                    data-src="{{ asset('backend/img-produit/'.$img->libelle)}}"
                                    data-fancybox="gallery"
                                    >
                                  <img src="{{ asset('backend/img-produit/'.$img->libelle)}}" />
                                </div>
                                @endforeach 
                              </div>
                              <div id="thumbCarousel" class="carousel max-w-xl mx-auto">
                                @foreach ($produit->images as $img)
                                    <div class="carousel__slide">
                                    <img class="panzoom__content" src="{{ asset('backend/img-produit/'.$img->libelle)}}" />
                                    </div>
                                @endforeach
                              </div>
                        </div> 
                        <!-- End .product-single-gallery --> {{-- ucfirst(substr($produit->libelle,0,16)) --}}
                        <div class="col-lg-7 col-md-6 product-single-details"> 
                            <h1 class="product-title">{{ ucfirst($produit->libelle) }}</h1>
                            
                            <div class="ratings-container evaluation">
                                <div class="etoile espace">
                                    {!! $produit->etoile() !!}
                                </div>
                                {{-- <div class="product-ratings">
                                    <span class="ratings" style="width:60%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div> --}}
                                <!-- End .product-ratings -->

                                <a href="#" class="rating-link">( 6 Commentaire )</a>
                            </div>
                            <!-- End .ratings-container -->

                            {{-- <hr class="short-divider"> --}}

                            <div class="price-box">
                                {{-- <span class="old-price">$1,999.00</span> --}}
                                <span class="new-price" firstPrice = "{{ $produit->firstPrice() }}" id="prod_price">{{ $produit->firstPrice() }} fcfa</span>
                            </div>
                            <!-- End .price-box -->

                            <ul class="single-info-list">
                                <!---->
                                {{-- <li>
                                    SKU:
                                    <strong>654613612</strong>
                                </li> --}}

                                <li>
                                    Matières:
                                    @foreach ($produit->tailles as $taille)
                                        <strong><a href="#" class="product-category">{{ $taille->libelle }}</a></strong>,
                                    @endforeach
                                </li>
                            </ul>

                            <div class="product-filters-container">
                                <div class="product-single-filter">
                                    <label class="font2">Tailles:</label>
                                    <ul class="config-size-list">
                                        @foreach ($produit->description as $dexcription)
                                        
                                        <li class=""><a href="javascript:;" data-id="" data-url="{{route('findproductprice', ['description'=>$dexcription])}}" class="d-flex taille align-items-center justify-content-center">{{ $dexcription->taill->libelle }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- product-single-filter => cette partie vie est à ne pas supprimer à cause du js --}}
                                <div class="product-single-filter">
                                    {{-- <label></label> --}}
                                    {{-- <a class="font1 text-uppercase clear-btn" id="clearPrice" href="#">Retirer</a> --}}
                                </div>
                                <!---->
                            </div>

                            <div class="product-action">
                                <div class="price-box product-filtered-price">
                                    {{-- <del class="old-price"><span>$286.00</span></del> --}}
                                    <span class="product-price" id="Toprice"></span>
                                </div>

                                <div class="product-single-qty">
                                   
                                    <input class="horizontal-quantity form-control" id="Qtyprod" type="text">
                                </div>
                                <!-- End .product-single-qty -->

                                <a href="javascript:;" data-url="{{route('produit.panier', ['produit'=>$produit])}}" id="addtoPanier" class="btn btn-dark add-cart mr-2" title="Add to Cart">Ajouter au panier</a>

                                {{-- <a href="cart.html" class="btn btn-gray view-cart d-none">Votre panier</a> --}}
                            </div>
                            <div class="text-danger" id="addqtyerror" style="display: none">Vous dévez d'abord choisir une taille </div>
                            <!-- End .product-action -->

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-2">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                </div>
                                <!-- End .social-icons -->

                                <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                        class="icon-wishlist-2"></i><span>Add to
                                        Wishlist</span></a>
                            </div>
                            <!-- End .product single-share -->
                        </div>
                        <!-- End .product-single-details -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                                Information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                <ul>
                                    <li>Any Product types that You want - Simple, Configurable
                                    </li>
                                    <li>Downloadable/Digital Products, Virtual Products
                                    </li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                            <div class="product-size-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('frontend/images/products/single/body-shape.png')}}" alt="body shape" width="217" height="398">
                                    </div>
                                    <!-- End .col-md-4 -->

                                    <div class="col-md-8">
                                        <table class="table table-size">
                                            <thead>
                                                <tr>
                                                    <th>SIZE</th>
                                                    <th>CHEST (in.)</th>
                                                    <th>WAIST (in.)</th>
                                                    <th>HIPS (in.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>XS</td>
                                                    <td>34-36</td>
                                                    <td>27-29</td>
                                                    <td>34.5-36.5</td>
                                                </tr>
                                                <tr>
                                                    <td>S</td>
                                                    <td>36-38</td>
                                                    <td>29-31</td>
                                                    <td>36.5-38.5</td>
                                                </tr>
                                                <tr>
                                                    <td>M</td>
                                                    <td>38-40</td>
                                                    <td>31-33</td>
                                                    <td>38.5-40.5</td>
                                                </tr>
                                                <tr>
                                                    <td>L</td>
                                                    <td>40-42</td>
                                                    <td>33-36</td>
                                                    <td>40.5-43.5</td>
                                                </tr>
                                                <tr>
                                                    <td>XL</td>
                                                    <td>42-45</td>
                                                    <td>36-40</td>
                                                    <td>43.5-47.5</td>
                                                </tr>
                                                <tr>
                                                    <td>XLL</td>
                                                    <td>45-48</td>
                                                    <td>40-44</td>
                                                    <td>47.5-51.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-size-content -->
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                            <table class="table table-striped mt-2">
                                <tbody>
                                    <tr>
                                        <th>Weight</th>
                                        <td>23 kg</td>
                                    </tr>

                                    <tr>
                                        <th>Dimensions</th>
                                        <td>12 × 24 × 35 cm</td>
                                    </tr>

                                    <tr>
                                        <th>Color</th>
                                        <td>Black, Green, Indigo</td>
                                    </tr>

                                    <tr>
                                        <th>Size</th>
                                        <td>Large, Medium, Small</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">
                                <h3 class="reviews-title">Avis des utilisateurs</h3>
                                {{-- <div class="divider"></div> --}}
                                <div class="row">
                                    <div class="col-lg-2 evaluation">
                                        <div class="texte"> Évaluations ({{$produit->reviews->count()}}) </div>
                                        <div class="contour_note">
                                            <div class="note">
                                                {{$produit->note()}}/5
                                            </div>
                                            <div class="etoile espace">
                                                {!! $produit->etoile() !!}
                                            </div>
                                            <p class="stat">
                                                {{$produit->reviews->count()}} avis
                                            </p>
                                        </div>
                                        <div class="contour_each_note">
                                            <ul class="ptxs">
                                                <li class="-df -i-ctr -ptxs -m" aria-hidden="true">5
                                                    <span class="fa fa-stack toil"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    <p class="gynbr">({{$produit->nbByNote(5)}})</p>
                                                    <div class="meter _s -mlm"
                                                            style="background-image:linear-gradient(to right,#e94d05 {{$produit->widthNote(5)}}%,#ededed {{$produit->widthNote(5)}}%);">
                                                    </div>

                                                </li>
                                                <li class="-df -i-ctr -ptxs -m" aria-hidden="true">4
                                                    <span class="fa fa-stack toil"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    <p class="gynbr">({{$produit->nbByNote(4)}})</p>
                                                    <div class="meter _s -mlm" 
                                                    style="background-image:linear-gradient(to right,#e94d05 {{round($produit->widthNote(4),0)}}%,#ededed {{round($produit->widthNote(4),2)}}%);">
                                                    </div>
                                                </li>
                                                <li class="-df -i-ctr -ptxs -m" aria-hidden="true">3
                                                    <span class="fa fa-stack toil"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    <p class="gynbr">({{$produit->nbByNote(3)}})</p>
                                                    <div class="meter _s -mlm" 
                                                    style="background-image:linear-gradient(to right,#e94d05  {{round($produit->widthNote(3),0)}}%,#ededed {{round($produit->widthNote(3),2)}}%);">
                                                    </div>
                                                </li>
                                                <li class="-df -i-ctr -ptxs -m" aria-hidden="true">2
                                                    <span class="fa fa-stack toil"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    <p class="gynbr">({{$produit->nbByNote(2)}})</p>
                                                    <div class="meter _s -mlm" 
                                                    style="background-image:linear-gradient(to right,#e94d05 {{round($produit->widthNote(2),0)}}%,#ededed {{round($produit->widthNote(2),2)}}%);">
                                                    </div>
                                                </li>
                                                <li class="-df -i-ctr -ptxs -m" aria-hidden="true">1
                                                    <span class="fa fa-stack toil"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                                    <p class="gynbr">({{$produit->nbByNote(1)}})</p>
                                                    <div class="meter _s -mlm" 
                                                        style="background-image:linear-gradient(to right,#e94d05 {{round($produit->widthNote(1),0)}}%,#ededed {{round($produit->widthNote(1),2)}}%);">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 evaluation">
                                        <div class="texte"> Commentaire ({{$produit->reviews->count()}}) </div>
                                        @forelse($produit->reviews as $comment)
                                        <div class="contour_commentaire">
                                            <div class="etoile espace">
                                                {!! $comment->etoile() !!}
                                            </div>
                                            <div class="titre">
                                                <h4> {{$comment->titre}}</h4>
                                            </div>
                                            <div class="titre">
                                                {{$comment->commentaire}}
                                            </div>
                                            <div class="titre">
                                                <h5>{{date('d-m-Y',strtotime($comment->created_at))}}</h5>
                                            </div>
                                            <div class="verification">
                                                <h5 class="text-green"><i class="fa fa-check-circle fa-1x"></i> achat achevé</h5>
                                            </div>
                                            <hr class="lign">
                                        </div>
                                        @empty
                                            <div class="text-no-comment">
                                                <h5 class="text-danger mt-5">Pas d'avis pour le moment sur ce produit soyez le premier à commenter.</h5>
                                            </div>
                                        @endforelse
                                    </div>
                                    <!-- .col-lg-9 -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-reviews-content -->
                        </div>
                        <!-- End .tab-pane -->
                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .product-single-tabs -->

                <div class="products-section pt-0">
                    <h2 class="section-title">Related Products</h2>

                    <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-1.jpg')}}" width="205" height="205" alt="product">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-1-2.jpg')}}" width="205" height="205" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>

                                <div class="product-countdown-container">
                                    <span class="product-countdown-title">offer ends in:</span>
                                    <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                    </div>
                                    <!-- End .product-countdown -->
                                </div>
                                <!-- End .product-countdown-container -->
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Black Grey Headset</a>
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
                                    <span class="product-price">$9.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-2.jpg')}}" width="205" height="205" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Battery Charger</a>
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
                                    <span class="product-price">$9.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-3.jpg')}}" width="205" height="205" alt="product">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-3-2.jpg')}}" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Brown Bag</a>
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
                                    <span class="product-price">$9.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-4.jpg')}}" width="205" height="205" alt="product">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-4-2.jpg')}}" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Casual Note Bag</a>
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
                                    <span class="product-price">$9.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-5.jpg')}}" width="205" height="205" alt="product">
                                    <img src="{{ asset('frontend/images/demoes/demo1/products/product-5-2.jpg')}}" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo1-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo1-product.html">Porto Extended Camera</a>
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
                                    <span class="product-price">$9.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .products-slider -->
                </div>
                <!-- End .products-section -->

                <hr class="mt-0 m-b-5" />

                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Featured Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-1.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-1-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Ultimate 3D Bluetooth
                                        Speaker</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-2.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-2-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown Women Casual HandBag</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-3.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-3-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Circled Ultimate 3D Speaker</a>
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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Best Selling Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-4.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-4-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Blue Backpack for the Young -
                                        S</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-5.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-5-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Casual Spring Blue Shoes</a>
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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-6.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-6-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Men Black Gentle Belt</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Latest Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-7.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-7-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men Casual
                                        Glasses</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-8.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-8-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown-Black Men Casual
                                        Glasses</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-9.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-9-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Black Men Casual Glasses</a>
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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                        <h4 class="section-sub-title">Top Rated Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-10.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-10-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Basketball Sports Blue Shoes</a>
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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-11.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-11-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Men Sports Travel Bag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="demo1-product.html">
                                    <img src="{{ asset('frontend/images/products/small/product-12.jpg')}}" width="74" height="74" alt="product">
                                    <img src="{{ asset('frontend/images/products/small/product-12-2.jpg')}}" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="demo1-product.html">Brown HandBag</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->
 @endsection
@push('scripts')
<!-- START Fancy js (zoom prduct image) -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.12/dist/fancybox.esm.js"></script>
<script>
    // Initialise Carousel
    const mainCarousel = new Carousel(document.querySelector("#mainCarousel"), {
    Dots: false,
    });

    // Thumbnails
    const thumbCarousel = new Carousel(document.querySelector("#thumbCarousel"), {
    Sync: {
    target: mainCarousel,
    friction: 0,
    },
    Dots: false,
    Navigation: false,
    center: true,
    slidesPerPage: 1,
    infinite: false,
    });

    // Customize Fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {
    Carousel: {
    on: {
    change: (that) => {
        mainCarousel.slideTo(mainCarousel.findPageForSlide(that.page), {
        friction: 0,
        });
    },
    },
    },
    });
</script>
<!-- END Fancy js (zoom prduct image) -->
<script>
    $(document).ready(function(){
        var a_taille;

        //Trouver le prix  selon la taille choisie
        $(document).on('click','.taille', function(e){
            e.preventDefault();
            a_taille = $(this).html();
            
            var url = $(this).attr('data-url');
            $.ajax({
                type:'get',
                url:url, 
                success:function(data){
                    //console.log(data.prix);
                    $('#prod_price').empty();
                    var price = data.prix; 
                    $('#prod_price').append(Number(price).toLocaleString('de-DE')+' '+'fcfa');

                    var prod_price = $('#prod_price').html();
                    var prod_price = prod_price.replace(' '+'fcfa', '');
                    var prod_price = prod_price.replace('.', '');
                    var Qtyprod = $('#Qtyprod').val();
                    var Tprice = Qtyprod * prod_price;
                    $('#Toprice').empty();
                    $('#Toprice').append(Number(Tprice).toLocaleString('de-DE')+' '+'fcfa');
                    $(".horizontal-quantity").prop('disabled', false);
                },
                error:function(){
                }
            });
        });


        //Retirerla taille choisie
        
        $(document).on('click','#clearPrice', function(e){
            e.preventDefault();
            var firstPrice =$('#prod_price').attr('firstPrice');
            $('#prod_price').empty();
            $('#prod_price').append(firstPrice+' '+'fcfa');
        });

        //Ajouter ou dimunier quantité
        $(document).on('change','#Qtyprod', function(e){
            e.preventDefault();
            var Qtyprod = $(this).val();
            if ( Qtyprod !== null && /^[0-9]+$/.test(Qtyprod) == false) {
                $(this).val('');
                $(this).val(1);
            } 

            Qtyprod = $(this).val();
            var Toprice = $('#Toprice').html();
            var prod_price = $('#prod_price').html();
            var prod_price = prod_price.replace(' '+'fcfa', '');
            var prod_price = prod_price.replace('.', '');
            var Tprice = Qtyprod * prod_price;
            $('#Toprice').empty();
            $('#Toprice').append(Number(Tprice).toLocaleString('de-DE')+' '+'fcfa');
        });

        
        //Ajuter au panier
        $(document).on('click','#addtoPanier', function(e){
            e.preventDefault();
            var Qtyprod = $('#Qtyprod').val();
            var url = $(this).attr('data-url');
            var msg = $('.all-notify');
            //alert(Qtyprod);
            $.ajax({
                type:'get',
                data:{'taille':a_taille, 'Qte':Qtyprod},
                url:url, 
                success:function(data){
                    // $('span.cart-count').html('');
                    // $('span.cart-count').html(data.nb_aticle);
                    msg.text(data.msg);
                    msg.show();
                    setTimeout(hideMsg, 3500);
                    function hideMsg(){
                        //msg.text(data.msg);
                        msg.hide()
                    }
                },
                error:function(){
                }
            });
        });


    });
</script>

@endpush

        