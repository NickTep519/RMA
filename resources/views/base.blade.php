<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="path/to/your/custom/style.css"/>
    @livewireStyles

    @vite(['resources/css/base.css','resources/css/app.css','resources/css/rating.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="logo">
            <a href="{{route('home.index')}}">RMA</a>
        </div>
        <div class="menu-profile">
            <nav>
                <ul>
                    <li><a href="{{route('properties.index')}}">Biens</a></li>
                    <li><a href="{{route('managers.index')}}">Gestionnaires</a></li>
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
                        <button class="bouton bouton-secondary"><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#f1f1f1"><path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h299v60H180v600h299v60H180Zm486-185-43-43 102-102H360v-60h363L621-612l43-43 176 176-174 174Z"/></svg></button>
                    </form>    
                @endauth
                
                @guest
                    <a href="{{route('register')}}" class="bouton bouton-secondary">S'inscrire</a> 
                    <a href="{{route('login')}}" class="bouton bouton-secondary">Se Connecter</a> 
                @endguest
            </div>
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

        const  stars = document.querySelectorAll('.stare') ; 
        let check = false ; 

        stars.forEach(stare => {
            stare.addEventListener('mouseover', selectStars) ; 
            stare.addEventListener('mouseleave', unselectStars) ; 
            stare.addEventListener('click', activeSelect) ; 
        })

        function selectStars(e){
            const data = e.target ; 
            const etoiles = priviousSiblings(data) ; 

            if (!check) {
                    etoiles.forEach(etoile=>{
                        etoile.classList.add('hover') ; 
                }) ; 
            }
           
        }

        function unselectStars(e){
            const data = e.target ; 
            const etoiles = priviousSiblings(data) ; 

            if (!check) {
                    etoiles.forEach(etoile => {
                        etoile.classList.remove('hover') ; 
                }) ;  
            }
        }

        function activeSelect(e) {
            check = true ; 
            const note = e.target.dataset.note ; 
            document.getElementById('note').value = note ;
            document.querySelector('.note').innerHTML+=' '+ note ; 
        }

        function priviousSiblings(data) {
            let values = [data] ; 

            while(data = data.previousSibling){
                if (data.nodeName === 'I') {
                    values.push(data) ; 
                }
            }
            return values; 
        }
    </script>
    
    @livewireScripts
</body>
</html>
