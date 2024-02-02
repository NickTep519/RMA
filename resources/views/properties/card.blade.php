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
        <a href="#" class="btn btn-info">Détails</a>
    </div>
</div>