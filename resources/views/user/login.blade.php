
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
							<h2 class="title">Se connecter</h2>
						</div>

						<form action="{{ route('user.check') }}" method="post">
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
                                <input type="password" class="form-input form-wide" id="register_password" name="password" placeholder="Entrer votre mot de passe "
								value="{{ old('password') }}" />
                                <span class="required">@error('password'){{ $message }}@enderror</span>
                            </div>
                           
                            <div class="form-footer">
								<div class="custom-control custom-checkbox mb-0">
									<input type="checkbox" name="remember_me" class="custom-control-input" id="remember_me" {{ old('remember') ? 'checked' : '' }}/>
									<label class="custom-control-label mb-0" for="remember_me">Rester connecté</label>
								</div>

								<a href="{{ route('user.firstformforgotpassword') }}"
									class="forget-password text-dark form-footer-right">mot de passe oublié ?
								</a>
							</div>

						
                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-dark btn-md w-100 mr-0">
                                    Se connecter
                                </button>
                            </div>
							<br>
							Vous n'avez pas de compte<a href="{{ route('user.register') }}"> créer un compte</a>
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

