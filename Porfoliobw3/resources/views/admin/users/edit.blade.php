@extends('layouts.admin')

@section('content')
   <h1>Gebruiker aanpassen</h1>

  <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
       @csrf
       @method('PUT')

         <div class="form-group">
              <label for="name">Naam</label>
             <input type="text" id="name" name="name" required value="{{ $user->name }}">
          </div>

        <div class="form-group">
             <label for="email">Email</label>
           <input type="email" id="email" name="email" required value="{{ $user->email }}">
        </div>


         <div class="form-group">
            <label>
                 <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}> Admin
             </label>
       </div>

      <button type="submit" class="btn btn-primary">Aanpassen</button>
</form>
@endsection