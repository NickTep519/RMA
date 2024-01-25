
<div class="card">
    <img src="path/to/image2.jpg" alt="Property 2">
    <div class="card-details">
        <h3>{{ number_format($property->price, thousands_separator: ' ') }} F CFA</h3>
        <p>{{$property->title}}</p>
        <p>Ville : {{$property->city?->name_city}}</p>
        <p>Quartier : {{$property->neighborhood}}</p>
        <p>Surface: {{$property->surface}} m²</p>
    </div>
</div>