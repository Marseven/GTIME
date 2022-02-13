<html>

<head>
    <style type="text/css">
        body {
            font-family: Arial;
            font-size: 65.4px
        }

        .pos {
            position: absolute;
            z-index: 0;
            left: 0px;
            top: 0px
        }

    </style>
</head>

<body>
    <div class="pos" id="_166:113" style="top:113;left:166">
        <span id="_42.5" style="font-weight:bold; font-family:Arial; font-size:42.5px; color:#000000">
            {{ $ticket->structure->libelle }}</span>
    </div>
    <div class="pos" id="_198:186" style="top:186;left:198">
        <span id="_22.8" style=" font-family:Arial; font-size:22.8px; color:#000000">
            {{ $ticket->structure->telephone }} - {{ $ticket->structure->email }}</span>
    </div>
    <div class="pos" id="_198:275" style="top:275;left:198">
        <span id="_163.3" style=" font-family:Arial; font-size:163.3px; color:#000000">
            C {{ $ticket->numero }}</span>
    </div>
    <div class="pos" id="_207:422" style="top:422;left:207">
        <span id="_12.7" style="font-style:italic; font-family:Arial; font-size:12.7px; color:#000000">
            Nombre de ticket avant : {{ $ticket->nbre_ticket_avant }}</span>
    </div>
    <div class="pos" id="_272:482" style="top:482;left:272">
        <span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
            {{ $ticket->service->libelle }}</span>
    </div>

    <div class="pos" id="_272:482" style="top:482;left:272">
        {{ $qrcode }}
    </div>

    <div class="pos" id="_288:765" style="top:765;left:288">
        <span id="_19.1" style="font-weight:bold; font-family:Arial; font-size:19.1px; color:#000000">
            {{ $ticket->created_at }}</span>
    </div>

</body>

</html>
