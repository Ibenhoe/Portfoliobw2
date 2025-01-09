@extends('layouts.admin')
    @section('content')
        <h1>FAQ Overzicht</h1>

         <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">Nieuwe FAQ</a>

         <table>
           <thead>
             <tr>
                   <th>Vraag</th>
                   <th>Antwoord</th>
                  <th>Acties</th>
            </tr>
             </thead>
             <tbody>
               @foreach ($faqs as $faq)
               <tr>
                 <td>{{ $faq->question }}</td>
                  <td>{{ $faq->answer }}</td>
                    <td>
                       <a href="{{ route('admin.faq.edit', $faq->id) }}">Aanpassen</a>
                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="return confirm('Weet je het zeker?')" class="btn btn-primary">Verwijderen</button>
                    </form>
                    </td>
                </tr>
                @endforeach
             </tbody>
           </table>
    @endsection