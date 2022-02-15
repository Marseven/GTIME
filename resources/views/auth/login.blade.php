@extends('layouts.login')

@section('content')
    <div id="auth-left">
        <div class="auth-logo">
            <a href="{{ route('home') }}"><img style="height: 2em;" src="{{ asset('images/logo/logo.png') }}" alt="Logo"
                    srcset=""></a>
        </div>
        <h1 class="auth-title">Connexion</h1>
        <p class="auth-subtitle mb-5">Connectez-vous à votre compte</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input name="email" type="email" class="form-control form-control-xl" placeholder="Email"
                    value="{{ old('email') }}">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
            <div class="form-group position-relative has-icon-left mb-4">
                <input name="password" type="password" class="form-control form-control-xl" placeholder="Mot de Passe"
                    value="{{ old('password') }}">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            @error('password')
                <span style="color: red">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Connexion</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p><a class="font-bold" href="{{ route('password.request') }}">Mot de passe Oublié ?</a></p>
        </div>
    </div>
@endsection
