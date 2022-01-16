
<div class="tab-pane fade" id="info" role="tabpanel"> 
    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
            class="icon-user-2 align-middle mr-3 pr-1"></i>Informations personnelles</h3>
    <div class="account-content">
        <form id="FormInfoPerso" action="{{ route('user.updateuserinfo', $user) }}" method="post">
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
                        <input type="text" class="form-input form-wide" id="first_name" name="first_name" value="{{ $user->first_name }}" />
                        <span class="required" id="first_name_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"> nom </label>
                        <input type="text" class="form-input form-wide" id="name" name="name" value="{{  $user->name }}" />
                        <span class="required" id="name_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone"> contact </label>
                        <input type="text" class="form-input form-wide" id="phone" name="phone" 
                        value="{{ $user->phone }}" />
                            <span class="required" id="phone_error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"> email </label>
                        <input type="email" disabled class="form-input form-wide" id="email" value="{{ $user->email }}" />
                    
                    </div>
                </div>
            </div>
            <div class="form-footer mb-0">
                <button id="BtnInfoPerso" class="btn btn-dark mr-0">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div><!-- End .tab-pane -->