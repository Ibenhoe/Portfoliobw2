<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel Bewerken</title>
    <style>
        /* Algemene styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
        }

        /* Profielpagina container */
        .profile-container {
            max-width: 800px;
            margin: 100px auto 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Alert styling */
        .alert {
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        /* Formulier styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input, 
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .form-group input:focus, 
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        /* Profielfoto */
        .form-group img {
            margin-top: 10px;
            max-width: 150px;
            border-radius: 8px;
        }

        /* Knoppen */
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .profile-container {
                margin: 120px 20px 50px 20px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 14px;
            }

            .btn-primary {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
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

        <div class="profile" id="profileDropdown">
            <img src="https://via.placeholder.com/40" alt="Profiel Foto" />
            <div class="dropdown">
                <a href="#profile">Bekijk Profiel</a>
            </div>
        </div>
    </div>

    <!-- Profielpagina -->
    <div class="profile-container">
        <h1>Profiel Bewerken</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
            </div>

            <div class="form-group">
                <label for="birthday">Verjaardag</label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}">
            </div>

            <div class="form-group">
                <label for="about_me">Over mij</label>
                <textarea id="about_me" name="about_me">{{ old('about_me', $user->about_me) }}</textarea>
            </div>

            <div class="form-group">
                <label for="profile_picture">Profielfoto</label>
                <input type="file" id="profile_picture" name="profile_picture">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
</html>

