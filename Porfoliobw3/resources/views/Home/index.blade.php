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
            flex-direction: column;
            align-items: center;
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

        /* Cookie clicker layout */
        .content {
            text-align: center;
            margin-top: 50px;
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
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
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

    <!-- Cookie Clicker Content -->
    <div class="content">
        <img src="{{ asset('images/cookie.png') }}" alt="Koek" class="cookie" id="cookie" />
        <div class="counter">Klikken: <span id="clickCount">0</span></div>
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
