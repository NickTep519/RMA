@php
    $timestampActuel = time() ; 
    $timestampProperty = strtotime($property->created_at) ; 

    $differenceEnSecondes = $timestampActuel - $timestampProperty ; 

    $secondes = $differenceEnSecondes ;
    $minutes = $secondes / 60 ; 
    $heures = $minutes / 60 ; 
    $jours =  $heures / 24 ; 
    $semaines = $jours / 7 ; 
    $mois = $semaines / 4 ; 
    $annee = $mois / 12 ; 

@endphp

<div class="property-card">
    <!--<div class="property-image">
        <img src="path/to/image1.jpg" alt="{{$property->title}}">
    </div>-->

    <div class="property-actions">

        <div class="user-big">

            <div class="agent-thumbnail">
                <a href="{{route('managers.show', $property->user)}}">
                    <img src="{{app(App\Service\ImagePathGenerator::class)->generate($property->user->profile_image, ['h'=>50, 'w'=>50])}}" alt="{{$property->user->name}}">
                </a>
            </div>
    
            <div class="user-name">
                <a href="{{route('managers.show', $property->user)}}"><p>{{$property->user->name}}</p></a>
            </div>
        
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $property->user->moyenne_rating)
                        <span class="star filled">&#9733;</span>
                    @else
                        <span class="star">&#9733;</span>
                    @endif
                @endfor
            </div>

        </div>

        <div class="user-biography">
            <p>{{$property->user?->biography}} </p>
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
                Publié il y a {{$secondes}} s
            @else
                @if ($minutes < 60)
                    Publié il y a {{ceil($minutes)}} min
                @else
                    @if ($heures < 24)
                        Publié il y a {{floor($heures)}} h
                    @else
                        @if ($jours < 7)
                            Publié il y a {{floor($jours)}} j
                        @else
                            @if ($semaines < 4)
                                Publié il y a {{floor($semaines)}} sem
                            @else
                                @if ($mois < 12)
                                    Publié il y a {{floor($mois)}} mois
                                @else
                                    Publié il y a {{floor($annee)}} mois
                                @endif
                            @endif
                        @endif
                    @endif              
                @endif
            @endif
        </p>
        <a href="{{route('properties.show', [$property->slug(), $property])}}" class="btn btn-info">Détails</a>
    </div>
 
</div>