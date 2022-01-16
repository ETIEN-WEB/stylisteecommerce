
<div class="tab-pane fade {{ Route::is('adresse.create')?'show active': '' }} " id="" role="tabpanel"> 
    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"> <a href="javascript:history.go(-1)"><i
        class="icon-left align-middle mr-3 pr-1 cl_blk"></i></a> Ajouter une adresse de livraison</h3>
    <div class="account-content">
        <form id="FormAddAdress" action="{{ route('adresse.store') }}" method="post">
            @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif

            @csrf
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
            </div>
            <div class="form-footer mb-0">
                <button id="BtnAddAdress" class="btn btn-dark mr-0 ">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div><!-- End .tab-pane -->