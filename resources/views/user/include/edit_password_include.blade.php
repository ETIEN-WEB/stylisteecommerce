<div class="tab-pane fade" id="mp_fget" role="tabpanel"> 
    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
            class="icon-pencil align-middle mr-3 pr-1"></i>Modifier votre mot de passe</h3>
    <div class="account-content">
        <form id="FormInUpdPaasWord" action="{{ route('user.updateuserpassword') }}" method="post">
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
                        <label for="password">Mot de passe actuel </label>
                        <input type="password" class="form-input form-wide" id="password" name="password" value="" />
                        <span class="required error-text password_error"></span>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="npassword"> Nouveau mot de passe </label>
                        <input type="password" class="form-input form-wide" id="npassword" name="npassword" value=""/>
                        <span class="required error-text npassword_error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cpassword"> 
                            Confirmer votre nouveau mot de passe </label>
                        <input type="password" class="form-input form-wide" id="cpassword" name="cpassword" 
                        value="" />
                        <span class="required error-text cpassword_error"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="form-footer mb-0">
                                <button type="submit" id="" class="btn btn-dark mr-0">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="progress_bar"> 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div><!-- End .tab-pane -->