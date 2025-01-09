@extends('layouts.admin')

@section('content')
    <h1>Gebruikers Overzicht</h1>

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Nieuwe gebruiker</a>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                   <td>{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Aanpassen</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Weet je het zeker?')" class="btn btn-primary">Verwijderen</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection