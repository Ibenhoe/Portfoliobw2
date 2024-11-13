<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Clicker</title>
    <style>
        /* Algemene styling */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        /* Navbar styling */
        .navbar {
            width: 100%;
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .navbar .nav-links {
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px;
            transition: background-color 0.3s;
        }

        .navbar .nav-links a:hover {
            background-color: #555;
        }

        /* Profielafbeelding en dropdown */
        .profile {
            position: relative;
            display: flex;
            align-items: center;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .profile:hover .dropdown {
            display: block;
        }

        .dropdown a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 5px 0;
        }

        .dropdown a:hover {
            color: #555;
        }

        /* Layout */
        .container {
            display: flex;
            width: 100%;
            margin-top: 70px; /* ruimte voor de navbar */
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        .news-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .news-list li {
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .news-list li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .news-list li a:hover {
            color: #555;
        }

        /* Cookie clicker content styling */
        .content {
            text-align: center;
            flex: 1;
            padding: 20px;
        }

        .cookie {
            width: 200px;
            cursor: pointer;
        }

        .counter {
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-links">
            <a href="#home">Home</a>
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

        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Profiel Foto" />
            <div class="dropdown">
                <a href="#profile">Bekijk Profiel</a>
            </div>
        </div>
    </div>

    <!-- Container voor sidebar en content -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Nieuwste Berichten</h2>
            <ul class="news-list">
            @foreach($newsItems as $news)
                    <li>
                        <a href="#" onclick="showNewsContent('{{ $news->content }}')">{{ $news->title }}
                            <br><span>{{ Str::limit($news->content, 150) }}</span>
                        </a>
                            <div class="comments-section">
                            <h5>Reacties:</h5>
                            @foreach($news->comments as $comment)
                                <div class="comment">
                                    <strong>{{ $comment->user->name }}:{{Str::limit($comment->comment, 150)  }}</strong>
                                </div>
                            @endforeach
                        </div>

                        <!-- Reactieformulier -->
                        @auth
                            <form action="{{ route('comments.store', $news->id) }}" method="POST">
                                @csrf
                                <textarea name="content" required placeholder="Schrijf een reactie..."></textarea>
                                <button type="submit">Reageer</button>
                            </form>
                        @else
                            <p>Log in om te reageren!</p>
                        @endauth
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Cookie Clicker Content -->
        <div class="content">
            <img src="{{ asset('images/cookie.png') }}" alt="Koek" class="cookie" id="cookie" />
            <div class="counter">Klikken: <span id="clickCount">0</span></div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let clickCount = 0;

        // Verhoog de klik-teller bij een klik op de koek
        document.getElementById("cookie").addEventListener("click", () => {
            clickCount++;
            document.getElementById("clickCount").innerText = clickCount;
        });
    </script>
</body>
</html>
