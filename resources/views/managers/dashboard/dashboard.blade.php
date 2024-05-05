@php
    $title = 'RMA-'. $user->name ; 
@endphp

@vite(['resources/css/dashboard.css'])

@extends('managers.base')

@section('title', $title)

@section('content')

    <div class="content">
                                        
                            <!-- Sidebar Profil User-->
        <aside class="sidebar">
    
            <div class="banniaire">
                <div class="profile-picture">
                    <img src="{{app(App\Service\ImagePathGenerator::class)->generate('profil_default.jpg', ['h'=>200, 'w'=>200])}}" alt="">
                </div>
            </div>
                
            <a href="{{route('dashboard')}}" class="user-name">
                <h2>{{ $user->name }}</h2>
            </a>
    
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $user->moyenne_rating)
                        <span class="star filled">&#9733;</span>
                    @else
                        <span class="star">&#9733;</span>
                    @endif
                @endfor
            </div>
    
            <div class="biography">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tempora voluptate dolor vitae expedita alias corporis odio numquam id obcaecati repellat laudantium deserunt incidunt, fugiat illum a, natus molestias commodi!{{ $user->biography }}</p>
            </div>
        
            <a href="{{route('profile.edit')}}" class="edit-profile-button">Éditer votre profil</a>
        
            <div class="contact-links">
                <a href="#" class="contact-link">WhatsApp</a>
                <a href="#" class="contact-link">Email</a>
            </div>
            <hr>

        </aside>
        
                            <!--Content sidebar-->

        <main class="main-content">
            
            <div class="tabs">
                <button class="tablinks active" onclick="openTab(event, 'contenu-general')">Vos Biens</button>
                <button class="tablinks" onclick="openTab(event, 'gestion-locataires')">Gestion des Locataires</button>
            </div>                                        
                                                <!--Les biens-->
            <div id="contenu-general" class="tabcontent active" >

                <a href="{{route('managers.property.create')}}">
                    <button class="add-properti-button">Ajouter un bien</button>
                </a>

                <section class="properti-list">
                    @forelse ($properties as $property)
                        @include('managers.dashboard.card-properties', ['property'=> $property])
                    @empty
                        @php
                            $info = 'Salut, '.$user->name.' ! Vos biens s\'afficherons ici !'
                        @endphp
                        @include('shared.flash-info', ['info'=>$info])
                    @endforelse
                </section>

                {{$properties->appends(request()->query())->render()}}
            
                <section class="real-estate-news">
                    @include('managers.dashboard.news-card')
                </section>

            </div>
                                                <!--Gestion Des Locataires-->

            <div id="gestion-locataires" class="tabcontent"> 
                
                <div class="subtabs">
                    <button class="subtablinks active" onclick="openSubTab(event, 'subtab24')">2024</button>
                    <button class="subtablinks" onclick="openSubTab(event, 'subtab25')">2025</button>
                </div>

                <div id="subtab24" class="subtabcontent active">
                    
                    <div class="subsubtabs">
                        <button id="defaultOpen" class="subsubtablinks active" onclick="openSubSubTab(event, 'Janvier')">Janvier</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Fevrier')">Février</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Mars')">Mars</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Avril')">Avril</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Mai')">Mai</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Juin')">Juin</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Juillet')">Juillet</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Aout')">Août</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Septembre')">Septembre</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Octobre')">Octobre</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Novembre')">Novembre</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Decembre')">Décembre</button>
                    </div>

                    <a href="#" class="edit-profile-button">Ajouter un Locataire</a>
                    
                    <div id="Janvier" class="subsubtabcontent active">
                        <h2>Janvier</h2>
                        @include('managers.dashboard.tab-tenants')
                    </div> 

                    <div id="Fevrier" class="subsubtabcontent">
                        <h2>Février</h2>
                        @include('managers.dashboard.tab-tenants')
                    </div>

                    <div id="Mars" class="subsubtabcontent">
                        <h2>Mars</h2>
                        @include('managers.dashboard.tab-tenants')
                    </div>    
                </div>

                
                <div id="subtab25" class="subtabcontent">
                    <div class="subsubtabs">
                        <button class="subsubtablinks active" onclick="openSubSubTab(event, 'Janvier1')">Janvier</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Fevrier1')">Février</button>
                        <button class="subsubtablinks" onclick="openSubSubTab(event, 'Mars1')">Mars</button>
                    </div>

                    <a href="#" class="edit-profile-button">Ajouter un Locataire</a>

                    <div id="Janvier1" class="subsubtabcontent active">
                        <h1>Janvier</h1>
                    </div> 
                    <div id="Fevrier1" class="subsubtabcontent">
                        <h1>Février</h1>
                    </div>
                    <div id="Mars1" class="subsubtabcontent">
                        <h1>Mars</h1>
                    </div>    
                </div>

            </div> 
        </main>
    </div>

@endsection