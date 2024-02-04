<div class="property-card">
    <div class="property-image">
        <img src="path/to/image1.jpg" alt="Property Image">
    </div>
    <div class="property-details">
        <p class="price">Prix: {{ number_format($property->price, thousands_separator: ' ') }} F CFA</p>
        <p class="location">Ville: {{$property->city?->name_city}}</p>
        <p class="neighborhood">Quartier: {{$property->neighborhood}} </p>
        <p class="area">Surface: {{$property->surface}} m²</p>
    </div>
    <div class="property-actions">
        <!-- La miniature de l'agent immobilier -->
        <div class="agent-thumbnail">
            <img src="path/to/agent-thumbnail.jpg" alt="Agent Thumbnail">
        </div>
        <!--  Le système d'étoiles -->
        <div class="rating">
            <!-- Remplacez $property->rating par la valeur de notation actuelle de l'agent immobilier -->
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $property->rating)
                    <span class="star filled">*</span>
                @else
                    <span class="star">*</span>
                @endif
            @endfor
        </div>
        <!-- Le temps de publication -->
        <p class="publish-time">Publié il y a {{ $property->publish_time }} jours</p>
        <a href="#" class="btn btn-info">Détails</a>
    </div>
</div>