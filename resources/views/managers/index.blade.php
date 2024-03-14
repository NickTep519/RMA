@vite(['resources/css/gestionnaire.css','resources/css/app.css', 'resources/js/app.js'])

@extends('base')

@section('title', 'RMA-Gestionnaires de biens')

@section('content')


<section class="filters">
    <h2>Filtres</h2>
    <form action="{{route('managers.index')}}" method="GET">
        <input type="text" name="user" placeholder="Trouver un gestionnaire de bien" value="{{$values['user']?? ''}}">

        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
</section>

<h2>Trouver un gestionnaire de bien confiant</h2>

<div class="manager-cards">
    
    @forelse ($users as $user)
    <div class="manager-card">
        <div class="profile-picture">
            <a href="{{route('managers.show', $user)}}"><img src="path/to/profile_picture1.jpg" alt="Photo de profil"></a>
        </div>
    
        <a href="{{route('managers.show', $user)}}"><h2>{{$user->name}}</h2></a>
    
        <p class="biography">Biographie du gestionnaire de biens. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit, odio sit amet mollis mollis.{{$user->biography}}</p>

        <div class="rating">
            <span>&#9733;</span>
            <span>&#9733;</span>
            <span>&#9733;</span>
            <span>&#9733;</span>
            <span>&#9733;</span>
        </div>

        <div class="real-time-rating">
            <span>&#9733;</span>
        </div>
    </div> 
    @empty
        <div class="flash-message success">
            <p>Aucun résultat ne correspond à votre recherche </p>
        </div>
    @endforelse

</div>    

   
{{$users->appends(request()->query())->render()}}


@endsection