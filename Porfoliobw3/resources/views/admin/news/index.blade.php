@extends('layouts.admin')

@section('content')
     <h1>Nieuws Overzicht</h1>

    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Nieuw nieuwsitem</a>

    <table>
        <thead>
            <tr>
                <th>Titel</th>
                <th>Publicatiedatum</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newsItems as $news)
                <tr>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->published_at }}</td>
                   <td>
                      <a href="{{ route('admin.news.edit', $news->id) }}">Aanpassen</a>
                        <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" style="display: inline-block;">
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