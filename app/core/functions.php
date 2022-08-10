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
        echo '<p class="status alert alert-danger">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
    }
}

// Fonction pour contaténer la date en français 
function fr_date($date){
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
    return strftime("%d %B", strtotime($date));
}

// fonction pour générer un nom à une image
function generate_filename($length){
    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $text = "";
    for($x = 0; $x < $length; $x++)
    {
        $random = rand(0,61);
        $text .= $array[$random];
    }
    return $text;
}

// Fonction de redirection
function redirect($link){
    header("Location: ".ROOT.$link);
    die;
}