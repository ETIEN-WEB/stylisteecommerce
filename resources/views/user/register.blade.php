
@extends('client.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('frontend/css/style.min.css')}}">
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

	<div class="container login-container">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<div class="row">
					{{-- <div class="col-md-6">
						<div class="heading mb-1">
							<h2 class="title">Login</h2>
						</div>

						<form action="#">
							<label for="login-email">
								Username or email address
								<span class="required">*</span>
							</label>
							<input type="email" class="form-input form-wide" id="login-email" required />

							<label for="login-password">
								Password
								<span class="required">*</span>
							</label>
							<input type="password" class="form-input form-wide" id="login-password" required />

							<div class="form-footer">
								<div class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" id="lost-password" />
									<label class="custom-control-label mb-0" for="lost-password">Remember
										me</label>
								</div>

								<a href="forgot-password.html"
									class="forget-password text-dark form-footer-right">Forgot
									Password?</a>
							</div>
							<button type="submit" class="btn btn-dark btn-md w-100">
								LOGIN
							</button>
						</form>
					</div> --}}
					<div class="col-md-6 mx-auto">
						<div class="heading mb-1">
							<h2 class="title">Créer un compte</h2>
						</div>

						<form action="{{ route('user.create') }}" method="post">
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
                                <input type="text" class="form-input form-wide" id="register_first_name" name="first_name" placeholder="Entrer votre Prénoms " value="{{ old('first_name') }}" />
								<span class="required">@error('first_name'){{ $message }}@enderror</span>
                                
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input form-wide" id="register_name" name="name" placeholder="Entrer votre nom " value="{{ old('name') }}" />
                                <span class="required">@error('name'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input form-wide" id="register_email" name="email" placeholder="Entrer votre email " value="{{ old('email') }}" />
                                <span class="required">@error('email'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input form-wide" id="register_password" name="password" placeholder="Entrer votre mot de passe "
								value="{{ old('password') }}" />
                                    <span class="required">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input form-wide" id="register_phone" name="phone" placeholder="Entrer votre contact (+225) " value="{{ old('phone') }}" />
                                <span class="required">@error('phone'){{ $message }}@enderror</span>
                            </div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="condtion_utilisation" class="custom-control-input" id="condtion_utilisation" />
								<label class="custom-control-label mb-0" for="condtion_utilisation"> J'ai lu et j'accepte les <a href="#"> Conditions générales de vente</a>
									et la Notification sur la Confidentialité et les Cookies de ecom </label>
								<span class="required">@error('condtion_utilisation'){{ $message }}@enderror</span>
							</div>
							
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="accepte_newsletter" class="custom-control-input" id="accepte_newsletter" />
								<label class="custom-control-label mb-0" for="accepte_newsletter"> Je souhaite recevoir la newsletter d'ecom et les meilleurs offres du jour</label>
							</div>
                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Créer votre compte
                                </button>
                            </div>
							<br>
							Avez-vous un compte?<a href="{{ route('user.login') }}"> connectez vous</a>
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

