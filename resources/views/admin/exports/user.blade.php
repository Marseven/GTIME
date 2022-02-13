<table>
    <thead>
        <tr>
            <th>N°#</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
