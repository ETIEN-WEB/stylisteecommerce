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
                    <h3>eCommerce <span>/ Order List</span></h3>
                </div>
            </div><!-- Page Heading End -->

        </div><!-- Page Headings End -->

        <div class="row">

            <!--Order List Start-->
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-vertical-middle">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>nb Prod</th>
                                <th>Livraison</th>
                                <th>Frais Name</th>
                                <th>paiement</th>
                                <th>Statut</th>
                                <th>Effectué le</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($commandes as $commande)
                            <tr>
                                <td>{{'#'.$commande->id}}</td>
                                <td>{{ $commande->nbproduit() }}</td>
                                <td>{{ $commande->ville_livraison }}</td>
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
                                    <a href="{{ route('admin.commande.show',['commande'=>$commande]) }}">Voir</a>
                                    </strong>
                                </td>
                            </tr>
                            @empty
                                <div> Vous n'avez aucune commande </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Order List End-->

        </div>

    </div><!-- Content Body End -->
@endsection
@push('scripts')
    <script>
        // $(document).ready(function(){
        
        // });
    </script>
        
@endpush