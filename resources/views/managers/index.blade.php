@vite(['resources/css/managers.css'])

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
        @include('managers.card', ['user'=> $user])
    @empty
        @include('shared.flash-info', ['info'=>'Aucun résultat ne correspond à votre recherche'])
    @endforelse

</div>    

   
{{$users->appends(request()->query())->render()}}


@endsection