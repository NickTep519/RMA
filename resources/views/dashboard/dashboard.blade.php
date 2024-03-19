@php
    $title = 'RMA-'. $user->name ; 
    $months = ['Janvier','Fevier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'] ; 
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
                    <img src="{{ asset('path/to/profile_picture.jpg') }}" alt="Photo de profil RMA">
                </div>
            </div>
                
            <a href="{{route('dashboard')}}" class="user-name">
                <h2>{{ $user->name }}</h2>
            </a>
    
            <div class="rating">
                <!-- Système d'étoiles à ajouter ici -->
            </div>
    
            <div class="biography">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tempora voluptate dolor vitae expedita alias corporis odio numquam id obcaecati repellat laudantium deserunt incidunt, fugiat illum a, natus molestias commodi!{{ $user->biography }}</p>
            </div>
        
            <a href="#" class="edit-profile-button">Éditer votre profil</a>
        
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
                        @include('dashboard.card-properties', ['property'=> $property])
                    @empty
                        @php
                            $info = 'Salut, '.$user->name.' ! Vos biens s\'afficherons ici !'
                        @endphp
                        @include('shared.flash-info', ['info'=>$info])
                    @endforelse
                </section>

                {{$properties->appends(request()->query())->render()}}
            
                <section class="real-estate-news">
                    @include('dashboard.news-card')
                </section>

            </div>
                                                <!--Gestion Des Locataires-->

            <div id="gestion-locataires" class="tabcontent">
        
                <div class="subtabs">
                    <button class="subtablinks" onclick="openSubTab(event, '2024')">2024</button>
                    <button class="subtablinks" onclick="openSubTab(event, '2025')">2025</button>
                </div>

                <div id="2024" class="subtabcontent active">
                    @foreach ($months as $month)
                        <div class="subsubtabs">
                            <button class="subsubtablinks" onclick="openSubSubTab(event, $month)">{{$month}}</button>
                        </div>
                    @endforeach
                    
                    @foreach ($months as $month)
                        <div id="{{$month}}" class="subsubtabcontent">
                            <h1>{{$month}}</h1>
                        </div>    
                    @endforeach
                    
                </div>
                <div id="2025" class="subtabcontent">
                    @foreach ($months as $month)
                        <button class="subsubtablinks" onclick="openSubSubTab(event, $month)">{{$month}}</button>
                    @endforeach
                    <h1>Anneé 2025</h1>
                </div>
            </div> 
        </main>
    </div>

@endsection