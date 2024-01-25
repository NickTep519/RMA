@extends('base')

@section('title', 'Les biens disponibles')
    
@vite(['resources/css/home.css'])

@section('content')
    <section class="filter-section">
        <form action="" method="POST">
            <label for="city">Ville:</label>
            <select id="city">
                <option value="all">Toutes les villes</option>
                <option value="city1">Ville 1</option>
                <option value="city2">Ville 2</option>
            </select>
    
            <label for="neighborhood">Quartier:</label>
            <select id="neighborhood">
                <option value="all">Tous les quartiers</option>
                <option value="neighborhood1">Quartier 1</option>
                <option value="neighborhood2">Quartier 2</option>
            </select>
    
            <label for="price">Prix (F CFA):</label>
            <input type="number" id="price" min="0" placeholder="0">
            <button class="btn btn-primary">Filtrer</button>
        </form>
       
    </section>

    <section class="property-cards">


        @include('properties.card')
        @include('properties.card')
        @include('properties.card')
        @include('properties.card')


    </section>

    
@endsection
