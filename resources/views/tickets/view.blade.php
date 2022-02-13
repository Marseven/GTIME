<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Time - Mon Ticket</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">


    <!-- FAVICON FILES -->
    <link rel="shortcut icon" href="{{ asset('images/logo/ico-gt.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route('home') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route('home') }}">
                <img style="height: 2em;" src="{{ asset('images/logo/logo.png') }}">
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2 class="card-title">Mon Ticket</h2>
            </div>

            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="pricing">
                        <div class="row align-items-center">
                            <div class="col-md-12 px-0">
                                <div class="card card-highlighted">
                                    <div class="card-header text-center">
                                        <h4 class="card-title">Ticket en cours de traitement</h4>
                                        <p></p>
                                    </div>
                                    <h1 class="price text-white">{{ $ticket_pending != null ? $ticket_pending->numero : $ticket->numero }}</h1>
                                    <p class="price text-white text-center">Nombre de tickets à traiter : {{ $ticket_restant }}</p>

                                    <div class="card-footer">
                                        <button class="btn btn-outline-white btn-block"> Mon numéro :
                                            {{ $ticket->numero }} - Heure d'impression :
                                            {{ $heure }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</body>

</html>
