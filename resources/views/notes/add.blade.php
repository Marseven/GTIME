!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Time</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/rater-js/style.css') }}">

</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ route('home') }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}">
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Donnez Votre Avis</h4>
            </div>
            <form method="POST" action="{{ url('rating/' . $ticket->id) }}">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Donnez une note !</h4>
                            </div>
                            <div class="card-body">
                                <div id="step"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Laissez un commentaire"
                        id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Commentaire</label>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Soumettre</button>
                </div>
            </form>

        </div>
    </div>


    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('vendors/rater-js/rater-js.js') }}"></script>
    <script src="{{ asset('js/extensions/rater-js.js') }}"></script>


</body>

</html>
