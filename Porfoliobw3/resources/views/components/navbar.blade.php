<div class="navbar">
        <div class="nav-links">
            <a href="{{url('/home')}}">Home</a>
            <a href="#faq">FAQ</a>
            <a href="{{ route('messages.index') }}">Message</a>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
      
         <div class="profile" id="profileDropdown">
           @if (auth()->check() && auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profiel Foto" />
           @else
               <img src="https://via.placeholder.com/40" alt="Profiel Foto" />
          @endif
             <div class="dropdown">
               @auth
               <a href="{{url('/profielpagina')}}">Bekijk Profiel</a>
                @can('admin')
                    <a href="{{ url('/admin') }}">Admin Dashboard</a>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                     @csrf
                       <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Uitloggen</a>
                </form>
               @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
               @endif
                @endauth
             </div>
       </div>
    </div>