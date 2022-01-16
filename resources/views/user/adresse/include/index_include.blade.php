
<div class="tab-pane fade {{ Route::is('adresse.index')?'show active': '' }}" id="" role="tabpanel">

    <div class="d-flex btnAdresses">
        <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
            class="icon-user-2 align-middle mr-3 pr-1"></i>Vos Adresses de livraison
        </h3>
        <a href="{{ route('adresse.create') }}" class="btn btn-warning btn-sm ml-auto btnadd" > Ajouter une adresse </a>
    </div>
    <div class="dashboard-content">
        <div class="mb-4"></div>
        
        <div class="row row-lg">
            @forelse ($user->adresses as $adresse)
                <div class="col-12 col-md-6">
                    <div class="card ml-15">
                        <div class="card-header">
                            {{ $adresse->first_name }} &nbsp; {{ $adresse->name }}
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">{{ $adresse->adresse_detail }}</h5>
                        <h5 class="card-title">{{ $adresse->ville->libelle }}</h5>
                        <p class="card-text mb_9">{{ $adresse->info_suplementaire }}</p>
                        <p class="card-text ">{{ $adresse->contact1 }} / {{ $adresse->contact2 }}</p>
                        <div class="d-flex updaticon">
                            @if ($adresse->current_adresse == 1)
                            <div>  Adresse par defaut  </div>
                             
                            @else  
                            <div> <a href="{{ route('adresse.defaut',$adresse) }}" class=""> Définir par defaut </a> </div>
                            @endif
                            
                            <div class="ml-auto">
                                <a href="{{ route('adresse.edit',$adresse) }}" title="Modifier"><i class="fas fa-edit styl_orange"></i></a> &nbsp;   
                                @if ($adresse->current_adresse != 1)
                                    <a href="{{ route('adresse.destroy',$adresse) }}" id="delete" title="Supprimer"><i class="fas fa-trash-alt styl_red"></i></a>
                                @endif

                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            @empty
            Vous n'avez pas encore ajouter d'adresse
            @endforelse
        </div><!-- End .row -->
    </div>
</div><!-- End .tab-pane -->