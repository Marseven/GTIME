@extends('layouts.admin')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Gestion des Tickets</h3>
                    <p class="text-subtitle text-muted">Traitement</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Traitement
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            @foreach ($list_service as $service)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $service['service']->libelle }}</h4>
                            <p>{{ $service['service']->description }}</p>
                        </div>
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carouselfade">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/samples/2.png') }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block" style="bottom: 5.5rem;">
                                            <h1 style="color:white; font-size : 15em">
                                                {{ $service['service']->libelle[0] }}{{ $service['last_ticket'] == null ? '-' : $service['last_ticket']->numero }}
                                            </h1>
                                            @if ($service['last_ticket'] != null)
                                                @php
                                                    $status = App\Http\Controllers\Controller::status($service['last_ticket']->status);
                                                @endphp
                                                <p><span
                                                        class="badge badge-{{ $status['type'] }}">{{ $status['message'] }}</span>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($service['last_ticket'] != null)
                                    <a class="carousel-control-prev" href="{{url('admin/next/absent/'.$service['last_ticket']->id)}}" role="button">
                                        <span class="visually-show">Absent</span>
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next" href="{{url('admin/next/do/'.$service['last_ticket']->id)}}" role="button">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-show">Traité</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>


@endsection
