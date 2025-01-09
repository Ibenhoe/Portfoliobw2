@extends('layouts.app')
 @section('content')
   <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

  <h1>Message</h1>
      <form action="{{ route('messages.send') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="message">Bericht</label>
              <textarea id="message" name="message" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"required></textarea>
          </div>
           <button type="submit" class="btn btn-primary">Verstuur</button>
     </form>
 </div>
 @endsection