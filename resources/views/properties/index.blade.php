@extends('base')

@section('title', 'Les biens disponibles')
    

@section('content')

    <section class="filters">
        <h2>Filtres</h2>
        <form>
            <input type="text" id="budget" name="budget">
            <label for="budget">Budget Maximal</label>

            <select id="city" name="city">
                <!-- Options dynamiques peuvent être ajoutées ici -->
            </select>
            <label for="city">Ville</label>

            <input type="text" id="quartier" name="quartier">
            <label for="quartier">Quartier</label>

            <input type="text" id="title" name="title">
            <label for="ville">Type de Bien</label>

            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </section>

    <section class="property-cards">
        @foreach ($properties as $property)
            @include('properties.card')
        @endforeach
    </section>

    {{$properties->render()}}

@endsection
