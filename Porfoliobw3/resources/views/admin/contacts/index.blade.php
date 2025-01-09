@section('content')
       <h1>Contactformulieren</h1>

         <table>
            <thead>
               <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Bericht</th>
             </tr>
           </thead>
            <tbody>
                @foreach ($contacts as $contact)
                 <tr>
                   <td>{{ $contact->name }}</td>
                   <td>{{ $contact->email }}</td>
                   <td>{{ $contact->message }}</td>
                 </tr>
              @endforeach
          </tbody>
       </table>
     @endsection