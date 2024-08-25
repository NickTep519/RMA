<div class="manager-card">
    <div class="profile-picture">
        <a href="{{route('managers.show', $user)}}"><img src="{{app(App\Service\ImagePathGenerator::class)->generate($user->profile_image, ['h'=>100, 'w'=>100])}}" alt="{{$user->name}}"></a>
    </div>

    <a href="{{route('managers.show', $user)}}"><h2>{{$user->name}}</h2></a>

    <p class="biography">{{$user->biography}}</p>

    <div class="rating">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $user->moyenne_rating)
                <span class="star filled">&#9733;</span>
            @else
                <span class="star">&#9733;</span>
            @endif
        @endfor
    </div>
</div> 