<div>
    <section class="filters">
        <h2>Filtres</h2>
        <form action="{{route('properties.index')}}" method="GET">
            <input type="number" name="price" placeholder="Budget Max" wire:model.live.debounce.250ms="price" value="{{$values['price']?? ''}}">

            <select wire:model.live="city">
                <option value="0">Ville</option>
                @foreach ($cities as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>

            <input type="text" placeholder="Quartier" wire:model.live.debounce.250ms="neighborhood">

            <input type="text" placeholder="Type de Bien"  wire:model.live.debounce.250ms="type" >

        </form>
    </section>

    <section class="property-cards">

        @forelse ($properties as $property)
            @include('properties.card')
        @empty
            @include('shared.flash-info', ['info'=>'Aucun resultat ne correspond à votre recherche'])
        @endforelse
        
    </section>

    {{$properties->appends(request()->query())->render()}}

</div>
