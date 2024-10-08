<div>

    <input type="number" wire:model.live="year" id="year">
    
    <select wire:model.live="month" id="month">
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
        <input type="text" wire:model.live.debounce.250ms="tenant_name"  placeholder="Retrouver un Locataire" >
    </div>

    <div id="donnees-container">

        @if ($contracts->isEmpty())

            @if ( $year === Carbon\Carbon::now()->year && $month === Carbon\Carbon::now()->month )
                
                @if ($tenant_name != '')
                    <p class="resultats tableau">Aucun résultat ne correspond à votre recherche</p>
                @else
                    <p class="resultats tableau">Aucun contrat n'a encore été emis pour ce mois en cours. </p>
                @endif

            @else
                <p class="resultats tableau">Aucun résultat ne correspond à votre recherche</p>
            @endif

        @else

            @include('managers.dashboard.tab-tenants')

        @endif
        
    </div>   

</div>