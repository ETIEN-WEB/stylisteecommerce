<div class="tab-pane fade {{ Route::is('user.commande.index')?'show active': '' }}" id="order" role="tabpanel">
    <div class="order-content">
        <h3 class="account-sub-title d-none d-md-block"><i
                class="sicon-social-dropbox align-middle mr-3"></i>Mes Commandes</h3>
        <div class="order-table-container table-responsive text-center">
            @php
                $increment = 1;
            @endphp
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                                                            
                    <th scope="col">N°</th>
                    <th scope="col">nb Prod</th>
                    <th scope="col">Livraison</th>
                    <th scope="col">Frais</th>
                    <th scope="col">paiement</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Effectué le</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($commandes as $commande)
                  <tr>
                    <th scope="row">{{ $increment }}</th>
                    <td>{{ $commande->nbproduit() }}</td>
                    <td>{{ $user->villelivraison() }}</td>
                    <td>{{ $commande->frais }}</td>
                    @if ($commande->modepaiement == 'cash')
                    <td>payer cash</td>
                    @else
                    <td>payement en ligne</td>
                    @endif
                    <td>
                        @if($commande->status==1)
                            <span class="text-warning">En Attente</span>
                        @elseif($commande->status==2)
                            <span class="text-success">Validé</span>
                        @elseif($commande->status==3)
                            <span class="text-success">Livré</span>
                        @elseif($commande->status==4)
                            <span class="text-danger">Annuler</span>
                        @else
                        @endif
                    </td>
                    <td>{{ date('d/m/Y',strtotime($commande->datecommande)) }}</td>
                    <td>{{number_format($commande->total,0,',','.')}} F</td>
                    <td>
                        <strong>
                        <a href="{{route('user.commande.show', ['commande'=>$commande, 'increment'=>$increment])}}">Voir</a>
                        </strong>
                    </td>
                  </tr>
                  @php
                      $increment += $increment;
                  @endphp
                  @empty
                        <div> Vous n'avez aucune commande </div>
                  @endforelse
                </tbody>
            </table>

            {{-- <a href="category.html" class="btn btn-dark">Go Shop</a> --}}
        </div>
    </div>
</div><!-- End .tab-pane -->