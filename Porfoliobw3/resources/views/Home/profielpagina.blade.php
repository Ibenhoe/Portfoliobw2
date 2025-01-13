@extends('layouts.app')

@section('content')
  <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

         <h1>Profiel Bewerken</h1>

          @if (session('success'))
           <div class="alert alert-success">{{ session('success') }}</div>
        @endif

         <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
             @method('PATCH')

           <div class="form-group">
                  <label for="name">Gebruikersnaam</label>
                  <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;  background-color: #f9f9f9;" >
              </div>

               <div class="form-group">
                  <label for="birthday">Verjaardag</label>
                  <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}"  style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;  background-color: #f9f9f9;">
              </div>

               <div class="form-group">
                  <label for="about_me">Over mij</label>
                <textarea id="about_me" name="about_me"  style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; background-color: #f9f9f9;" >{{ old('about_me', $user->about_me) }}</textarea>
              </div>

             <div class="form-group">
                 <label for="profile_picture">Profielfoto</label>
                  <input type="file" id="profile_picture" name="profile_picture" style=" padding: 8px;
                    border: 1px solid #ddd;
                     border-radius: 5px;
                    box-sizing: border-box;
                 ">
               @if ($user->profile_picture)
                     <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style=" max-width: 150px;
                         border-radius: 8px; margin: 10px 0;">
                    @else
                        <p>Geen Profielfoto</p>
                     @endif
             </div>

          <button type="submit" class="btn btn-primary">Opslaan</button>
      </form>
 </div>
@endsection