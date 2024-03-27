@php
    $timestampActuel = time() ; 
    $timestampProperty = strtotime($property->created_at) ; 

    $differenceEnSecondes = $timestampActuel - $timestampProperty ; 

    $secondes = $differenceEnSecondes ;
    $minutes = $secondes / 60 ; 
    $heures = $minutes / 60 ; 
    $jours =  $heures / 24 ; 
    $semaines = $jours / 7 ; 

@endphp

<div class="property-card">
    <!--<div class="property-image">
        <img src="path/to/image1.jpg" alt="{{$property->title}}">
    </div>-->

    <div class="property-actions">

        <div class="user-big">
            <div class="agent-thumbnail">
                <a href="{{route('managers.show', $property->user)}}">
                    <img src="path/to/agent-thumbnail.jpg" alt="Agent Thumbnail">
                </a>
            </div>
    
            <div class="user-name">
                <p>{{$property->user->name}}</p>
            </div>
        
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $property->user->moyenne_rating)
                        <span class="star filled">&#9733;</span>
                        <!--<i class="star filled">&#9733;</i>-->
                    @else
                        <!--<i class="star">&#9733;</i>-->
                        <span class="star">&#9733;</span>
                    @endif
                @endfor
            </div>

        </div>

        <div class="user-biography">
            <p>{{$property->user?->user?->biography}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis est deleniti aliquid quia repellendus sunt, optio deserunt vero.</p>
        </div>
    </div>
    
    <div class="property-details">
        <p class="title">{{$property->title}}</p>
        <p class="price">Prix : {{ number_format($property->price, thousands_separator: ' ') }} F CFA</p>
        <p class="location">Ville : {{$property->city?->name_city}}</p>
        <p class="neighborhood">Quartier : {{$property->neighborhood}} </p>
        <p class="area">Surface : {{$property->surface}} m²</p>
    </div>

    <div class="property-others">
        <p class="publish-time"> 
            @if ($secondes < 1)
                Publié il y a {{$secondes}}s
            @else
                @if ($minutes < 60)
                    Publié il y a {{ceil($minutes)}}min
                @else
                    @if ($heures < 24)
                        Publié il y a {{floor($heures)}}h
                    @else
                        @if ($semaines < 7)
                            Publié il y a {{floor($jours)}} j
                        @else
                            Publié il y a {{floor($semaines)}} sem
                        @endif
                    @endif
                    
                @endif
            @endif
        </p>
        <a href="{{route('properties.show', [$property->slug(), $property])}}" class="btn btn-info">Détails</a>
    </div>
 
</div>