<div class="property-card">
    <div class="property-image">
        <img src="path/to/image1.jpg" alt="{{$property->title}}">
    </div>
    <div class="property-details">
        <p class="price">Prix : {{ number_format($property->price, thousands_separator: ' ') }} F CFA</p>
        <p class="location">Ville : {{$property->city?->name_city}}</p>
        <p class="neighborhood">Quartier : {{$property->neighborhood}} </p>
        <p class="area">Surface : {{$property->surface}} m²</p>
    </div>
    <div class="property-actions">
        <!-- La miniature de l'agent immobilier -->
        <div class="agent-thumbnail">
            <a href="{{route('managers.show', $property->user_id)}}">
                <img src="path/to/agent-thumbnail.jpg" alt="Agent Thumbnail">
            </a>
        </div>
        <!--  Le système d'étoiles -->
        <div class="rating">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $property->rating)
                    <span class="star filled">&#9733;</span>
                @else
                    <span class="star">&#9733;</span>
                @endif
            @endfor
        </div>
        <!-- Le temps de publication -->
        <p class="publish-time">Publié le {{ $property->created_at }} </p>
        <a href="{{route('properties.show', [$property->slug(), $property])}}" class="btn btn-info">Détails</a>
    </div>
</div>