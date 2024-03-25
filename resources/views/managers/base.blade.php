<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="path/to/your/custom/style.css"/>

    @vite(['resources/css/base.css','resources/js/app.js'])
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{route('home.index')}}">RMA</a>
        </div>
        <nav>
            <ul>
                <li><a href="{{route('dashboard')}}">Vos Biens</a></li>
                <li><a href="{{route('managers.index')}}">Vos Locataires</a></li>
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


function openSubTab(evt, subTabName) {
    
    var i, j, subtabcontent, subtablinks;
    subtabcontent = document.getElementsByClassName("subtabcontent");
    for (i = 0; i < subtabcontent.length; i++) {
      subtabcontent[i].style.display = "none";
    }

    subtablinks = document.getElementsByClassName("subtablinks");
    for (var j = 0; j < subtablinks.length; j++) {
      subtablinks[j].className = subtablinks[j].className.replace(" active", "");
    }

    document.getElementById(subTabName).style.display = "block";
    evt.currentTarget.className += " active";

}

function openSubSubTab(evt, subSubTabName) {
    var i, j, subsubtabcontent, subsubtablinks;
    subsubtabcontent = document.getElementsByClassName("subsubtabcontent");
    for (i = 0; i < subsubtabcontent.length; i++) {
      subsubtabcontent[i].style.display = "none";
    }

    subsubtablinks = document.getElementsByClassName("subsubtablinks");
    for (var j = 0; j < subsubtablinks.length; j++) {
      subsubtablinks[j].className = subsubtablinks[j].className.replace(" active", "");
    }

    document.getElementById(subSubTabName).style.display = "block";
    evt.currentTarget.className += " active";

}


</script>
</body>
</html>
