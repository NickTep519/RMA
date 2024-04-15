@extends('base')  

@section('title', 'RMA')
    
@section('content')

<section class="welcome">
    <h1>Bienvenue sur RMA</h1>
    <h6>Explorez les propriétés disponibles dans votre région.</h6>
    <a href="{{route('properties.index')}}" class="bouton bouton-primary">Commencer</a>
</section>

<h2>Quelques biens disponibles</h2>

<section class="property-cards">
    
    @foreach ($properties as $property)
        @include('properties.card', ['property'=>$property])   
    @endforeach

</section>

@endsection