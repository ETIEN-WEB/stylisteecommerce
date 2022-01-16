
@extends('client.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('frontend/css/style.min.css')}}">
@endsection

@section('content')
<main class="main">
	<div class="container login-container">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<div class="row">
					<div class="col-md-6 mx-auto">
						<div class="heading mb-1">
							<h2 class="title">renitialiser votre mot de passe</h2>
						</div>

						<form action="{{ route('user.postResetPassword', $reset_code) }}" method="post">
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
                           
                            <div class="form-group">
                                <input type="email" class="form-input form-wide" id="register_email" name="email" placeholder="Entrer votre email " value="{{ old('email') }}" />
                                <span class="required">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input form-wide" id="register_password" name="password" placeholder="Entrer un  nouveau mot de passe "
								value="{{ old('password') }}" />
                                <span class="required">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input form-wide" id="register_cpassword" name="cpassword" placeholder="Confirmer votre nouveau mot de passe "
								value="{{ old('cpassword') }}" />
                                <span class="required">@error('cpassword'){{ $message }}@enderror</span>
                            </div>
                           
                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Enregistrer
                                </button>
                            </div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main><!-- End .main -->
@endsection
@push('scripts')
    
@endpush		

