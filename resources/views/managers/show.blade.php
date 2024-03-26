@vite(['resources/css/dashboard.css'])

@php
    $title = 'RMA-'. $user->name ; 
@endphp

@extends('base')

@section('title', $title)

@section('content')

    <div class="content">

    
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

    </main>
    </div>
@endsection