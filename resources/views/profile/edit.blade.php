<x-app-layout>
    <x-slot name="header">
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
                        <button class="bouton bouton-secondary">Se déconnecter</button>
                    </form>    
                @endauth
                
                @guest
                    <a href="{{route('register')}}" class="bouton bouton-secondary">S'inscrire</a> 
                    <a href="{{route('login')}}" class="bouton bouton-secondary">Se Connecter</a> 
                @endguest
            </div>
        </div>
    </x-slot>

    <div>
        <div>
            <div>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>