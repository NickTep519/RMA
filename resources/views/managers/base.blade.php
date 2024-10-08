<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="path/to/your/custom/style.css"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles

    @vite(['resources/css/base.css','resources/js/app.js'])
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{route('home.index')}}">RMA</a>
        </div>
        <!--<nav>
            <ul>
                <li><a href="{{route('dashboard')}}">Vos Biens</a></li>
                <li><a href="{{route('managers.index')}}">Vos Locataires</a></li>
            </ul>
        </nav>-->

        <div class="user-profile">
            @auth
                <div class="user-image">
                    <a href="{{route('dashboard')}}">
                        <img src="{{app(App\Service\ImagePathGenerator::class)->generate(Illuminate\Support\Facades\Auth::user()->profile_image, ['h'=>50, 'w'=>50])}}" alt="User Image">
                    </a>
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf 
                    <button class="bouton bouton-secondary"><li class="fa-solid fa-right-from-bracket menu-icon" ></li></button>
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

    @livewireScripts

    <script>

        function openTab(evt, tabName) {
    
            var i, j, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (j = 0; j < tablinks.length; j++) {
                tablinks[j].className = tablinks[j].className.replace(" active", "");
            }

            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();

    </script>
</body>
</html>
