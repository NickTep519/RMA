@php
    $title = 'RMA-'. $user->name ; 
@endphp

@vite(['resources/css/base.css','resources/css/profile.css','resources/js/app.js'])

@extends('managers.base')

@section('title', $title)

@section('content')

    <div class="container">

        <aside class="sidebar">
    
            <div class="profile-picture">
                <img src="{{ asset('path/to/profile_picture.jpg') }}" alt="Photo de profil RMA">
            </div>
        
            <a href="{{route('dashboard')}}" class="user-name">
                <h2>{{ $user->name }}</h2>
            </a>
    
            <div class="rating">
                <!-- Système d'étoiles à ajouter ici -->
            </div>
    
            <div class="biography">
                <p>{{ $user->biography }}</p>
            </div>
        
            <a href="#" class="edit-profile-button">Éditer votre profil</a>
        
            <div class="contact-links">
                <a href="#" class="contact-link">WhatsApp</a>
                <a href="#" class="contact-link">Email</a>
            </div>
            <hr>
        </aside>
        
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'profile')" id="defaultOpen">Profil</button>
            <button class="tablink" onclick="openTab(event, 'tenants')">Locataires</button>
        </div>

        <main class="main-content">

            <div id="profile" class="tabcontent" >

                <h2>Listing de vos biens</h2>

                <a href="{{route('managers.property.create')}}">
                    <button class="add-properti-button">Ajouter un bien</button>
                </a>

                <section class="properti-list">

                @forelse ($properties as $property)
                    <div class="properti-card">
                        <a href="{{route('properties.show', [$property->slug(), $property])}}"><h3 class="properti-title">{{ $property->title }}</h3></a>
                        <p class="properti-description">{{ $property->description }}</p>

                        <div class="properti-buttons">
                            <a href="{{route('managers.property.edit', $property)}}">
                                <button class="edit-properti-button">Modifier</button>
                            </a>

                            <form action="{{route('managers.property.destroy', $property)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="delete-properti-button">Supprimer</button>
                            </form>
                        </div>
                    
                        <!-- Photos du bien immobilier -->
                        <div class="properti-photos">
                            <!-- Insérez vos photos ici -->
                        </div>
                    </div> 
                @empty
                    
                    @php
                        $info = 'Salut, '.$user->name.' ! Vos biens s\'afficherons ici !'
                    @endphp

                    @include('shared.flash-info', ['info'=>$info])

                @endforelse
        
                </section>
{{$properties->appends(request()->query())->render()}}
        
            
                <section class="real-estate-news">
                    <!-- Card pour chaque actualité -->
            
                    <div class="news-card">
                        <h3>IMMO</h3>
                        <p>Contenu de l'actualité 1</p>
                    </div>
                    <div class="news-card">
                        <h3>IMMO</h3>
                        <p>Contenu de l'actualité 2</p>
                    </div>
        
                </section>
            </div>                                        <!--Fin div présentation de biens et actualités-->

            <div id="tenants" class="tabcontent">
                <!-- Contenu de l'onglet Locataires -->
                <div class="subtabs">
                    <button class="subtablink" onclick="openSubTab(event, 'year1')" id="defaultSubOpen">2024</button>
                    <!-- Ajouter d'autres boutons pour les années supplémentaires -->
                </div>
            
                <div id="year1" class="subtabcontent">
                    <!-- Contenu de l'onglet Année 1 -->
                    <div class="subsubtabs">
                        <button class="subsubtablink" onclick="openSubSubTab(event, 'january')">Janvier</button>
                        <!-- Ajouter d'autres boutons pour les mois supplémentaires -->
                    </div>
            
                    <div id="january" class="subsubtabcontent">
                        <!-- Tableau pour afficher les locataires du mois de janvier -->
                    </div>
                    <!-- Ajouter des divs similaires pour les autres mois -->
                </div>
                <!-- Ajouter des divs similaires pour les autres années -->
            </div>


    
        </main>
    </div>

@endsection