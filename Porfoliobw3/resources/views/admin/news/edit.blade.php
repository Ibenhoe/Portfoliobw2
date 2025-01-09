@extends('layouts.admin')

@section('content')
  <h1>Nieuwsitem aanpassen</h1>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
       @method('PUT')
         <div class="form-group">
            <label for="title">Titel</label>
           <input type="text" id="title" name="title" required value="{{ $news->title }}">
        </div>

        <div class="form-group">
             <label for="content">Content</label>
            <textarea id="content" name="content" required>{{ $news->content }}</textarea>
         </div>

        <div class="form-group">
            <label for="published_at">Publicatiedatum</label>
           <input type="date" id="published_at" name="published_at" required value="{{ $news->published_at }}">
       </div>
     <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" id="image" name="image">
                @if ($news->image)
                     <img src="{{ asset('storage/' . $news->image) }}" alt="News Image">
                 @endif
        </div>


    <button type="submit" class="btn btn-primary">Aanpassen</button>
  </form>
@endsection