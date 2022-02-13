<table>
    <thead>
        <tr>
            <th>N°#</th>
            <th>Référence</th>
            <th>Civilité</th>
            <th>Nom complet</th>
            <th>Date de naissance</th>
            <th>Lieud de naissance</th>
            <th>Situation Marital</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Profession</th>
            <th>Nationalité</th>
            <th>Pièce d'identité </th>
            <th>N° de la pièce</th>
            <th>Statut</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($request_cards as $request_card)
            <tr>
                <td>{{ $request_card->id }}</td>
                <td>{{ $request_card->r_reference }}</td>
                <td>{{ $request_card->civility }}</td>
                <td>{{ $request_card->lastname }} {{ $request_card->firstname }}</td>
                <td>{{ $request_card->birthday }}</td>
                <td>{{ $request_card->birthplace }}</td>
                <td>{{ $request_card->marital }}</td>
                <td>{{ $request_card->adress }}</td>
                <td>{{ $request_card->email }}</td>
                <td>{{ $request_card->phone }}</td>
                <td>{{ $request_card->profession }}</td>
                <td>{{ $request_card->country }}</td>
                <td>{{ $request_card->type_id_card }}</td>
                <td>{{ $request_card->number_id_card }}</td>
                @php
                    $status = App\Http\Controllers\Controller::status($request_card->status);
                @endphp
                <td>{{ $status['message'] }}</td>
                <td>{{ $request_card->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
