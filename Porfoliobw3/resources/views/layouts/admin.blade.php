<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
      <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .admin-nav {
         background-color: #333;
          color: white;
          padding: 10px 0;
          text-align: center;
           margin-bottom: 20px;
        }

        .admin-nav a {
          color: white;
          text-decoration: none;
         padding: 10px 15px;
          display: inline-block;
           transition: background-color 0.3s;
        }
         .admin-nav a:hover {
           background-color: #555;
         }
         .alert {
          padding: 10px 15px;
          margin-bottom: 20px;
          border-radius: 5px;
          color: #155724;
            background-color: #d4edda;
          border: 1px solid #c3e6cb;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
          display: block;
          font-weight: bold;
          margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="date"],
        .form-group textarea{
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
           .form-group input[type="file"] {
            padding: 8px;
          border: 1px solid #ddd;
          border-radius: 5px;
            box-sizing: border-box;
        }
         .btn-primary {
             background-color: #007bff;
             color: white;
             border: none;
             padding: 10px 20px;
             border-radius: 5px;
            cursor: pointer;
              transition: background-color 0.3s;
        }

       .btn-primary:hover {
            background-color: #0056b3;
       }
         table {
             width: 100%;
            border-collapse: collapse;
             margin-bottom: 20px;
         }
         th, td {
           border: 1px solid #ddd;
            padding: 8px;
             text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
       img {
            max-width: 150px;
            border-radius: 8px;
          margin: 10px 0;
        }
         .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
           outline: none;
         }
      </style>
</head>
<body>
<div class="admin-nav">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.users.index') }}">Users</a>
    <a href="{{ route('admin.news.index') }}">Nieuws</a>
    <a href="{{ route('admin.faq.index') }}">FAQ</a>
     <a href="{{ route('admin.categories.index') }}">Categories</a>
     <a href="{{ route('admin.contacts.index') }}">Contacts</a>
</div>

    <div class="container">
         @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
         @endif

        @yield('content')
    </div>
</body>
</html>