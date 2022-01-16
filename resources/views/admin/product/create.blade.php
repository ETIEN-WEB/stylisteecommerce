@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="">
    <link href="{{ asset('backend/css/jquery.multiselect.css')}}" rel="stylesheet">
@endsection

@section('content')

        <!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>eCommerce <span>/ Add Product</span></h3>
                        {{-- <a href="{{ route('admin.creetaille') }}">creetaille</a> --}}
                    </div>
                </div><!-- Page Heading End -->

                <!-- Page Button Group Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="buttons-group">
                        <button class="button button-outline button-primary">Save & Publish</button>
                        <button class="button button-outline button-info">Save to Draft</button>
                        <button class="button button-outline button-danger">Delete Product</button>
                    </div>
                </div><!-- Page Button Group End -->

            </div><!-- Page Headings End -->

            <!-- Add or Edit Product Start -->
            <div class="add-edit-product-wrap col-12">
                
                <div class="add-edit-product-form">
                    <form action="{{route('admin.produit.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4 class="title">A propos du produit</h4>

                        <div class="row">
                            <div class="col-lg-6 col-12 mb-30">
                                <select class="form-control select2 categorieInput" name="categorie">
                                    <option value="">La catégorie du produit</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('categorie'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <select class="form-control select2 souscatgorieInput" name="souscategory_id">
                                    <option value="">La sous catégorie du produit</option>
                                </select>
                                <span class="text-danger">@error('souscategory_id'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-lg-6 col-12 mb-30">
                                <input class="form-control" name="libelle" type="text" placeholder="Nom du produit">
                                <span class="text-danger">@error('libelle'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <select name="matiere_id[]" id="matiere_id" class="form-control select2" multiple="multiple">
                                    @foreach($matieres as $matiere)
                                        <option value="{{$matiere->id}}">{{ucfirst($matiere->libelle)}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('matiere_id'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <select class="form-control select2" name="garantie_id">
                                    <option value="">La garantie du produit</option>
                                    @foreach($garanties as $garantie)
                                        <option value="{{$garantie->id}}">{{ucfirst($garantie->description)}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('garantie_id'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <select class="form-control select2" name="etat">
                                    <option value="status">Status</option>
                                    <option value="publish">active</option>
                                    <option value="draft">desactivé</option>
                                </select>
                                <span class="text-danger">@error('etat'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mbt24">
                                <label for="stock">Description</label>
                                <textarea type="text" name="description" id="description" rows="7" class="form-control">{{old('description')}}</textarea>
                                <span class="text-danger">@error('description'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 mb_12">
                                <label class="mb_10" for="photo">Photo du produit</label>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="coba">
                                </div>
                                <span class="text-danger">@error('fileUpload'){{ $message }}@enderror</span>
                            </div>
                        </div>
                            <fieldset class="mb_28">
                                <legend>Description</legend>
                                <div class="isiaFormRepeater repeat-section" id="test" data-field-id="test_field_id"
                                    data-items-index-array="[1]">
                                    <div class="repeat-items">
                                        <div class="repeat-item mtb10lr0" data-field-index="1">
                                            <div class="row">
                                            <div class="col-md-4">
                                                <select class="repeat-el form-control" name="test_field_id[1][test_sub1]">
                                                    <option value="">Selectinner une taille</option>
                                                    @foreach($tailles as $taille)
                                                        <option value="{{$taille->id}}">{{ucfirst($taille->libelle)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input class=" repeat-el form-control" type="text" name="test_field_id[1][test_sub2]" placeholder="Prix">
                                            </div>
                                            <div class="col-md-4">
                                                <input class=" repeat-el form-control" type="text" name="test_field_id[1][test_sub3]" placeholder="Quantité">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        
                        <!-- Button Group Start -->
                        <div class="row">
                            <div class="justify-content-start col mb_24">
                                <br>
                                <button type="submit" class="button button-outline button-primary mb-10 ml-10 mr-0">Enregistrer</button>
                            </div>
                        </div><!-- Button Group End -->

                    </form>
                </div>

            </div><!-- Add or Edit Product End -->

        </div><!-- Content Body End -->

@endsection
@push('scripts')
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('backend/js/plugins/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/nice-select/niceSelect.active.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/filepond/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/filepond/filepond.active.js') }}"></script>
    <script src="{{asset('backend/js/jquery.multiselect.js') }}"></script>
    <script>
       

        $('#matiere_id').multiselect({
            columns: 2,
            search: true,
            texts: {
                placeholder: 'Choisissez la/les matière(s)..',
            }
        });

    </script>
        <script src="{{asset('backend/js/ckeditor.js')}}"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#description' ), {
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
    
        </script>
    <script>
        $(document).ready(function(){
            //Trouver la ville selon la localité choisie
            $(document).on('change','.categorieInput', function(){
                var val_categorie =$(this).val();
                
                $.ajax({
                	type:'get',
                	url:'{{ route ("admin.findsouscategorie") }}', 
                	data:{'id':val_categorie},
                	success:function(data){
                		console.log(data);
                		$('.souscatgorieInput').empty();
                		$('.souscatgorieInput').append('<option value="">Sous categorie</option>');
                		$.each(data, function (index,subcategory){
                			$('.souscatgorieInput').append('<option value="'+subcategory.id+'">'+subcategory.libelle+'</option>');
                		})
                	},
                	error:function(){
                	}
                });
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset ('backend/spartan_multi_image/dist/js/spartan-multi-image-picker.js') }}"></script>

    <script type="text/javascript">
        $(function(){

            $("#coba").spartanMultiImagePicker({
                fieldName:        'fileUpload[]',
                rowHeight:        '130px',
                groupClassName:   'col-md-2 col-sm-3 col-xs-6',
                directUpload : {
                    status: true,
                    loaderIcon: '<i class="fas fa-sync fa-spin"></i>',
                    //type:'post',
                    //url: "{!!URL::to('addimage_jquer')!!}",
                    additionalParam : {
                        name : 'My Name'
                    },
                    success : function(data, textStatus, jqXHR){
                    },
                    error : function(jqXHR, textStatus, errorThrown){
                    }
                }
            });
        });
    </script>
        
@endpush