<html>

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">

    <style>
        body,
        p,
        h1,
        h2 {
            font-family: Arial, Helvetica, sans-serif;
        }

    </style>
</head>

<body style="padding : 7pt 50pt 7pt 50pt">

    <div style="text-align: center;">
        <h1><span>{{ $ticket->structure->libelle }}</span>
        </h1>
        <p><span>Email : {{ $ticket->structure->email }}</span>
        </p>
        <p><span>Téléphone : {{ $ticket->structure->telephone }}</span></p>
    </div>
    <div style="border-top: 2px solid black; border-bottom: 2px solid black; heigth : 200px;">
        <h1 style="font-weight: 800; font-size: 3em; text-align: center;  font-family: Arial, Helvetica, sans-serif;">
            {{ $ticket->service->libelle[0] }}{{ $ticket->numero }}</h1>
    </div>
    <p style="text-align: center;"><span style="font-weight: 700;">Service :</span> {{ $ticket->service->libelle }}
        <br>
        <span style="font-weight: 700;">Nombre de tickets avant : </span> {{ $ticket->nbre_ticket_avant }}
    </p>
    <p style="font-weight: 700; font-size: 1.2em; text-align: center;"><span>Scanner le QR Code</span>
    </p>
    <p style="text-align: center;">
        <img alt="" src="{{ asset('images/qrcode.png') }}" style="width: 200px; height: 200px;" title="qrcode">
    </p>
    <p style="text-align: center;"><span style="font-weight: 700">Date : </span> <span
            style=" font-style: italic;">{{ $ticket->created_at }}</span> </p>

</body>

</html>
