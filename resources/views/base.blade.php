<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="path/to/your/custom/style.css"/>

    @vite(['resources/css/base.css','resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{route('home.index')}}">RMA</a>
        </div>
        <nav>
            <ul>
                <li><a href="{{route('properties.index')}}">Trouver un bien</a></li>
                <li><a href="{{route('managers.index')}}">Trouver un gestionnaire de bien</a></li>
            </ul>
        </nav>

        <div class="user-profile">
            @auth
                <div class="user-image">
                    <a href="{{route('dashboard')}}">
                        <img src="path/to/user-profile.jpg" alt="User Image">
                    </a>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf 
                    <button class="bouton bouton-secondary">Se déconnecter</button>
                </form>    
            @endauth
            
            @guest
                <a href="{{route('register')}}" class="bouton bouton-secondary">S'inscrire</a> 
                <a href="{{route('login')}}" class="bouton bouton-secondary">Se Connecter</a> 
            @endguest
        </div>
    </header>

    @include('shared.flash')

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 RMA (Recherche de Maison ou d'Appartement)</p>
    </footer>
</body>
</html>
