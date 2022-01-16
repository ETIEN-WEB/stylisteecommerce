<table class="table table-mini-cart">
    <thead>
        <tr>
            <th colspan="2">Produits</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cart_data as $data)
        <tr>
            <td class="product-col">
                <img src="{{asset ('backend/img-produit/'.$data['item_image'])}}" class="" height="60" width="60" alt="">
                <h3 class="product-title">
                    {{ $data['item_name'] }}
                    <div class="Qty"> quantité : {{ $data['item_quantity'] }}</div>
                    @if ($data['prod_size'] != 'autre')
                    <div class="Taill"> Taille : {{ $data['prod_size'] }}</div>
                    @endif
                </h3>
            </td>
            <td class="price-col">
                <span>{{ number_format($data['item_price'], ) }}f cfa</span>
            </td>
        </tr>
        @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr class="cart-subtotal">
            <td class="tx_al_lft">
                <h4 class="mb1rm">Sous-total</h4> 
                <h4>{{ number_format($total,) }}f cfa</h4>
            </td>
           
        </tr>
        <tr class="order-shipping">
            <td class="text-left" colspa="2">
                <h4 class="m-b-sm mb1rm">Frais de livraison et droit de timbre</h4>
                @php
                    $frais = $user->adressedefault()->ville->livraison->frais;
                @endphp
                <h4 class="frais_livraison mb1rm">
                    {{ number_format($frais,) }} f cfa
                </h4>
                <!-- End .form-group -->
            </td>
        </tr>
        <tr class="order-total">
            <td class="tx_al_lft">
                <h4 class="mb1rm">Total Commande</h4>
                <h4 class="total-price"><span>{{ number_format($total+$frais,) }} f cfa</span></h4>
            </td>
        </tr>
    </tfoot>
</table>