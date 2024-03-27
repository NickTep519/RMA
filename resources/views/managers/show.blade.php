@vite(['resources/css/dashboard.css'])

@php
    $title = 'RMA-'. $user->name ; 
@endphp

@extends('base')

@section('title', $title)

@section('content')

    <div class="content">

        <aside class="sidebar">
            <div class="profile-picture">
                <img src="{{ asset('path/to/profile_picture.jpg') }}" alt="Photo de profil RMA">
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
                <p>{{ $user->biography }}</p>
            </div>
         
            <div class="contact-links">
                <a href="#" class="contact-link">WhatsApp</a>
                <a href="#" class="contact-link">Email</a>
            </div>
            <hr>
        </aside>
    
        <main class="main-content">
    
            <h2>Avez-vous déjà été servi par <i>{{$user->name}}</i> ? Votre avis sur la qualité de ses service nous intéresse</h2>
        
            <form action="{{ route('rating', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="note" id="note" value="">
                <i class="stare" data-note="1">&#9733;</i>
                <i class="stare" data-note="2">&#9733;</i>
                <i class="stare" data-note="3">&#9733;</i>
                <i class="stare" data-note="4">&#9733;</i>
                <i class="stare" data-note="5">&#9733;</i>
                <button type="submit">Noter</button>
            </form>        

            <br><br>

            <section class="properti-list">

                @forelse ($properties as $property)
                    <div class="properti-card">
                        <a href="{{route('properties.show', [$property->slug(), $property])}}"><h3 class="properti-title">{{ $property->title }}</h3></a>
                        <p class="properti-description">{{ $property->description }}</p>

                        <div class="properti-photos">
                        </div>
                    </div> 
                @empty
                    @php
                        $info = 'Salut ! ' .$user->name.' n\'a encore aucun bien de disponible'
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