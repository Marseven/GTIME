<table>
    <thead>
        <tr>
            <th>N°#</th>
            <th>Nom complet</th>
            <th>N° Carte</th>
            <th>Montant total</th>
            <th>Frais inclus ?</th>
            <th>Montant net</th>
            <th>Montant frais Orabank</th>
            <th>Montant frais E-billing</th>
            <th>Statut</th>
            <th>Date </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($refills as $refill)
            <tr>
                <td>{{ $refill->id }}</td>
                <td>{{ $refill->name_card }}</td>
                <td>{{ $refill->number_card }}</td>
                <td>{{ $refill->amount_refill }}</td>
                <td>{{ $refill->fees == 1 ? 'oui' : 'non' }}</td>
                <td>{{ $refill->amount_ora }}</td>
                <td>{{ $refill->fees_ora }}</td>
                <td>{{ $refill->fees_eb }}</td>
                @php
                    $status = App\Http\Controllers\Controller::status($refill->status);
                @endphp
                <td>{{ $status['message'] }}</td>
                <td>{{ $refill->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
