// Fonction pour ouvrir un onglet
function openTab(evt, tabName) {
    // Masquer tous les contenus des onglets
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Supprimer la classe "active" de tous les liens d'onglets
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Afficher le contenu de l'onglet sélectionné et ajouter la classe "active" au lien d'onglet correspondant
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Afficher le premier onglet par défaut
document.getElementById("defaultOpen").click();
