<?php

// Fonction générale de l'app applicable sur n'importe quelles données ou pages
// Fonction pour afficher des informations de manière clair 
function show($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// Fonction permettant de vérifier les erreur presente dans la session 
function check_error(){
    if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

// Fonction pour contaténer la date en français 
function fr_date($date){
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
    return strftime("%d %B", strtotime($date));
}