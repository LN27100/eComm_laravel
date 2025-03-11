<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'eCommerce DBZ')</title>
    @vite('resources/css/style.css')
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            @yield('nav-links')
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
