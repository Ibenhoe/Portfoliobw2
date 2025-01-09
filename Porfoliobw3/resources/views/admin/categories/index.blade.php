@extends('layouts.admin')

        @section('content')
            <h1>Categorie Overzicht</h1>

         <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Nieuwe Categorie</a>

           <table>
               <thead>
                   <tr>
                     <th>Name</th>
                     <th>Acties</th>
                  </tr>
              </thead>
                <tbody>
                    @foreach ($categories as $category)
                     <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}">Aanpassen</a>
                             <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" onclick="return confirm('Weet je het zeker?')"  class="btn btn-primary">Verwijderen</button>
                             </form>
                        </td>
                       </tr>
                  @endforeach
             </tbody>
           </table>
       @endsection