<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }
        .profile {
            display: flex;
            align-items: center;
        }
        .profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .messenger-container {
            display: flex;
            height: 80vh;
            border: 1px solid #ddd;
        }
        .conversation-list {
            width: 30%;
            background: #f3f3f3;
            overflow-y: auto;
            border-right: 1px solid #ddd;
        }
        .conversation-list h3 {
            padding: 10px;
            text-align: center;
        }
        .conversation-list ul {
            list-style: none;
            padding: 0;
        }
        .conversation-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .conversation-list a {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .chat-window {
            width: 70%;
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .chat-messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            background-color: #fff;
        }
        .chat-messages div {
            margin-bottom: 10px;
        }
        .chat-messages p {
            background: #e6e6e6;
            padding: 8px;
            border-radius: 5px;
            max-width: 70%;
        }
        .chat-input {
            padding: 10px;
            border-top: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .chat-input form {
            display: flex;
            align-items: center;
        }
        .chat-input input[type="text"] {
            width: 80%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-input button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-links">
            <a href="{{ route('home.index') }}">Home</a>
            <a href="#faq">FAQ</a>
            <a href="{{ route('messages.index') }}">Message</a>
            <a href="#dashboard">Dashboard</a>
        </div>
        <div class="profile">
            <img src="https://via.placeholder.com/40" alt="Profiel Foto" />
            <div class="dropdown">
                <a href="#profile" style="color: white; text-decoration: none;">Bekijk Profiel</a>
            </div>
        </div>
    </div>

    <!-- Messenger Container -->
    <div class="messenger-container">
        <!-- Conversation List -->
        <div class="conversation-list">
            <h3>Gesprekken</h3>
            <ul>
                <li>
                    <a href="#">
                        <strong>Gebruikersnaam 1</strong>
                        <p style="font-size: 0.9em; color: #888;">Laatste bericht...</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <strong>Gebruikersnaam 2</strong>
                        <p style="font-size: 0.9em; color: #888;">Laatste bericht...</p>
                    </a>
                </li>
                <!-- Meer gesprekken -->
            </ul>
        </div>

        <!-- Active Chat Window -->
        <div class="chat-window">
            <div class="chat-header">
                <h4>Gebruikersnaam</h4>
            </div>
            <div class="chat-messages">
                <div>
                    <strong>Gebruiker 1:</strong>
                    <p>Dit is een voorbeeldbericht van gebruiker 1.</p>
                </div>
                <div>
                    <strong>Jij:</strong>
                    <p>Antwoord op gebruiker 1.</p>
                </div>
                <!-- Meer berichten -->
            </div>
            <div class="chat-input">
                <form action="#" method="POST">
                    <input type="text" name="message" placeholder="Schrijf een bericht...">
                    <button type="submit">Verstuur</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
