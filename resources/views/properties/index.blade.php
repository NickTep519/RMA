@extends('base')

@section('title', 'Les biens disponibles')
    

@section('content')

    <section class="filters">
        <h2>Filtres</h2>
        <form action="{{route('properties.index')}}" method="GET">
            <input type="number" name="price" placeholder="Budget Max" value="{{$values['price']?? ''}}">

            <select name="city">
                <option value="">Ville</option>
                @foreach ($cities as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>

            <input type="text" name="neighborhood" placeholder="Quartier" value="{{$values['neighborhood']?? ''}}">

            <input type="text" name="title" placeholder="Type de Bien" value="{{$values['title']?? ''}}">

            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
    </section>

    <section class="property-cards">

        @forelse ($properties as $property)
            @include('properties.card')
        @empty
            <p>Aucun bien ne correspond à votre recherche</p>
        @endforelse
    </section>

    {{$properties->appends(request()->query())->render()}}

@endsection