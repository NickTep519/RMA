<div class="contenu" >

    <div class="profile" >

        <div class="profile-header">
            <a href="{{route('dashboard')}}"><img src="{{app(App\Service\ImagePathGenerator::class)->generate($user->profile_image, ['h'=>200, 'w'=>200])}}" alt="{{$user->name}}" class="profile-img"></a>
            <div class="profile-text-container">
                <h1 class="profile-title">RMA</h1>
                <p class="profile-email">{{$user->name}}</p>
            </div>
        </div>

        <div class="menu">
            <a href="" wire:click.prevent="setActiveTab('account_tab')" class="menu-link"><li class="fa-solid fa-circle-user" ></li>  Compte</a>
            <a href="" wire:click.prevent="setActiveTab('setting-tab')" class="menu-link"><li class="fa-solid fa-gear menu-icon" ></li>Param.</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <a class="menu-link"> <li class="fa-solid fa-right-from-bracket menu-icon" ></li><button class="annul" >Déconnexion</button></a>
            </form>
            <!--<a href="" wire:click.prevent="" class="menu-link"><li class="fa-solid fa-bell menu-icon" ></li>Notifiation</a>-->
        </div>

    </div>


    @if ($activeTab === 'account_tab')
        @livewire('account-tab')
    @elseif ($activeTab === 'setting-tab')
        @livewire('setting-tab')
        @include('profile.partials.delete-user-form')
    @endif

</div>
