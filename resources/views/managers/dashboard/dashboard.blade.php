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
                    <img src="{{app(App\Service\ImagePathGenerator::class)->generate($user->profile_image, ['h'=>500, 'w'=>500])}}" alt="RMA - {{$user->name}}">
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
                <p>{{ $user->biography }}</p>
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
                        @include('managers.dashboard.card-properties')
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
                
                <a href="{{route('managers.contract.create')}}">
                    <button class="add-properti-button">Emettre un Contrat</button>
                </a>
                 @livewire('contracts')
            </div> 
        </main>
    </div>

@endsection