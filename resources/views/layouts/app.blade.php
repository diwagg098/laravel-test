<!DOCTYPE html>
<html lang="en">
<head>
    @livewireStyles
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* CSS untuk menyesuaikan tinggi sidebar */
        .sidebar {
          height: 100vh;
          background-color: #343a40;
          color: #fff;
        }
    
        .sidebar h1 {
          padding: 20px;
          margin-bottom: 0;
        }
    
        .sidebar ul.nav flex-column {
          margin-top: 30px;
        }
    
        .sidebar ul.nav a {
          color: #ccc;
        }
    
        .sidebar ul.nav a:hover {
          color: #fff;
        }
    
        .main-content {
          padding: 20px;
        }
      </style>
</head>
<body>
    <div class="container">
        {{ $slot }}
    </div>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>