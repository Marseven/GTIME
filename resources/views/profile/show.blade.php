@extends('layouts.default')

@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">{{ $user->name }}</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Mon Profil</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @if ($user->email_verified_at == null)
                <div style="position: static !important;"
                    class="alert alert-custom alert-notice alert-light-warning fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Veillez vérifier votre adresse mail. cliquez ici pour <a
                            href="{{ url('/email/verification-notification') }}">renvoyer le mail</a>.</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            @endif
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Details-->
                    <div class="d-flex mb-9">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <img src="{{ asset($user->picture ? $user->picture : 'media/users/blank.png') }}"
                                    alt="image" />
                            </div>
                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest">{{ $user->name }}</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between flex-wrap mt-1">
                                <div class="d-flex mr-3">
                                    <a href="#"
                                        class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $user->name }}</a>
                                    @if ($user->email_verified_at != null)
                                        <a href="#">
                                            <i class="flaticon2-correct text-success font-size-h5"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="my-lg-0 my-3">
                                    <a href="{{ url('/user/' . $user->id) }}"
                                        class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-3">Modifier</a>
                                    <a href="{{ url('/userpassword/' . $user->id) }}"
                                        class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase mr-3">Réinitialiser
                                        le mot de passe</a>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap justify-content-between mt-1">
                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                    <div class="d-flex flex-wrap mb-4">
                                        <a href="#"
                                            class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{ $user->email }}</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center w-25 flex-fill float-right mt-lg-12 mt-8">

                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <div class="separator separator-solid"></div>
                    <!--begin::Items-->
                    <div class="d-flex align-items-center flex-wrap mt-8">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <a href="{{ url('/list-cards') }}">
                                <span class="mr-4">
                                    <i class="flaticon-squares-4 display-4 text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Carte Prépayé</span>
                                    <span class="font-weight-bolder font-size-h5">{{ $cards }}</span>
                                </div>
                            </a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <a href="{{ route('payments') }}">
                                <span class="mr-4">
                                    <i class="flaticon-coins display-4 text-muted font-weight-bold"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Montant des Recharges</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        {{ number_format($payments, 0, ',', ' ') }} <span
                                            class="text-dark-50 font-weight-bold">XAF</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">{{ $request_cards }} Demandes
                                    de
                                    cartes</span>
                                <a href="{{ url('/list-request-card') }}" class="text-primary font-weight-bolder">Voir
                                    Plus</a>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">Mes Requêtes</span>
                                <a href="{{ url('/list-queries') }}" class="text-primary font-weight-bolder">Voir
                                    Plus</a>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--begin::Items-->
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Recharges</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">demandes de recharges de cartes
                                    prépayées</span>
                            </h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2 pb-0 mt-n3">
                            <div class="tab-content mt-5" id="myTabTables11">

                                <!--begin::Tap pane-->
                                <div class="tab-pane fade show active" id="kt_tab_pane_11_2" role="tabpanel"
                                    aria-labelledby="kt_tab_pane_11_2">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                                <tr>
                                                    <th class="p-0 w-40px"></th>
                                                    <th class="p-0 min-w-200px"></th>
                                                    <th class="p-0 min-w-100px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($refills as $refill)
                                                    <tr>
                                                        <td class="pl-0 py-4">
                                                            <div class="symbol symbol-50 symbol-light">
                                                                <span class="symbol-label">
                                                                    <img src="{{ asset('media/logos/icon.png') }}"
                                                                        class="h-50 align-self-center" alt="" />
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $refill->number_card }}</a>
                                                        </td>
                                                        <td class="text-right">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ number_format($refill->amount_refill, 0, ',', ' ') }}
                                                                XAF</span>
                                                            @php
                                                                $status_pay = App\Http\Controllers\Controller::status($list_payments[$refill->id] ?? '');
                                                            @endphp
                                                            @if ($status_pay)
                                                                <span class="text-muted font-weight-bold"><span
                                                                        class="label label-lg label-light-{{ $status_pay['type'] }} label-inline">{{ $status_pay['message'] }}</span></span>
                                                            @endif
                                                        </td>
                                                        @php
                                                            $status = App\Http\Controllers\Controller::status($refill->status);
                                                        @endphp
                                                        <td class="text-right">
                                                            <span
                                                                class="label label-lg label-light-{{ $status['type'] }} label-inline">{{ $status['message'] }}</span>
                                                        </td>
                                                        <td class="text-right pr-0">
                                                            @if ($refill->status != 0 && $refill->status != 11 && $refill->status != 12)
                                                                <a href="{{ url('invoice/' . $refill->id) }}"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    title="Simulation">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            @else
                                                                <a href="{{ url('simu/' . $refill->id) }}"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    title="Simulation">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="{{ url('refill/' . $refill->id) }}"
                                                                    class="btn btn-sm btn-clean btn-icon" title="Edit">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-sm btn-clean btn-icon"
                                                                    title="Delete">
                                                                    <span class="svg-icon svg-icon-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24">
                                                                                </rect>
                                                                                <path
                                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                    fill="#000000" fill-rule="nonzero">
                                                                                </path>
                                                                                <path
                                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                    fill="#000000" opacity="0.3"></path>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tap pane-->

                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

@endsection
