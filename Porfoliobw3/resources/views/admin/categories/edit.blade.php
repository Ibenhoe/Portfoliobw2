@extends('layouts.admin')
       @section('content')
           <h1>Categorie aanpassen</h1>
               <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                     <div class="form-group">
                         <label for="name">Naam</label>
                         <input type="text" id="name" name="name" required value="{{ $category->name }}">
                      </div>
                    <button type="submit" class="btn btn-primary">Aanpassen</button>
            </form>
        @endsection