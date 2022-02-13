@extends('layouts.login')

@section('content')

    <div id="auth-left">
        <div class="auth-logo">
            <a href="{{ route('home') }}"><img style="height: 2em;" src="{{ asset('images/logo/logo.png') }}" alt="Logo"
                    srcset=""></a>
        </div>
        <h1 class="auth-title">Mot de passe oublié ?</h1>
        <p class="auth-subtitle mb-5">Entrez votre adresse mail pour réinitialiser votre mot de passe.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" placeholder="Email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Envoyer</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Vous avez un compte ? <a href="{{ route('login') }}" class="font-bold">Se
                    Connecter/a>.
            </p>
        </div>
    </div>

@endsection
