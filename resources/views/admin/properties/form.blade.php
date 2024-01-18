@extends('admin.base')

@section('title', $property->exists ? 'Modifier un bien': 'Ajouter un bien')

@section('content')

<form action="{{route($property->exists ? 'admin.properties.update' : 'admin.properties.store', $property)}}" method="post"> 
    @csrf
    @method($property->exsits ? 'put' : 'post')

    @include('shared.input', ['name'=>'title', 'lable'=>'Titre', 'value'=>$property ])

    <button class="btn btn-primary">
        @if ($property->exists)
            Modifier
        @else
            Ajouter
        @endif
    </button>
</form>
    
    
@endsection