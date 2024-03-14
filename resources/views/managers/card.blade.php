<div class="manager-card">
    <div class="profile-picture">
        <a href="{{route('managers.show', $user)}}"><img src="path/to/profile_picture1.jpg" alt="Photo de profil"></a>
    </div>

    <a href="{{route('managers.show', $user)}}"><h2>{{$user->name}}</h2></a>

    <p class="biography">Biographie du gestionnaire de biens. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed suscipit, odio sit amet mollis mollis.{{$user->biography}}</p>

    <div class="rating">
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
        <span>&#9733;</span>
    </div>

    <div class="real-time-rating">
        <span>&#9733;</span>
    </div>
</div> 