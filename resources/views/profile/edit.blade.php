<x-app-layout>

    <x-slot name="header">
        <nav>
            <ul class="liste-items">
                <li class="items"> <a href="{{route('home.index')}}"><img src="{{app(App\Service\ImagePathGenerator::class)->generate('logo.png', ['h'=>130, 'w'=>130])}}" alt="" class="logo-img" ></a> </li>
                <li class="items">
                    <a href="{{route('dashboard')}}"  >
                        <img src="{{app(App\Service\ImagePathGenerator::class)->generate('logo.png', ['h'=>50, 'w'=>50])}}" alt="User Image" class="profile-img">
                    </a>
                </li>
                <li class="items btn-nav">
                    <form action="{{route('logout')}}" method="post">
                        @csrf 
                        <button title="deconnexion" ><svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#f1f1f1"><path d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h299v60H180v600h299v60H180Zm486-185-43-43 102-102H360v-60h363L621-612l43-43 176 176-174 174Z"/></svg></button>
                    </form>  
                </li>
            </ul>
        </nav>
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