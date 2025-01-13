@extends('layouts.admin')

@section('content')
    <h1>Contactformulieren</h1>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Bericht</th>
               <th>Antwoord</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($contacts as $contact)
                <tr>
                     <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                   <td>{{$contact->response }}</td>
                   <td> <a href="{{ route('admin.contacts.reply', $contact->id) }}">Antwoorden</a>
                   </td>
                 </tr>
            @endforeach
         </tbody>
   </table>
@endsection