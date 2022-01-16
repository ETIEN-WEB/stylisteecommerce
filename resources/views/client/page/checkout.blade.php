@extends('client.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset ('frontend/css/style.min.css')}}">
@endsection
@section('content')
<main class="main main-test">
    <div class="container checkout-container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="checkout.html">Finaliser votre commande</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-7">
                @if ($user->adressedefault())
                <form id="CreateOrder" action="{{ route('commande.store') }}" method="post">
                    @csrf
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title"> votre Adresse de livraison</h2>
                            <input type="hidden" name="adresse_id" class="form-control" value="{{$user->adressedefault()->id}}" />
                            <strong> Livraison à Domicile</strong>
                                <p> Livré entre {{ $user->datedebut() }} et {{ $user->datefin() }} pour {{ number_format($user->fraislivraison(),) }} f cfa </p>
                            
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">Prénoms </label>
                                            <input type="text" class="form-input form-wide" id="first_name" name="first_name" value="{{ (old('first_name'))?old('first_name'):$user->adressedefault()->first_name }}" />
                                            <span class="required first_name_error">@error('first_name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> nom </label>
                                            <input type="text" class="form-input form-wide" id="name" name="name" value="{{  (old('name'))?old('name'):$user->adressedefault()->name }}" />
                                            <span class="required name_error">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact1"> contact1 </label>
                                            <input type="text" class="form-input form-wide" id="contact1" name="contact1" 
                                            value="{{ (old('contact1'))?old('contact1'):$user->adressedefault()->contact1 }}" />
                                            <span class="required contact1_error">@error('contact1'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact2"> contact2 </label>
                                            <input type="text" class="form-input form-wide" id="contact2" name="contact2" 
                                            value="{{ (old('contact2'))?old('contact2'):$user->adressedefault()->contact2 }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="adresse_detail"> Adresse </label>
                                            <input type="text" class="form-input form-wide" id="adresse_detail" name="adresse_detail" value="{{  (old('adresse_detail'))?old('adresse_detail'):$user->adressedefault()->adresse_detail }}" />
                                            <span class="required  adresse_detail_error">@error('adresse_detail'){{ $message }}@enderror</span>
                                        </div> 
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="info_suplementaire"> Information supplémentaire </label>
                                            <input type="text" class="form-input form-wide" id="info_suplementaire" name="info_suplementaire" value="{{  (old('info_suplementaire'))?old('info_suplementaire'):$user->adressedefault()->info_suplementaire }}" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_ville" id=""> Localité </label>
                                            <select id="localites_val" class="form-control type_ville" name="type_ville">
                                                <option value="">Localité</option>
                                                    @foreach ($localites as $localite)
                                                        @if (old('type_ville') != '' &&  old('type_ville') == $localite->id)
                                                            <option value="{{$localite->id}}" selected> {{$localite->libelle}} </option>
                                                        @elseif ($user->adressedefault()->ville->type_ville->id == $localite->id)
                                                            <option value="{{$localite->id}}" selected> {{$localite->libelle}} </option>
                                                        @else
                                                        <option value="{{$localite->id}}"> {{$localite->libelle}} </option>
                                                        @endif
                                                @endforeach 
                                            </select>
                                            <span class="required type_ville_error">@error('type_ville'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="select_villes">
                                            <label for="name"> ville </label>
                                            <select id="ville_val" class="form-control Villes" name="ville">
                                                <option value="{{ (old('ville'))? old('ville'): $user->adressedefault()->ville->id}}"> {{ (old('namvil'))?old('namvil'): $user->adressedefault()->ville->libelle  }}  </option>
                                            </select>
                                            <span class="required ville_error">@error('ville'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-footer mb-0">
                                    <button id="BtnAddAdress" class="btn btn-dark mr-0 ">
                                        Enregistrer
                                    </button>
                                </div> --}}
                            </div>
                        </li>
                    </ul>
                    <ul class="checkout-steps">
                        <li>
                            <!--CREDIT CART PAYMENT-->
                            <h2 class="step-title"> Mode de paiement</h2>
                            <div class="account-content">            
                                <div class="panel panel-info">
                                    <div class="panel-heading"><span><i class="fa fa-lock"></i></span> Payment sécurisé</div>
                                    <div class="panel-body">
                                        <div class="radio-item_1 row mb_8">
                                            <div class="col-md-1">
                                                <input id="mobile1" value="cash" class="chosemethod" checked="" name="paymentmethod" type="radio" data-minimum="50.0">
                                            </div>
                                            <div class="col-md-11">
                                                <label for="mobile1" class="radio-label_1">Cash à la livraison
                                                    <img src="" alt="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="radio-item_1 row mb_8">
                                            <div class="col-md-1">
                                                <input disabled id="cashondelivery1" class="chosemethod" value="mobile money" name="paymentmethod" type="radio" data-minimum="50.0">
                                            </div>
                                            <div class="col-md-11">
                                                <label for="cashondelivery1" class="radio-label_1">Paiement mobile <span>indiponible</span>
                                                    <img src="https://shipping.pankart.store/img/mobile-logo.png" alt=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <button id="BtnCreateOrder" class="btn btn-primary btn-submit-fix mt10">Confirmer ma commande</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CREDIT CART PAYMENT END-->
                        </li>
                    </ul>
                </form>
                @else
                <form id="FormAddAdress" action="{{ route('adresse.store') }}" method="post">
                    @csrf
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title"> Ajouter une adresse de livraison</h2>
                            <div class="account-content">
                                {{-- <input type="hidden" name="via_checkout" class="form-control" value="via_checkout" /> --}}
                                @php
                                Session::put('via_checkout', 'via_checkout');
                                @endphp
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">Prénoms </label>
                                            <input type="text" class="form-input form-wide" id="first_name" name="first_name" value="{{ old('first_name') }}" />
                                            <span class="required first_name_error">@error('first_name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> nom </label>
                                            <input type="text" class="form-input form-wide" id="name" name="name" value="{{  old('name') }}" />
                                            <span class="required name_error">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact1"> contact1 </label>
                                            <input type="text" class="form-input form-wide" id="contact1" name="contact1" 
                                            value="{{ old('contact1') }}" />
                                            <span class="required contact1_error">@error('contact1'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact2"> contact2 </label>
                                            <input type="text" class="form-input form-wide" id="contact2" name="contact2" 
                                            value="{{ old('contact2') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="adresse_detail"> Adresse </label>
                                            <input type="text" class="form-input form-wide" id="adresse_detail" name="adresse_detail" value="{{  old('adresse_detail') }}" />
                                            <span class="required adresse_detail_error">@error('adresse_detail'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="info_suplementaire"> Information supplémentaire </label>
                                            <input type="text" class="form-input form-wide" id="info_suplementaire" name="info_suplementaire" value="{{  old('info_suplementaire') }}" />
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_ville" id=""> Localité </label>
                                            <select id="localites_val" class="form-control type_ville" name="type_ville">
                                                <option value="">Localité</option>
                                                @foreach ($localites as $localite)
                                                <option value="{{$localite->id}}" {{(old('type_ville')==$localite->id)? 'selected':''}}> {{$localite->libelle}} </option>
                                                @endforeach
                                            </select>
                                            <span class="required localites_val_error">@error('type_ville'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="select_villes">
                                            <label for="name"> ville </label>
                                            <select id="ville_val" class="form-control Villes" name="ville">
                                                <option value="{{ (old('ville'))? old('ville'): ''}}"> {{ (old('namvil'))?old('namvil'): 'choisissez d\'abord  une localité'  }}  </option>
                                            </select>
                                            <span class="required ville_val_error">@error('ville'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="current_adresse" class="custom-control-input" id="current_adresse" />
                                            <label class="custom-control-label mb-0" for="current_adresse"> Définir par défaut </label>
                                        </div>
                                    </div>
                                </div> <!-- End row -->
                                <div class="form-footer mb-0">
                                    <button id="BtnAddAdress" class="btn btn-dark mr-0 ">
                                        Enregistrer
                                    </button>
                                </div>
                            </div> <!-- End account-content -->
                        </li>
                    </ul>
                </form>
                @endif
            </div>
            <!-- End .col-lg-8 -->

            <div class="col-lg-5">
                <div class="order-summary">
                    <h2 class="step-title">Votre commande</h2>
                    @if(!empty($cart_data))
                    @if(Cookie::get('shopping_cart'))
                    @php $total="0" @endphp
                    <table class="table table-mini-cart">
                        <thead>
                            <tr>
                                <th colspan="2" class="cl_or">Produits</th>
                            </tr>
                        </thead>
                    </table>
                    @foreach ($cart_data as $data)
                    <div class="row mb10">
                        <div class="product-col col-md-3 col-4">
                            <img src="{{asset ('backend/img-produit/'.$data['item_image'])}}" class="" height="60" width="60" alt="">
                        </div> 
                        <div class="col-md-6 col-8 ml-8">
                            <h3 class="product-title mb5">
                                {{ $data['item_name'] }}
                            </h3>
                            @if ($data['prod_size'] != 'autre')
                            <div class="Taill"> Taille : {{ $data['prod_size'] }}</div>
                            @endif
                        </div> 
                        <div class="col-md-3 col-6">
                            <span>{{ number_format($data['item_price'], ) }}f cfa</span>
                            <div class="Qty"> quantité : {{ $data['item_quantity'] }}</div>
                        </div> 
                        
                    </div>
                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                    @endforeach
                        <div class="row mb10">
                            <div class="col-md-6 col-12">
                                <div class="tx_al_lft">
                                    <h4 class="mb1rm">Sous-total</h4> 
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="">
                                    <h4>{{ number_format($total,) }}f cfa</h4>
                                </div>
                            </div>
                        </div>
                        @if ($user->adressedefault())
                        <div class="row mb10">
                            <div class="col-md-6 col-12">
                                <div class="tx_al_lft">
                                    <h4 class="m-b-sm mb1rm">Frais de livraison et droit de timbre</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="">
                                    <h4 class="frais_livraison mb1rm">
                                        {{ number_format($user->fraislivraison(),) }} f cfa
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row mb10">
                            <div class="col-md-6 col-12">
                                <div class="tx_al_lft">
                                    <h4 class="mb1rm">Total Commande</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="">
                                    <h4 class="total-price"><span>{{ number_format($total+$user->fraislivraison(),) }} f cfa</span></h4>
                                </div>
                            </div>
                        </div>
                        @endif
                        @php
                        Session::put('datacommande', ['total' => $total+$user->fraislivraison(), 'soustotal' => $total, 'villelivraison' => $user->villelivraison() ]);
                        @endphp
                    @endif
                    @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Votre panier est vide.</h4>
                                <a href="{{-- url('collections') --}}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                        Place order
                    </button> --}}
                </div>
                <!-- End .cart-summary -->
            </div>
            <!-- End .col-lg-4 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            //Trouver la ville selon la localité choisie dans le formulaire d'ajout d'adrese
            $(document).on('change','.type_ville', function(){
                var name_ville =$(this).val();
                var select_villes =$('#select_villes');
                $.ajax({
                    type:'get',
                    url:'{{ route ("findville") }}', 
                    data:{'id':name_ville},
                    success:function(data){
                        //console.log(data);
                        $('.Villes').empty();
                        select_villes.show();
                        $('.Villes').append('<option value="">Villes</option>');
                        $.each(data, function (index,subcategory){
                            $('.Villes').append('<option value="'+subcategory.id+'">'+subcategory.libelle+'</option>');
                        })
                    },
                    error:function(){
                    }
                });
            });

            //START---Traiter formulaire ajouter ou modifier adresse puis création de la commande
            $("#BtnCreateOrder").on('click', function(e){
                e.preventDefault();
                var first_name = $('#first_name').val();
                var name = $('#name').val();  
                var contact1 = $('#contact1').val();
                var adresse_detail = $('#adresse_detail').val();
                var localites_val = $('#localites_val').val();
                var ville_val = $('#ville_val').val();
                var CreateOrder = $("#CreateOrder");
                
                var checkform = true;
                if (first_name == '') {
                    $('.first_name_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.first_name_error').text('');
                }
                if (name == '') {
                    $('.name_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.name_error').text('');
                }
                if (contact1 == '') {
                    $('.contact1_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.contact1_error').text('');
                }
                if (adresse_detail == '') {
                    $('.adresse_detail_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.adresse_detail_error').text('');
                }

                if (localites_val == '') {
                    $('.localites_val_error').text('champ requis');
                    checkform = false;
                } else {
                    $('.localites_val_error').text('');
                }
                if (ville_val == '') {
                    $('.ville_val_error').text('champ requis');
                    checkform = false;
                } else {
                    $('.ville_val_error').text('');
                }
                if (checkform) {
                CreateOrder.submit();
                }
            });
            //END---Traiter formulaire ajouter ou modifier adresse puis création de la commande
            
            //START Traiter formulaire ajouter adresse
            $("#BtnAddAdress").on('click', function(e){
                e.preventDefault();
                var first_name = $('#first_name').val();
                var name = $('#name').val();  
                var contact1 = $('#contact1').val();
                var adresse_detail = $('#adresse_detail').val();
                var localites_val = $('#localites_val').val();
                var ville_val = $('#ville_val').val();
                var FormAddAdress = $("#FormAddAdress");
                
                var checkform = true;
                if (first_name == '') {
                    $('.first_name_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.first_name_error').text('');
                }
                if (name == '') {
                    $('.name_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.name_error').text('');
                }
                if (contact1 == '') {
                    $('.contact1_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.contact1_error').text('');
                }
                if (adresse_detail == '') {
                    $('.adresse_detail_error').text('champ requis');
                    checkform = false;
                } else {
                        $('.adresse_detail_error').text('');
                }

                if (localites_val == '') {
                    $('.localites_val_error').text('champ requis');
                    checkform = false;
                } else {
                    $('.localites_val_error').text('');
                }
                if (ville_val == '') {
                    $('.ville_val_error').text('champ requis');
                    checkform = false;
                } else {
                    $('.ville_val_error').text('');
                }
                if (checkform) {
                FormAddAdress.submit();
                }
            });
            //END ---Traiter formulaire ajouter adresse
        });
    </script>
@endpush