@extends('layouts.admin')
    @section('content')
        <h1>Nieuwe FAQ</h1>
           <form action="{{ route('admin.faq.store') }}" method="POST">
               @csrf
                <div class="form-group">
                    <label for="question">Vraag</label>
                   <input type="text" id="question" name="question" required>
                 </div>

               <div class="form-group">
                  <label for="answer">Antwoord</label>
                   <textarea id="answer" name="answer" required></textarea>
               </div>
                 <div class="form-group">
                  <label for="categories">Categories</label>
                    <select name="categories[]" id="categories" multiple>
                         @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                 </select>
               </div>

              <button type="submit" class="btn btn-primary">Aanmaken</button>
          </form>
    @endsection