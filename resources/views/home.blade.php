@extends('base')  

@section('title', 'RMA')
    
@section('content')


<div class="welcome-carousel">
    <!-- Les images du carrousel -->
    <div><img src="https://media.istockphoto.com/id/1004121676/fr/photo/louer-un-chambre-appartement-maison-en-ligne-concept.jpg?s=1024x1024&w=is&k=20&c=YQ8tf3_CroZnw3AYF2kx736LpHsV5Uha-qgr7_J_iJM=" alt="Bienvenue sur RMA"></div>
    <div><img src="https://media.istockphoto.com/id/827615404/fr/photo/maison-de-papier-sous-une-loupe.jpg?s=612x612&w=is&k=20&c=GUGv8bBTXk--A6xft6zEJYYGYggWbU6ZhucAEipIPQw=" alt="Découvrez nos propriétés"></div>
    <div><img src="https://media.istockphoto.com/id/1061234002/fr/photo/acheter-maison-immobilier-concept-diff%C3%A9rentes-offres-de-biens-en-ligne.jpg?s=612x612&w=is&k=20&c=czibso1_UIVgIXXWrdzhL2OucyPvFbfmLhfOd6oqDY8=" alt="Trouvez la maison de vos rêves"></div>
</div>

<section class="welcome">
    <h1>Bienvenue sur RMA</h1>
    <p>Explorez les dernières propriétés disponibles dans votre région.</p>
    <a href="#" class="btn btn-primary">Commencer</a>
</section>

<h2>Les derniers biens</h2>

<section class="property-cards">

    @foreach ($properties as $property)
        @include('properties.card', ['property'=>$property])    
    @endforeach

</section>


@endsection