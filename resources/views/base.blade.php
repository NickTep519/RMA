<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="node_modules/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="node_modules/slick-carousel/slick/slick-theme.css"/>
    
    @vite(['resources/css/base.css', 'resources/js/app.js', 'resources/css/home.css'])
    
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <a href="/">RMA</a>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Acheter</a></li>
                    <li><a href="#">Louer</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="user-profile">
                <!-- Si l'utilisateur est connecté -->
                <!-- <img src="path/to/user-profile.jpg" alt="User Profile"> -->

                <!-- Si l'utilisateur n'est pas connecté -->
                <a href="#" class="btn btn-secondary">Se Connecter</a>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Mon Site Immobilier</p>
    </footer>

    <script type="module" src="/node_modules/jquery/dist/jquery.min.js" defer></script>
    <script type="module" src="/node_modules/slick-carousel/slick/slick.min.js" defer></script>
    <script type="module">
        import { $ } from 'jquery'; // Utilise l'importation de jQuery
        import 'slick-carousel/slick/slick.min.js'; // Utilise l'importation de Slick Carousel

        $(document).ready(function(){
            $('.welcome-carousel').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear'
            });
        });
    </script>
</body>
</html>