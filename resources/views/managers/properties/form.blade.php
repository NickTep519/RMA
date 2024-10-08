<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/form.css', 'ressources/js/app.js'])
    <title>{{$property->exists ? 'Modifier un bien' : 'Ajouter un bien'}}</title>
</head>
<body>   
    @include('shared.flash')
    
    <div class="container">

        @if ($errors->any())
            <div class="alt alt-dgr">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 

        <div class="form">
            <div class="title">
                <h2>{{$property->exists ? 'Modifier un bien' : 'Ajouter un bien'}}</h2>
            </div>

            <form action="{{route($property->exists ? 'managers.property.update' : 'managers.property.store', $property)}}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @if ($property->exists)
                    @method('PUT')
                @endif

                <fieldset>
                    <legend>Infos Genérales</legend>
                    <div class="info">
                        @include('shared.input', ['name'=>'title', 'label'=>'Titre', 'value'=>$property->title ])
                        @include('shared.input', ['type'=> 'textarea', 'name'=>'description', 'label'=>'Description', 'value'=>$property->description ])
                        @include('shared.input', ['name'=>'surface', 'label'=>'Surface', 'value'=>$property->surface ])
                        @include('shared.input', ['name'=>'rooms', 'label'=>'Nombre de Piece', 'value'=>$property->rooms ])
                        @include('shared.input', ['name'=>'bedrooms', 'label'=>'Nombre de Chambre', 'value'=>$property->bedrooms ])
                        @include('shared.input', ['name'=>'floor', 'label'=>'N° d\'étage', 'value'=>$property->floor ])
                        @include('shared.input', ['name'=>'price', 'label'=>'Loyer', 'value'=>$property->price ])
                        @include('shared.input', ['name'=>'neighborhood', 'label'=>'Quartier', 'value'=>$property->neighborhood ])
                        @include('shared.select', ['name'=>'city', 'label' => 'Ville', 'value'=>$property->city()->pluck('id'), 'values'=>$cities])
                        @include('shared.checkbox', ['name'=>'sold', 'label'=>'Louer', 'value'=>$property->sold ])
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Condition</legend>
                    <div class="condition">
                        <div class="inputBox">
                            <label for="rent_advance">Avance sur Loyer : </label>
                            <input type="number" name="rent_advance" id="rent_advance" value="{{old('rent_advance', $property->rent_advance)}}" placeholder="Nombre de mois">
                            @error('rent_advance')
                                <div class="error">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="inputBox">
                            <label for="rent_prepaid">Prépayé : </label>
                            <input type="number" name="rent_prepaid" id="rent_prepaid" value="{{old('rent_prepaid', $property->rent_prepaid)}}" placeholder="Nombre de mois">
                            @error('rent_prepaid')
                                <div class="error">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="inputBox">
                            <label for="cee"> CEE : </label>
                            <input type="number" name="cee" id="cee" value="{{old('cee', $property->cee)}}">
                            @error('cee')
                                <div class="error">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </fieldset>
          
                <fieldset>
                    <legend>Autres</legend>
                    <div class="others">
                        <div class="inputBox">
                            <label for="commission">Commission</label>
                            <input type="number" name="commission" id="commission" value="{{old('commission', $property->commission)}}">
                            @error('commission')
                                <div class="error">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="inputBox">
                            <label for="visit_fees">Frais de visite</label>
                            <input type="number" name="visit_fees" id="visit_fees" value="{{old('visit_fees', $property->visit_fees)}}">
                            @error('visit_fees')
                                <div class="error">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <p class="legendre">CEE : Caution Electricité Eau</p>

            
                <div class="inputBox">
                    <input type="file" name="images[]" multiple @if (!$property->exists) required @endif>
                    @error('images.*')
                        <div> {{$message}} </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit"> @if ($property->exists) Modifier @else Ajouter @endif </button>
            </form>
        </div>     

        @if (!$images->isEmpty())
            <div class="image">
                @forelse ($images as $image)
                    <div>
                        <img src="{{app(App\Service\ImagePathGenerator::class)->generate($image->name, ['h'=>200, 'w'=>200])}}" alt="{{$property->name}}" class="img">
                        <form action="{{route('image.destroy', $image)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#5f6368"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                        </form>
                    </div>
                @empty
                    <p>Il n'y a pas d'image dispoible pour ce bien.</p>
                @endforelse
            </div>                     
        @endif

    </div>

    <footer>
        <a href="{{route('home.index')}}">RMA</a>
    </footer>
 
</body>
</html>