@extends('admin.base')

@section('title', 'Les Biens disponibles')

@section('content')
<div>
    <h2>@yield('title')</h2>
    <a href="{{route('admin.properties.create')}}" class="bouton bouton-primary">Ajouter un bien</a>
</div>

<table class="property-table">
    @if ($properties->isNotEmpty())
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Surface (m<sup>2</sup>)</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
    @endif
    <tbody>
        @forelse ($properties as $property)
            <tr>
                <td>{{$property->title}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->price}} F</td>
                <td>{{$property->surface}}</td>
                <td>{{$property->city?->name_city}}</td>
                <td>
                    <a href="{{route('admin.properties.edit', $property)}}" class="bouton bouton-primary">Editer</a>
                    <div>
                        <form action="{{route('admin.properties.destroy', $property)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="bouton bouton-danger">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Vos Biens s'afficherons ici</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
