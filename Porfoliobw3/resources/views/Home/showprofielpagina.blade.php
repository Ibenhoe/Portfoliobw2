@extends('layouts.app')

@section('content')
    <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <h1>Profiel van {{ $user->name }}</h1>

        <div class="form-group">
            <label for="name">Gebruikersnaam</label>
            <p style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;  background-color: #f9f9f9;">{{ $user->name }}</p>
        </div>

        <div class="form-group">
            <label for="birthday">Verjaardag</label>
            <p style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; background-color: #f9f9f9;">{{ $user->birthday }}</p>
        </div>

       <div class="form-group">
            <label for="about_me">Over mij</label>
          <p style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;  background-color: #f9f9f9;">{{ $user->about_me }}</p>
         </div>

        <div class="form-group">
             <label for="profile_picture">Profielfoto</label>
           @if ($user->profile_picture)
               <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style=" max-width: 150px;
                border-radius: 8px; margin: 10px 0;">
             @else
               <p>Geen Profielfoto</p>
            @endif
       </div>
     </div>
@endsection