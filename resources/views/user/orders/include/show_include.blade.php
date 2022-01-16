<div class="tab-pane fade {{ Route::is('user.commande.show')?'show active': '' }}" id="order" role="tabpanel">
    <div class="order-content">
        <h3 class="account-sub-title d-none d-md-block"><i
                class="sicon-social-dropbox align-middle mr-3"></i>Détail de la commande N° # {{$commande->id}}</h3>
        <div class="order-table-container table-responsive text-center">
            {{-- @php
                $increment = 1;
            @endphp --}}
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Taille</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">P.U</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($commande->descriptions as $description)
                  <tr>
                    <th scope="row">
                        <a href="#" class="detailcmd">
                            <img src="{{asset ('backend/img-produit/'.$description->produit->firstImage())}}" alt="{{ $description->produit->libelle }}" title="{{$description->produit->libelle}}">
                        </a>
                    </th>

                    <td>{{ $description->produit->libelle }}</td>
                    <td>{{ $description->pivot->taille }}</td>
                    <td>{{ $description->pivot->quantite }}</td>
                    <td>{{ $description->pivot->prix }}</td>
                    <td>{{ number_format($description->pivot->quantite * $description->pivot->prix, ) }}f cfa</td>
                    <td>
                        @if($commande->status==1)
                        <a href="{{route('reviews.create',['produit'=>$description->produit]) }}" title="Veuillez commenter le produit" class="text-success"><i class="fa fa-check fa-2x"></i>commenter</a>
                        @endif
                    </td>
                  </tr>
                  {{-- @php
                      $increment += $increment;
                  @endphp --}}
                  @empty
                        <div> Vous n'avez aucune commande </div>
                  @endforelse
                </tbody>
            </table>

            {{-- <a href="category.html" class="btn btn-dark">Go Shop</a> --}}
        </div>
    </div>
</div><!-- End .tab-pane -->