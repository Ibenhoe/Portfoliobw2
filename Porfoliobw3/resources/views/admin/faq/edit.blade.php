@extends('layouts.admin')
        @section('content')
        <h1>FAQ aanpassen</h1>
           <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
               @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="question">Vraag</label>
                        <input type="text" id="question" name="question" required value="{{ $faq->question }}">
                  </div>
                   <div class="form-group">
                        <label for="answer">Antwoord</label>
                         <textarea id="answer" name="answer" required>{{ $faq->answer }}</textarea>
                   </div>
                 <div class="form-group">
                    <label for="categories">Categories</label>
                        <select name="categories[]" id="categories" multiple>
                             @foreach ($categories as $category)
                              <option value="{{ $category->id }}"
                               @if($faq->categories->contains($category))
                                 selected
                               @endif
                               >{{ $category->name }}</option>
                            @endforeach
                     </select>
                    </div>

                <button type="submit" class="btn btn-primary">Aanpassen</button>
            </form>
        @endsection