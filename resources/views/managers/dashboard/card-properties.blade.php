<div class="properti-card">
    <a href="{{route('properties.show', [$property->slug(), $property])}}"><h3 class="properti-title">{{ $property->title }}</h3></a>
    <p class="properti-description">{{ $property->description }}</p>

    <div class="properti-buttons">
        <a href="{{route('managers.property.edit', $property)}}">
            <button class="edit-properti-button">Modifier</button>
        </a>

        <form action="{{route('managers.property.destroy', $property)}}" method="POST">
            @csrf
            @method('delete')
            <button class="delete-properti-button">Supprimer</button>
        </form>
    </div>

    <!-- Photos du bien immobilier -->
    <div class="properti-photos">
        <!-- photos ici -->
    </div>
</div> 