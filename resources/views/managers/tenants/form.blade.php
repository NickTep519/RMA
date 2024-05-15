<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/form.css', 'ressources/js/app.js'])
    <title>{{$tenant->exists ? 'Modifiez ls données d\'un locataire' : 'Ajouter un Locataire'}}</title>
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
                <h2>{{$tenant->exists ? 'Modifier les données d\'un locataire' : 'Ajouter un Locataire'}}</h2>
            </div>

            <form action="{{route($tenant->exists ? 'managers.tenant.edit' : 'managers.tenant.create', $tenant)}}" method="post">
                @csrf
                @method($tenant->exists ? 'put' : 'post')

                @include('shared.input', ['name'=>'name', 'label'=>'Nom du Locataire', 'value'=>$tenant->name ]) <br>
                @include('shared.input', ['name'=>'rent', 'label'=>'Loyer', 'value'=>$tenant->rent ]) <br>
                @include('shared.select', ['name'=>'property', 'label' => 'Bien', 'value'=>$tenant->property()->pluck('id'), 'values'=>$properties]) <br>
                @include('shared.checkbox', ['name'=>'sold', 'label'=>'', 'value'=>$tenant->sold ])
                



            </form>

       </div>
    </div>
</body>
</html>