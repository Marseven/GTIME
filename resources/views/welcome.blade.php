@extends('layouts.default')

@section('content')
    <!-- hero section starts
                                                                                                                                                                                            ================================================== -->
    <section id="home" class="dtr-section">
        <div class="dtr-section bg-white dtr-hero-section-top-padding">
            <div class="container dtr-pb-100">

                <!--== row starts ==-->
                <div class="row">
                    <div class="col-12 col-md-6">

                        <!-- animated hedline starts -->
                        <p class=" dtr-animated-headline font-weight-medium text-left slide color-dark"><span
                                class="dtr-words-wrapper w-100" style="width: 233.547px;">
                                <!-- first line -->
                                <b class="is-visible">G-Time, Gestion de File d'Attente</b>
                                <!-- second line -->
                            </span></p>
                        <!-- animated hedline ends -->

                        <h1>{{ $structure->libelle ?? 'G-Time' }}</h1>
                        <p class="dtr-intro-content color-dark">
                            {{ $structure->description ?? 'Logiciel de Gestion de File d\'attente avec impression de ticket avec QR Code' }}
                        </p>

                        <!-- button starts -->
                        <a class="dtr-btn dtr-btn-small dtr-mt-50" href="#" role="button">
                            <p>
                                <!-- text -->
                                <span class="dtr-btn-text">En Savoir Plus</span>
                            </p>
                        </a>
                        <!-- button ends -->

                    </div>
                    <div class="col-12 col-md-6 small-device-space"> <img src="{{ asset('front/img/file.jpg') }}"
                            alt="image">
                    </div>
                </div>
                <!--== row ends ==-->
            </div>
        </div>
    </section>
    <!-- hero section ends
                                                                                                                                                                                            ================================================== -->


    <!-- services section starts
                                                                                                                                                                                            ================================================== -->
    <section id="services" class="dtr-section dtr-pt-100 dtr-pb-70 bg-white">
        <div class="container">

            <!-- heading starts -->
            <div class="dtr-section-intro text-left dtr-mb-50">
                <div class="dtr-intro-subheading-wrapper">
                    <p class="dtr-intro-subheading">À quel service voulez-vous aller ?</p>
                </div>
                <h2 class="dtr-intro-heading">Simple &amp; Efficace...</h2>
                <p class="dtr-intro-content">Vous pourrez scanner le QR Code présent sur votre ticket <br> afin de suivre en
                    temps réel l'évolution de la file d'attente.</p>
            </div>
            <!-- heading ends -->

            <!--== row 1 starts ==-->
            <div class="row wow fadeInUp" data-wow-delay="0.2s"
                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">

                @foreach ($services as $service)
                    <!-- column 1 starts -->
                    <div class="col-12 col-md-4">
                        <a href=" {{ url('print/' . $service->id) }} " style="color: black;">
                            <div class="dtr-servicebox-wrapper dtr-servicebox-offset-border dtr-box-rounded">
                                <div class="dtr-servicebox dtr-shadow bg-light-orange"> <span
                                        class="dtr-servicebox-number">{{ $service->position }}</span>
                                    <div class="dtr-servicebox-head">
                                        <h3 class="dtr-servicebox-heading">{{ $service->libelle }}</h3>
                                    </div>
                                    <div class="dtr-servicebox-content">{{ $service->description }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- column 1 ends -->
                @endforeach

                @if (empty($services))
                    <p>Pas de Service Disponible pour le Moment !</p>
                @endif

            </div>
            <!--== row 1 ends ==-->

        </div>
    </section>
    <!-- services section ends
                                                                                                                                                                                            ================================================== -->

    <!-- contact section starts
                                                                                                                                                                                            ================================================== -->
    <section id="contact" class="dtr-section dtr-py-100">
        <div class="container">

            <!-- heading starts -->
            <div class="dtr-section-intro text-center dtr-mb-50">
                <div class="dtr-intro-subheading-wrapper">
                    <p class="dtr-intro-subheading">Entrer en Contact</p>
                </div>
                <h2 class="dtr-intro-heading">Comment pouvons-nous vous aider ?</h2>
                <p class="dtr-intro-content">Dites nous bonjour 👋 et nous répondons à toutes vos interrogations</p>
            </div>
            <!-- heading ends -->

            <!--== row starts ==-->
            <div class="row">

                <!-- column 1 starts -->
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="dtr-box-wrapper">
                        <div class="dtr-box dtr-shadow">

                            <!-- form starts -->
                            <form id="contactform" method="POST" action="{{ route('contact') }}">
                                @csrf
                                <fieldset>
                                    <div class="dtr-form-row-2col">
                                        <p class="dtr-form-column">
                                            <label>Votre nom</label>
                                            <input name="name" type="text" placeholder="Nom & Prénom">
                                        </p>
                                        <p class="dtr-form-column">
                                            <label>Votre email</label>
                                            <input name="email" class="required email" type="text" placeholder="Email">
                                        </p>
                                    </div>
                                    <p class="dtr-form-field">
                                        <label>Votre message</label>
                                        <textarea rows="5" name="message" class="required"
                                            placeholder="Message..."></textarea>
                                    </p>
                                    <br><br>
                                    <p class="text-end" style="margin-top: -40px; margin-right: 20px;">
                                        <button class="dtr-btn" type="submit">Envoyer</button>
                                    </p>
                                    <div id="contactresult"></div>
                                </fieldset>
                            </form>
                            <!-- form ends -->

                        </div>
                    </div>
                </div>
                <!-- column 1 ends -->

            </div>
            <!--== row ends ==-->

        </div>
    </section>
    <!-- contact section ends
                                                                                                                                                                                            ================================================== -->
@endsection
