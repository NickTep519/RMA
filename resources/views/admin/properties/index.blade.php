@extends('admin.base')

@section('title', 'Les Biens disponibles')

@section('content')


<div>
    <h2>@yield('title')</h2>
    <a href="{{route('admin.properties.create')}}" class="btn btn-primary">Ajouter un bien</a>
</div>
<table>
@if ($properties->isNotEmpty())
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Surface (m <sup>2</sup>)</th>
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
            <td>{{$property->surface}} </td>
            <td>{{$property->city?->name_city}}</td>
            <td>
                <a href="{{route('admin.properties.edit', $property)}}" class="btn btn-primary">Editer</a>
                <div>
                    <form action="{{route('admin.properties.destroy', $property)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
@empty
{{"Vos Biens s'afficherons ici"}}    
@endforelse
    </tbody>
</table>
    
@endsection