<div>

    <section class="filters">
        <form action="{{route('managers.index')}}" method="GET">
            <input type="text" placeholder="Trouver un gestionnaire de bien" wire:model.live.debounce.250ms="user" >
        </form>
    </section>
    
    <h2>Trouver un gestionnaire de bien confiant</h2>
    
    <div class="manager-cards">
        
        @forelse ($users as $user)
            @include('managers.card', ['user'=> $user])
        @empty
            @include('shared.flash-info', ['info'=>'Aucun résultat ne correspond à votre recherche'])
        @endforelse
    
    </div>    
    
       
    {{$users->appends(request()->query())->render()}}

</div>
