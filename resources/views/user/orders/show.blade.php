@extends('client.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset ('frontend/css/style.min.css')}}">
@endsection

@section('content')

<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container account-container custom-account-container">
        <div class="row">
            @include('user.dashboard_sidbar')
            <div class="col-lg-9 order-lg-last order-1 tab-content">

            
                <div class="tab-pane fade" id="download" role="tabpanel">
                    <div class="download-content">
                        <h3 class="account-sub-title d-none d-md-block"><i
                                class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
                        <div class="download-table-container">
                            <p>No downloads available yet.</p> <a href="category.html"
                                class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->
            
                <div class="tab-pane fade" id="address" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mb-1"><i
                            class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
                    <div class="addresses-content">
                        <p class="mb-4">
                            The following addresses will be used on the checkout page by
                            default.
                        </p>
            
                        <div class="row">
                            <div class="address col-md-6">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">Billing address</h4>
                                </div>
            
                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>
            
                                <a href="#billing" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>
            
                            <div class="address col-md-6 mt-5 mt-md-0">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">
                                        Shipping address
                                    </h4>
                                </div>
            
                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>
            
                                <a href="#shipping" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->
            
                <div class="tab-pane fade" id="edit" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                            class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
                    <div class="account-content">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-name">First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" placeholder="Editor"
                                            id="acc-name" name="acc-name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-lastname">Last name <span
                                                class="required">*</span></label>
                                        <input type="text" class="form-control" id="acc-lastname"
                                            name="acc-lastname" required />
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group mb-2">
                                <label for="acc-text">Display name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="acc-text" name="acc-text"
                                    placeholder="Editor" required />
                                <p>This will be how your name will be displayed in the account section and
                                    in
                                    reviews</p>
                            </div>
            
            
                            <div class="form-group mb-4">
                                <label for="acc-email">Email address <span class="required">*</span></label>
                                <input type="email" class="form-control" id="acc-email" name="acc-email"
                                    placeholder="editor@gmail.com" required />
                            </div>
            
                            <div class="change-password">
                                <h3 class="text-uppercase mb-2">Password Change</h3>
            
                                <div class="form-group">
                                    <label for="acc-password">Current Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control" id="acc-password"
                                        name="acc-password" />
                                </div>
            
                                <div class="form-group">
                                    <label for="acc-password">New Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control" id="acc-new-password"
                                        name="acc-new-password" />
                                </div>
            
                                <div class="form-group">
                                    <label for="acc-password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="acc-confirm-password"
                                        name="acc-confirm-password" />
                                </div>
                            </div>
            
                            <div class="form-footer mt-3 mb-0">
                                <button type="submit" class="btn btn-dark mr-0">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->

                {{-- @include('user.adresse.include.edit_include') 
                <!-- End .tab-pane --> --}}
                @include('user.orders.include.show_include')  
                <!-- End .tab-pane -->
                @include('user.include.user_info_include') 
                <!-- End .tab-pane -->
                @include('user.include.edit_password_include') 
                <!-- End .tab-pane -->
                @include('user.include.dashboard_include') 
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="billing" role="tabpanel">
                    <div class="address account-content mt-0 pt-2">
                        <h4 class="title">Billing address</h4>
            
                        <form class="mb-2" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div>
            
                            <div class="select-custom">
                                <label>Country / Region <span class="required">*</span></label>
                                <select name="orderby" class="form-control">
                                    <option value="" selected="selected">British Indian Ocean Territory
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>
            
                            <div class="form-group">
                                <label>Street address <span class="required">*</span></label>
                                <input type="text" class="form-control"
                                    placeholder="House number and street name" required />
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)" required />
                            </div>
            
                            <div class="form-group">
                                <label>Town / City <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-group">
                                <label>State / Country <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-group">
                                <label>Postcode / ZIP <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-group mb-3">
                                <label>Phone <span class="required">*</span></label>
                                <input type="number" class="form-control" required />
                            </div>
            
                            <div class="form-group mb-3">
                                <label>Email address <span class="required">*</span></label>
                                <input type="email" class="form-control" placeholder="editor@gmail.com"
                                    required />
                            </div>
            
                            <div class="form-footer mb-0">
                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-dark py-4">
                                        Save Address
                                    </button>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->
            
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <div class="address account-content mt-0 pt-2">
                        <h4 class="title mb-3">Shipping Address</h4>
            
                        <form class="mb-2" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div>
            
                            <div class="select-custom">
                                <label>Country / Region <span class="required">*</span></label>
                                <select name="orderby" class="form-control">
                                    <option value="" selected="selected">British Indian Ocean Territory
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>
            
                            <div class="form-group">
                                <label>Street address <span class="required">*</span></label>
                                <input type="text" class="form-control"
                                    placeholder="House number and street name" required />
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)" required />
                            </div>
            
                            <div class="form-group">
                                <label>Town / City <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-group">
                                <label>State / Country <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-group">
                                <label>Postcode / ZIP <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>
            
                            <div class="form-footer mb-0">
                                {{-- <div class="form-footer-right">
                                    <button type="submit" class="btn btn-dark py-4">
                                        Save Address
                                    </button>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
@endsection
@push('scripts')
<script>
    
    $(document).ready(function(){
        $("#BtnInfoPerso").on('click', function(e){
            e.preventDefault();
            var first_name = $('#first_name').val();
            var name = $('#name').val();
            var phone = $('#phone').val();
            var FormInfoPerso = $("#FormInfoPerso");

            var checkform = true;
            if (first_name == '') {
                $('#first_name_error').text('champ requis');
                checkform = false;
            } else {
                $('#first_name_error').text('');
            }
            if (name == '') {
                $('#name_error').text('champ requis');
                checkform = false;
            } else {
                $('#name_error').text('');
            }
            if (phone == '') {
                $('#phone_error').text('champ requis');
                checkform = false;
            }else {
            $('#phone_error').text('');
            }
            if (checkform) {
            FormInfoPerso.submit();
            }
        });


        $("#urlupdateuserinfo").on('click', function(e){
            e.preventDefault();
            $('.list a[href="#info"]').tab('show');	
        });
        $("#urlupdateuserpassword").on('click', function(e){
            e.preventDefault();
            $('.list a[href="#mp_fget"]').tab('show');	
        });

        $('form#FormInUpdPaasWord').on('submit',function (e){
            e.preventDefault();
            var msg = $('.all-notify');
            var progress_bar =$('.progress_bar');
            progress_bar.html(`
            <div class="progress mt2rem">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                    role="progressbar" aria-valuenow="200" aria-valuemin="0" aria-valuemax="200"
                    style="width: 100%">
                </div>
            </div>
            `);

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 0 ){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                            progress_bar.html('');
                        });
                    }else if(data.status == 1) {
                        document.getElementById('FormInUpdPaasWord').reset();
                        msg.text(data.msg);
                        progress_bar.html('');
                        msg.show();
                        setTimeout(hideMsg, 3500);
                        function hideMsg(){
                            //msg.text(data.msg);
                            msg.hide()
                        }
                            
                    } else if(data.status == 2) {
                        //console.log(data.msg);
                        msg.css('background-color', 'red');
                        msg.text(data.msg);
                        progress_bar.html('');
                        msg.show();
                        setTimeout(hideMsg, 3500);
                        function hideMsg(){
                            //msg.text(data.msg);
                            msg.hide()
                        }
                    }
                }
            });
        });

    
        //Trouver la ville selon la localité choisie
        $(document).on('click','.type_ville', function(){
            var name_ville =$(this).val();
            var select_villes =$('#select_villes');
            $.ajax({
                type:'get',
                url:'{{ route ("findville") }}', 
                data:{'id':name_ville},
                success:function(data){
                    //console.log(data);
                    $('.Villes').empty();
                    select_villes.show();
                    $('.Villes').append('<option value="">Villes</option>');
                    $.each(data, function (index,subcategory){
                        $('.Villes').append('<option value="'+subcategory.id+'">'+subcategory.libelle+'</option>');
                    })
                },
                error:function(){
                }
            });
        });

        
        
        
        $("#BtnEditAdress").on('click', function(e){
            e.preventDefault();
            var first_name = $('#first_name').val();
            var name = $('#name').val();  
            var contact1 = $('#contact1').val();
            var adresse_detail = $('#adresse_detail').val();
            var localites_val = $('#localites_val').val();
            var ville_val = $('#ville_val').val();
            var FormEditAdress = $("#FormEditAdress");
            
            var checkform = true;
            if (first_name == '') {
                $('.first_name_error').text('champ requis');
                checkform = false;
            } else {
                    $('.first_name_error').text('');
            }
            if (name == '') {
                $('.name_error').text('champ requis');
                checkform = false;
            } else {
                    $('.name_error').text('');
            }
            if (contact1 == '') {
                $('.contact1_error').text('champ requis');
                checkform = false;
            } else {
                    $('.contact1_error').text('');
            }
            if (adresse_detail == '') {
                $('.adresse_detail_error').text('champ requis');
                checkform = false;
            } else {
                    $('.adresse_detail_error').text('');
            }

            if (localites_val == '') {
                $('.type_ville_error').text('champ requis');
                checkform = false;
            } else {
                $('.type_ville_error').text('');
            }
            if (ville_val == '') {
                $('.ville_error').text('champ requis');
                checkform = false;
            } else {
                $('.ville_error').text('');
            }
            if (checkform) {
            FormEditAdress.submit();
            }
        });



    });
</script>
    
@endpush

		