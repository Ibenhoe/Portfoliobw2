@extends('layouts.admin')

@section('content')
   <h1>Nieuw nieuwsitem</h1>

   <form action="{{ route('admin.news.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
          <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
           <textarea id="content" name="content" required></textarea>
        </div>

        <div class="form-group">
            <label for="published_at">Publicatiedatum</label>
            <input type="date" id="published_at" name="published_at" required>
        </div>

        <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" id="image" name="image">
        </div>

    <button type="submit" class="btn btn-primary">Aanmaken</button>
</form>
@endsection