@extends('layouts.app')

@section('content')
   <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <div class="content" style="display: flex; flex-direction: column; align-items: center;">
                 <form id="clickForm" action="{{ route('clicks.store') }}" method="POST">
                     @csrf
                    <input type="hidden" name="clicks" id="clickInput" value="0">
                 </form>
               <img src="{{ asset('images/cookie.png') }}" alt="Koek" class="cookie" id="cookie" style="width: 200px; cursor: pointer;" />
                <div class="counter" style="font-size: 24px; margin-top: 20px; color: #333;">Klikken: <span id="clickCount">{{$userClicks}}</span></div>
           </div>
           <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

<h1 style="text-align: center; margin-bottom: 20px;">Nieuws</h1>

 @if (session('success'))
     <div class="alert alert-success">{{ session('success') }}</div>
 @endif
   <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
       @foreach($newsItems as $item)
           <div style="width: 700px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; padding: 10px; display: flex; align-items: center;">
                <div style="flex: 1;">
                    <h2 style="font-size: 1.3em; margin-bottom: 10px;">{{ $item->title }}</h2>
                    <p style="margin-bottom: 10px;">{{ $item->content }}</p>
                      <p>Publicatiedatum: {{ $item->published_at }}</p>
                    @auth
                      <form method="POST" action="{{ route('clicks.store') }}" style="margin-top: 10px;">
                          @csrf
                          <button type="submit" class="btn btn-primary">Klik Hier</button>
                     </form>
                   @endauth
                 <div style="margin-top: 15px;">
                      <h3 style="font-size: 1.1em; margin-bottom: 5px;">Reacties</h3>
                      @foreach ($item->comments as $comment)
                         <div style="border-left: 2px solid #ddd; padding-left: 10px; margin-bottom: 5px;">
                               <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                         </div>
                      @endforeach
                          @auth
                              <form action="{{ route('comments.store', $item->id) }}" method="POST" style="margin-top: 10px;">
                                   @csrf
                                   <textarea name="content" style="width: 100%; padding: 5px; border: 1px solid #ddd;" placeholder="Plaats een reactie"></textarea>
                                   <button type="submit" class="btn btn-primary">Reageer</button>
                            </form>
                       @endauth
                  </div>
              </div>
            @if ($item->image)
             <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" style="width: 200px; height: 200px; object-fit: cover; border-radius: 5px; margin-left: 20px;">
             @endif
        </div>
    @endforeach
                 </div>
           </div>
           <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
     <form action="{{ route('home') }}" method="GET">
            <div class="form-group"  style="display: flex; flex-direction: row;">
                 <label for="search">Zoek Gebruiker: </label>
                  <input type="text" name="search" value="{{ $searchName ?? ''}}" style="margin-left: 10px; width: 50%;  padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                  <button type="submit" class="btn btn-primary" style="margin-left: 10px; ">Zoek</button>
            </div>
            </form>
             @if(isset($users) && count($users) > 0)
                <div style="margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
                   <h3>Gebruikers gevonden:</h3>
                  <ul style="list-style: none; padding-left: 0;">
                        @foreach($users as $user)
                            <li style="margin-bottom: 10px;">
                               <a href="{{ route('profile.show', $user->id) }}">{{ $user->name }}</a>
                           </li>
                        @endforeach
                 </ul>
               </div>
           @endif
    </div>
        <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
              <h1 style="text-align: center; margin-bottom: 20px;">Veelgestelde Vragen (FAQ)</h1>
             @foreach ($faqs as $faq)
                 <div style="margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
                      <h2 style="font-size: 1.3em; margin-bottom: 10px;">{{ $faq->question }}</h2>
                   <p style="margin-bottom: 10px;">{{ $faq->answer }}</p>
                </div>
           @endforeach
       </div>
    <div style="width: 100%; max-width: 800px; margin: 20px auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
       <h1 style="text-align: center; margin-bottom: 20px;">Contact</h1>
         <form action="{{ route('messages.send') }}" method="POST">
             @csrf
               <div class="form-group">
                 <label for="message">Bericht</label>
                 <textarea id="message" name="message" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"></textarea>
              </div>
             <button type="submit" class="btn btn-primary">Versturen</button>
          </form>
         
   </div>
     <!-- JavaScript -->
       <script>
         document.addEventListener("DOMContentLoaded", () => {
             // Haal de klikwaarde van de server op of gebruik sessionStorage voor niet-ingelogde gebruikers
            let clickCount = {{ $userClicks }}; // Serverwaarde voor ingelogde gebruikers

            const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
           const cookie = document.getElementById("cookie");
           const clickCountElement = document.getElementById("clickCount");
             const clickForm = document.getElementById("clickForm");
             const clickInput = document.getElementById("clickInput");

             // Reset sessionStorage als de gebruiker is ingelogd
            if (isLoggedIn) {
                 sessionStorage.removeItem('clicks');
              } else if (typeof Storage !== "undefined" && sessionStorage.getItem('clicks')) {
                // Gebruik de opgeslagen waarde uit sessionStorage voor niet-ingelogde gebruikers
                 clickCount = parseInt(sessionStorage.getItem('clicks'));
                 clickCountElement.innerText = clickCount; // Update de UI met sessionStorage waarde
            }

             // Klik-event listener
            cookie.addEventListener("click", () => {
               clickCount++; // Verhoog het aantal klikken

                // Update de UI
               clickCountElement.innerText = clickCount;

               if (isLoggedIn) {
                    // Synchroniseer klikken naar de server
                   clickInput.value = clickCount;
                   clickForm.submit();
               } else if (typeof Storage !== "undefined") {
                     // Sla klikken lokaal op in sessionStorage voor niet-ingelogde gebruikers
                   sessionStorage.setItem('clicks', clickCount);
               }
           });

          // Profiel dropdown functionaliteit
          const profile = document.getElementById("profileDropdown");
             profile.addEventListener("click", (e) => {
               e.stopPropagation(); // Voorkom dat andere clicks het sluiten
                 profile.classList.toggle("active");
           });

            // Sluit het menu als ergens anders wordt geklikt
            document.addEventListener("click", () => {
                  profile.classList.remove("active");
             });
        });
     </script>
  @endsection