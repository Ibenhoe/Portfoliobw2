@extends('layouts.admin')

@section('content')
   <h1>Nieuwe Gebruiker</h1>

  <form action="{{ route('admin.users.store') }}" method="POST">
       @csrf

         <div class="form-group">
              <label for="name">Naam</label>
             <input type="text" id="name" name="name" required>
          </div>

        <div class="form-group">
             <label for="email">Email</label>
           <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
             <label for="password">Wachtwoord</label>
             <input type="password" id="password" name="password" required>
       </div>

         <div class="form-group">
             <label for="password_confirmation">Bevestig Wachtwoord</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

         <div class="form-group">
            <label>
                <input type="checkbox" name="is_admin" value="1"> Admin
             </label>
        </div>

      <button type="submit" class="btn btn-primary">Aanmaken</button>
</form>
@endsection