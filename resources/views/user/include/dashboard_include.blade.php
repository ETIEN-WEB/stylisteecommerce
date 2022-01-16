<div class="tab-pane fade {{ Route::is('user.home')?'show active': '' }}" id="dashboard" role="tabpanel">
    <div class="dashboard-content">
        <div class="mb-4"></div>
        <div class="row row-lg">
            <div class="col-12 col-md-6 userinfo">
                <div class="card ml-15">
                    <div class="card-header d-flex">
                     <span>Informations personnelles</span> <a href="" id="urlupdateuserinfo" class="ml-auto cl_blue"> <i class="icon-edit"></i> Modifier </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $user->name }} &nbsp; {{ $user->first_name }}</h5>
                      <p class="card-text mb_9">{{ $user->email }}</p>
                      <p class="card-text">{{ $user->phone }}</p>
                      <a href="" id="urlupdateuserpassword" class="ftsz">Modifier votre mot de passe</a>
                
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card ml-15">
                    <div class="card-header">
                        Adresses
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div><!-- End .row -->
    </div>
</div><!-- End .tab-pane -->

