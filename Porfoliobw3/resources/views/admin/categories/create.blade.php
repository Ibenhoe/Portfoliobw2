@extends('layouts.admin')
        @section('content')
             <h1>Nieuwe Categorie</h1>

               <form action="{{ route('admin.categories.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                        <label for="name">Naam</label>
                       <input type="text" id="name" name="name" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Aanmaken</button>
              </form>
         @endsection