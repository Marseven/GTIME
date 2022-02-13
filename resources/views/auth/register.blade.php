@extends('layouts.login')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <style>
        .iti {
            width: 100% !important;
        }

    </style>
@endpush

@section('content')

    <!--begin::Aside body-->
    <div class="d-flex flex-column-fluid flex-column flex-center">
        <!--begin::Signup-->
        <div class="login-form login-signin pt-11">
            <!--begin::Form-->
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <!--begin::Title-->
                <div class="text-center pb-8">
                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Inscription</h2>
                    <p class="text-muted font-weight-bold font-size-h4">Entrez vos informations</p>
                </div>
                <!--end::Title-->
                <!--begin::Form group-->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text"
                        value="{{ old('name') }}" placeholder="Nom & Prénom" name="name" autocomplete="off" />
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email"
                        value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="off" />
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text"
                        value="{{ old('phone') }}" placeholder="Téléphone" name="phone" autocomplete="off" />
                    @error('phone')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"
                        value="{{ old('password') }}" id="password-field" placeholder="Mot de Passe" name="password"
                        autocomplete="off" />
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"
                        value="{{ old('password_confirmation') }}" placeholder="Confirmation du Mot de passe"
                        name="password_confirmation" id="password-field-confirmation" autocomplete="off" />
                    <span toggle="#password-field-confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group">
                    <label class="checkbox mb-0">
                        <input type="checkbox" name="agree" required /><a
                            href="{{ asset('/upload/file/CONDITION_D_ACHAT_ET_D_UTILISATION_PREPAIDCARD.pdf') }}"
                            target="_blank">J'accepte les termes & conditions.</a>
                        <span style="margin: 10px;"></span></label>
                </div>
                <!--end::Form group-->
                <!--begin::Form group-->
                <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                    <button type="submit"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">{{ __('Register') }}</button>
                    <button type="cancel"
                        class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Annuler</button>
                </div>
                <br>
                <div class="text-center pt-2 form-group">
                    Vous avez un compte ? <a href="{{ route('login') }}" class="font-weight-bolder mr-3"
                        id="kt_login_signin">Se Connecter</a>
                </div>
                <!--end::Form group-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Signup-->
    </div>
    <!--end::Aside body-->

@endsection

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script language="JavaScript">
        const phoneInputField = document.querySelector("#phonenumber");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ga", "fr", "cm", "us"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

        });

        var KTInputmask = function() {

            // Private functions
            var demos = function() {

                // empty placeholder
                $("#phonenumber").inputmask({
                    "mask": "999999999",
                    placeholder: "077010203" // remove underscores from the input mask
                });

            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();
    </script>

@endpush
