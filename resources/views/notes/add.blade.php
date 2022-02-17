<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Time</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">


    <!-- FAVICON FILES -->
    <link rel="shortcut icon" href="{{ asset('images/logo/ico-gt.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/rating.js') }}"></script>

</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="{{ url('/' . $ticket->structure_id) }}"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="{{ url('/' . $ticket->structure_id) }}">
                <img style="height: 2em;" src="{{ asset('images/logo/logo.png') }}">
            </a>
        </div>
    </nav>

    @if (isset($status))
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Donnez Votre Avis</h4>
                </div>

                <div class="swal2-popup swal2-modal swal2-icon-success swal2-show" style="display: flex;">
                    <div class="swal2-header">

                        <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
                            </div>
                            <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                            <div class="swal2-success-ring"></div>
                            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                            <div class="swal2-success-circular-line-right"
                                style="background-color: rgb(255, 255, 255);">
                            </div>
                        </div><img class="swal2-image" style="display: none;">
                        <h2 class="swal2-title" id="swal2-title" style="display: flex;">Merci Pour Votre Retour !
                        </h2>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Donnez Votre Avis</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ url('rating/' . $ticket->id) }}">
                        @csrf
                        <div class="col-12 col-md-6">
                            <br>
                            <label for="starsInput">Donnez une note au service 😃</label>
                            <div style="font-size: 3em !important;" id="review"></div>
                            <input type="hidden" name="note" readonly id="starsInput"
                                class="form-control form-control-sm">
                        </div>
                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" name="commentaire" placeholder="Laissez un commentaire"
                                id="floatingTextarea" rows="5"></textarea>
                            <label for="floatingTextarea">Commentaire</label>
                        </div>
                        <br>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-1 mb-1">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>


</body>


<script>
    $("#review").rating({
        "value": 3,
        "click": function(e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
    });

    $("#10starsReview").rating({
        "stars": 10,
        "click": function(e) {
            console.log(e);
            $("#10starsInput").val(e.stars);
        }
    });

    $("#customstarsReview").rating({
        "emptyStar": "far fa-play-circle",
        "filledStar": "fas fa-play-circle",
        "color": "#4c71ff",
        "click": function(e) {
            console.log(e);
            $("#customstarsInput").val(e.stars);
        }
    });

    $("#halfstarsReview").rating({
        "half": true,
        "click": function(e) {
            console.log(e);
            $("#halfstarsInput").val(e.stars);
        }
    });

    $("#unrealisticReview").rating({
        value: 3,
        stars: 7,
        emptyStar: "far fa-arrow-alt-circle-left",
        halfStar: "far fa-angry",
        filledStar: "fas fa-arrow-alt-circle-right",
        color: "#ff3ef9",
        half: true,
        click: function(e) {
            console.log(e);
            $("#unrealisticInput").val(e.stars);
        }
    });
</script>

</html>
