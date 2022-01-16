@extends('client.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset ('frontend/css/style.min.css')}}">
@endsection
@section('content')

<main class="main">
    <div class="container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li class="active">
                <a href="cart.html">Mon panier </a>
            </li>
            {{-- <li>
                <a href="checkout.html">Checkout</a>
            </li>
            <li class="disabled">
                <a href="cart.html">Order Complete</a>
            </li> --}}
        </ul>

        @if(!empty($cart_data))
            @if(Cookie::get('shopping_cart'))
                @php $total="0" @endphp
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="thumbnail-col"></th>
                                        <th class="product-col">Article</th>
                                        <th class="price-col">Prix unitaire</th>
                                        <th class="qty-col">Quantité</th>
                                        <th class="text-right">Sous-total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_data as $data)
                                    <tr class="product-row">
                                        <td>
                                            <figure class="product-image-container">
                                                <a href="" class="product-image">
                                                    <img src="{{asset ('backend/img-produit/'.$data['item_image'])}}" alt="product">
                                                </a>

                                                <a href="#" id="deleteCartProd" data-id="{{ $data['item_id'] }}" class="btn-remove icon-cancel" title="supprimer ce produit"></a>
                                            </figure>
                                        </td>
                                        <td class="product-col">
                                            <h5 class="product-title">
                                                <a href="">{{ $data['item_name'] }}</a>
                                                <strong> Taille: {{ $data['prod_size'] }} </strong>
                                            </h5>
                                        </td>
                                        <td>{{ number_format($data['item_price'], ) }}f cfa</td>
                                        <td>
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" value="{{ $data['item_quantity'] }}" type="text" id="Qtycart" data-url="{{ route('panier.update', ['product_id' => $data['item_id']]) }}">
                                            </div><!-- End .product-single-qty -->
                                        </td>
                                        <td class="text-right"><span class="subtotal-price">{{ number_format($data['item_quantity'] * $data['item_price'], ) }}f cfa</span></td>
                                    </tr>
                                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                    @endforeach
                                </tbody>


                                <tfoot>
                                    <tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>TOTAL PANIER</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{ number_format($total, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="{{ route('checkout') }}" class="btn btn-block btn-dark">Finaliser votre commande
                                    <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            @endif
            @else
            <div class="row">
                <div class="col-md-12 mycard py-5 text-center">
                    <div class="mycards">
                        <h4>Your cart is currently empty.</h4>
                        <a href="{{-- url('collections') --}}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                    </div>
                </div>
            </div>
        @endif
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->

<!-- End .main -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            //Ajouter ou dimunier quantité
            $(document).on('change','#Qtycart', function(e){
                e.preventDefault();
                var Qtycart = $(this).val();
                if ( Qtycart !== null && /^[0-9]+$/.test(Qtycart) == false) {
                    $(this).val('');
                    $(this).val(1);
                } 
                Qtycart = $(this).val();
                var url = $(this).attr('data-url');
                var msg = $('.all-notify');

                $.ajax({
                    type:'get',
                    data:{'Qte':Qtycart},
                    url:url, 
                    success: function (data) {
                        window.location.reload();
                    }
                });
            });

            //Suprimer un produit du panier
            $(document).on('click','#deleteCartProd', function(e){
                e.preventDefault();
                var ProductId = $(this).attr('data-id');
                // alert(ProductId);
                var msg = $('.all-notify');

                $.ajax({
                    type: 'get',
                    data:{'ProductId':ProductId},
                    url:'{{ route("panier.destroy") }}', 
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            });


        });
    </script>
@endpush
