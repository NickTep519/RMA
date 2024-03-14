// Fonction pour ouvrir l'onglet principal
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Fonction pour ouvrir les sous-onglets (années)
function openSubTab(evt, subTabName) {
    var i, subtabcontent, subtablinks;
    subtabcontent = document.getElementsByClassName("subtabcontent");
    for (i = 0; i < subtabcontent.length; i++) {
        subtabcontent[i].style.display = "none";
    }
    subtablinks = document.getElementsByClassName("subtablink");
    for (i = 0; i < subtablinks.length; i++) {
        subtablinks[i].className = subtablinks[i].className.replace(" active", "");
    }
    document.getElementById(subTabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Fonction pour ouvrir les sous-sous-onglets (mois)
function openSubSubTab(evt, subSubTabName) {
    var i, subsubtabcontent, subsubtablinks;
    subsubtabcontent = document.getElementsByClassName("subsubtabcontent");
    for (i = 0; i < subsubtabcontent.length; i++) {
        subsubtabcontent[i].style.display = "none";
    }
    subsubtablinks = document.getElementsByClassName("subsubtablink");
    for (i = 0; i < subsubtablinks.length; i++) {
        subsubtablinks[i].className = subsubtablinks[i].className.replace(" active", "");
    }
    document.getElementById(subSubTabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Ouvrir l'onglet par défaut
document.getElementById("defaultOpen").click();
document.getElementById("defaultSubOpen").click();
