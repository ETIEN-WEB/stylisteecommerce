@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="">
@endsection

@section('content')
    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3>eCommerce <span>/ Details Commande</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row mbn-30">

            <!--Order Details Head Start-->
            <div class="col-12 mb-30">
                <div class="row mbn-15">
                    <div class="col-12 col-md-4 mb-15">
                        <h4 class="text-primary fw-600 m-0">{{'Commande #'.$commande->id}}</h4>
                    </div>
                    <div class="text-left text-md-center col-12 col-md-4 mb-15">
                        <span>
                            Status: 
                            @if($commande->status==1)
                            <span class="badge badge-round badge-warning">En Attente</span>
                            @elseif($commande->status==2)
                            <span class="badge badge-round badge-success">Validé</span>
                            @elseif($commande->status==3)
                            <span class="badge badge-round badge-success">Livré</span>
                            @elseif($commande->status==4)
                            <span class="badge badge-round badge-danger">Annuler</span>
                            @else
                            @endif
                            
                        </span>
                    </div>
                    <div class="text-left text-md-right col-12 col-md-4 mb-15">
                        <p>{{ date('d/m/Y',strtotime($commande->datecommande)) }}</p>
                    </div>
                </div>
            </div>
            <!--Order Details Head End-->

            <!--Order Details Customer Information Start-->
            <div class="col-12 mb-30">
                <div class="order-details-customer-info row mbn-20">
                    <div class="col-md-6">
                        <h4 class="mb-25">Détail client</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Nom & Prénoms</th>
                                    <td>{{ucfirst($user->name.' '.$user->first_name)}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ucfirst($user->email)}}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone</th>
                                    <td>{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">Adresse de livraison</th>
                                </tr>
                                <tr>
                                    <th>Contact 1</th>
                                    <td>{{$commande->contact1}}</td>
                                </tr>
                                @if ($commande->contact2)
                                <tr>
                                    <th>Contact 2</th>
                                    <td>{{$commande->contact2}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Ville livraison</th>
                                    <td>{{$commande->ville_livraison}}</td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td>{{$commande->adresse_detail}}</td>
                                </tr>
                                <tr>
                                    <th>info suplementaire</th>
                                    <td>{{$commande->info_suplementaire}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!--Order Details Customer Information Start-->
            <br>
            <!--Order Details List Start-->
            <div class="col-12 mb-30">
                <h4 class="mb-25">Détail commande</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-vertical-middle">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Produit</th>
                                <th>Taille</th>
                                <th>Quantité</th>
                                <th>P.U</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($commande->descriptions as $description)
                                
                            @empty
                                
                            @endforelse
                            <tr>
                                <td><a href="{{route('produit.show',['produit'=>$description->produit])}}" class="hg_wd_60">
                                    <img src="{{asset ('backend/img-produit/'.$description->produit->firstImage())}}" class="product-image rounded-circle" alt="{{ $description->produit->libelle }}" title="{{$description->produit->libelle}}"> </a>
                                </td>
                                <td><a href="{{route('produit.show',['produit'=>$description->produit])}}">{{ $description->produit->libelle }} </a> </td>
                                <td>{{ $description->pivot->taille }}</td>
                                <td>{{ $description->pivot->quantite }}</td>
                                <td>{{ $description->pivot->prix }}</td>
                                <td>{{ number_format($description->pivot->quantite * $description->pivot->prix, ) }}f cfa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Order Details List End-->

        </div>

    </div><!-- Content Body End -->
@endsection
@push('scripts')
    <script>
        // $(document).ready(function(){
        
        // });
    </script>
        
@endpush