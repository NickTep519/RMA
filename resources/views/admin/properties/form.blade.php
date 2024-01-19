@extends('admin.base')

@section('title', $property->exists ? 'Modifier un bien': 'Ajouter un bien')

@section('content')

<form action="{{route($property->exists ? 'admin.properties.update' : 'admin.properties.store', $property)}}" method="post"> 
    @csrf
    @method($property->exsits ? 'put' : 'post')

    @include('shared.input', ['name'=>'title', 'label'=>'Titre', 'value'=>$property->title ])
    @include('shared.input', ['type'=> 'textarea', 'name'=>'', 'label'=>'Description', 'value'=>$property->description ])
    @include('shared.input', ['name'=>'surface', 'label'=>'Surface', 'value'=>$property->surface ])
    @include('shared.input', ['name'=>'rooms', 'label'=>'Nombre de Piece', 'value'=>$property->rooms ])
    @include('shared.input', ['name'=>'bedrooms', 'label'=>'Nombre de Chambre', 'value'=>$property->bedrooms ])
    @include('shared.input', ['name'=>'floor', 'label'=>'N° d\'étage', 'value'=>$property->floor ])
    @include('shared.input', ['name'=>'price', 'label'=>'Prix', 'value'=>$property->price ])
    @include('shared.input', ['name'=>'neighboorhood', 'label'=>'Quartier', 'value'=>$property->neighboorhood ])
    @include('shared.select', ['name'=>'specificities', 'label' => 'Specificités', 'value'=>$property->specificities()->pluck('id'), 'values'=>$specificities])
    @include('shared.select', ['name'=>'city', 'label' => 'Ville', 'value'=>$property->city()->pluck('id'), 'values'=>$cities])
    @include('shared.checkbox', ['name'=>'sold', 'label'=>'Louer', 'value'=>$property->sold ])

    <button class="btn btn-primary">
        @if ($property->exists)
            Modifier
        @else
            Ajouter
        @endif
    </button>
</form>
    
    
@endsection