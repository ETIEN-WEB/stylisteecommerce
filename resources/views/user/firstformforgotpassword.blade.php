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

    <div class="container reset-password-container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="feature-box border-top-primary">
                    <div class="feature-box-content">
                        <form  class="mb-0" action="{{ route('user.post_forget_password') }}" method="post">
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

                            <p>
                                Veuillez saisir votre adresse mail. Vous recevrez un lien pour créer un nouveau mot de passe par mail. 
                            </p>
                            <div class="form-group mb-0">
                                <label for="reset-email" class="font-weight-normal"> email</label>
                                <input type="email" class="form-control" id="reset-email" name="email" placeholder="Entrer votre adresse mail" value="{{ old('email') }}"
                                    />
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>

                            <div class="form-footer mb-0">
                                <a href="login.html">Cliquez ici pour vous connecter </a>

                                <button type="submit"
                                    class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
                                    réinitialiser le mot de passe 
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