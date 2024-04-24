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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    
    
    <div class="container">
        <div class="form">
            <div class="title">
                <h2>{{$property->exists ? 'Modifier un bien' : 'Ajouter un bien'}}</h2>
            </div>

            <form action="{{route($property->exists ? 'managers.property.update' : 'managers.property.store', $property)}}" method="post" enctype="multipart/form-data"> 


                @csrf
                @method($property->exsits ? 'put' : 'post')

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
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="inputBox">
                            <label for="cee"> CEE : </label>
                            <input type="number" name="cee" id="cee" value="{{old('cee', $property->cee)}}">
                            @error('cee')
                                <div>
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
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
    
                        <div class="inputBox">
                            <label for="visit_fees">Frais de visite</label>
                            <input type="number" name="visit_fees" id="visit_fees" value="{{old('visit_fees', $property->visit_fees)}}">
                            @error('visit_fees')
                                <div>
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <p class="legendre">CEE : Caution Electricité Eau</p>

            
                <div class="inputBox">
                    <input type="file" name="images[]" multiple required>
                    @error('images.*')
                        <div> {{$message}} </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit"> @if ($property->exists) Modifier @else Ajouter @endif </button>
            </form>
        </div>     

        @if ($images->exists)
            <div class="image">
                @forelse ($images as $image)
                    <div>
                        <img src="{{$image->name}}" alt="{{$property->name}}" class="img">
                        <form action="{{route('image.destroy', $image)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button>Sup</button>
                        </form>
                    </div>
                @empty
                    <p>Il n'y a pas d'image dispoible pour ce bien.</p>
                @endforelse
            </div>                     
        @endif

    </div>

    <footer>

    </footer>
 
</body>
</html>