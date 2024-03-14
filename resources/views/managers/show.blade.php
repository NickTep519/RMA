@vite(['resources/css/base.css','resources/css/profile.css'])

@php
    $title = 'RMA-'. $user->name ; 
@endphp
@extends('base')

@section('title', $title)

@section('content')

    <div class="container">

    
    <aside class="sidebar">
        <!-- Photo de profil -->
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
        
        
        <div class="contact-links">
            <a href="#" class="contact-link">WhatsApp</a>
            <a href="#" class="contact-link">Email</a>
        </div>
        <hr>
    </aside>
    
    <main class="main-content">
    
        <h2>Listing de vos biens</h2>

        <section class="properti-list">

            @forelse ($properties as $property)
                <div class="properti-card">
                    <a href="{{route('properties.show', [$property->slug(), $property])}}">
                        <h3 class="properti-title">{{ $property->title }}</h3>
                    </a>
                    <p class="properti-description">{{ $property->description }}</p>

                    <div class="properti-buttons">
                        <a href="{{route('properties.show', [$property->slug(), $property])}}">
                            <button class="edit-properti-button">Plus...</button>
                        </a>
                    </div>
                    
                    <!-- Photos du bien immobilier -->
                    <div class="properti-photos">
                        <!-- Insérez vos photos ici -->
                    </div>
                </div> 
            @empty
            <div class="flash-message success">
                <p>{{$user->name}} n'a pas encore de biens disponibles</p>
            </div>
            @endforelse
        
        </section>

{{$properties->appends(request()->query())->render()}}

        
        <!-- Actualités sur l'immobilier -->
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
    </main>
    </div>
@endsection