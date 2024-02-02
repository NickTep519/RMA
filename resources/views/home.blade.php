@extends('base')  

@section('title', 'RMA')
    
@section('content')

<section class="welcome">
    <h1>Bienvenue sur RMA</h1>
    <p>Explorez les propriétés disponibles dans votre région. </p>
    <a href="{{route('properties.index')}}" class="bouton bouton-primary">Commencer</a>
</section>

<h2>Les derniers biens</h2>

<section class="property-cards">
    
    @foreach ($properties as $property)
        @include('properties.card', ['property'=>$property])   
    @endforeach

</section>

@endsection