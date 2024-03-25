<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du bien</title>
    @vite(['resources/css/property-show.css','resources/js/app.js'])
</head>
<body>

    <div class="property-details">
        <h1>{{$property->title}}</h1>
        <div class="carousel">
            <img src="path/to/image1.jpg" alt="Image 1">
            <img src="path/to/image2.jpg" alt="Image 2">
            <img src="path/to/image3.jpg" alt="Image 3">
        </div>
        
        <div class="property-info">
            <p>{{$property->description}}</p>
            <p>Surface: {{$property->surface}} m²</p>
            <p>Prix: {{ number_format($property->price, thousands_separator: ' ')}} F CFA</p>
            <!-- Ajoutez d'autres informations sur le bien -->
            <a href="https://{{$property->user?->phone}}" class="whatsapp-link">Contacter via WhatsApp</a>
        </div>
    </div>

    <script>
        // JavaScript pour le carrousel (si nécessaire)
    </script>

</body>
</html>
