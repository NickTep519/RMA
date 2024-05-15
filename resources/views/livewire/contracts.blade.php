<div>

    <input type="number" wire:model.live="annee" id="annee">
    
    <select wire:model.live="mois" id="mois">
        <option value="1">Janvier</option>
        <option value="2">Février</option>
        <option value="3">Mars</option>
        <option value="4">Avril</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juillet</option>
        <option value="8">Août</option>
        <option value="9">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select> <br> <br>

    <div>
        <input type="text" placeholder="Retrouver un Locataire" wire:model.live.debounce.250ms="search">
    </div>

    <div id="donnees-container">

        @if ($contracts->isEmpty())
            <p class="resultats">Au résultat ne correspond à votre recherche</p>
        @else
            @include('managers.dashboard.tab-tenants')
        @endif
        
    </div>   
</div>
