@extends('layouts.login')

@section('content')
    <div id="auth-left">
        <div class="auth-logo">
            <a href="{{ route('home') }}"><img style="height: 2em;" src="{{ asset('images/logo/logo.png') }}" alt="Logo"
                    srcset=""></a>
        </div>
        <h1 class="auth-title">Réinitialiser votre Mot de passe
            oublié</h1>
        <p class="auth-subtitle mb-5">Entrez votre nouveau mot de passe</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input name="email" type="email" class="form-control form-control-xl" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <input value="{{ $token }}" type="hidden" name="token" />
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group position-relative has-icon-left mb-4">
                <input name="password" type="password" class="form-control form-control-xl"
                    placeholder="Nouveau Mot de passe" value="{{ old('password') }}">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            @error('password')
                <span style="color: red">{{ $message }}</span>
            @enderror

            <div class="form-group position-relative has-icon-left mb-4">
                <input name="password_confirmation" type="password" class="form-control form-control-xl"
                    placeholder=">Confirmer le Mot de Passe" value="{{ old('password') }}">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            @error('password')
                <span style="color: red">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Valider</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Vous avez un compte ? <a href="{{ route('login') }}" class="font-bold">Se
                    Connecter</a>.
            </p>
        </div>
    </div>
@endsection
