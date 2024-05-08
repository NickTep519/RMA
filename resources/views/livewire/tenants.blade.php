<div>
    <label for="annee">Choisissez l'année :</label>
    <input type="number" wire:model="annee" id="annee">

    <label for="mois">Choisissez le mois :</label>
    <select wire:model="mois" id="mois">
        <option value="1">Janvier</option>
        <option value="2">Février</option>
        <!-- Ajoute les autres mois ici -->
    </select>

    <div>
        <input type="text" placeholder="Recher un Locataire" wire:model="search">
    </div>

    <!-- Affiche les données -->
    <div id="donnees-container">
            @include('managers.dashboard.tab-tenants')
    </div>   
</div>
