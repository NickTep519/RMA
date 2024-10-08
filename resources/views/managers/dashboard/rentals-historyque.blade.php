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
                <p>{{ $user->biography }}</p>
            </div>
        
            <a href="{{route('profile.edit')}}" class="edit-profile-button">Éditer votre profil</a>
        
            <div class="contact-links">
                <a href="#" class="contact-link">WhatsApp</a>
                <a href="#" class="contact-link">Email</a>
            </div>
            <hr>

        </aside>

        <main class="main-content">
            <div id="contenu-general" class="tabcontent active" >
            
                <h1>{{$contract->tenant_name}}</h1>
                <h2>IDL : {{$contract->idl}}</h2>

                <div class="tenant-infos">
                    <div>
                        <p> Profession : {{$contract->profession}} </p>
                        <p> NPI : {{$contract->npi}} </p>
                    </div>
                    <div>
                        <p> Tel : {{$contract->tenant_phone}} </p>
                        <p> Date d'intégration : {{$contract->integration_date->translatedformat('d M Y')}}</p>
                    </div>
                </div>
                   
                @livewire('Rentals', [
                    'contract' => $contract
                ])
               
            </div> 
        </main>

    </div>
    
@endsection