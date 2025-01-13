@extends('layouts.admin')

@section('content')
   <h1>Antwoord op contact formulier</h1>
    <p><strong>Naam:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Bericht:</strong> {{ $contact->message }}</p>

     <form action="{{ route('admin.contacts.sendReply', $contact->id) }}" method="POST">
           @csrf
            <div class="form-group">
               <label for="response">Antwoord</label>
                <textarea name="response" id="response" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
             </div>
        <button type="submit" class="btn btn-primary">Verstuur antwoord</button>
       </form>
 @endsection