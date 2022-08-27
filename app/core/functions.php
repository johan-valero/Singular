<?php

// Fonction générale de l'app applicable sur n'importe quelles données ou pages
// Fonction pour afficher des informations de manière clair 
function show($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// Fonction permettant de vérifier les erreurs presentent dans la session 
function check_error(){
    if(isset($_SESSION['error']) && $_SESSION['error'] != ""){
        echo '<p class="status alert alert-danger">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
    }
}

// Fonction permettant de vérifier les messages présents dans la session 
function check_succes(){
    if(isset($_SESSION['succes']) && $_SESSION['succes'] != ""){
        echo '<p class="status alert alert-success">'.$_SESSION['succes'].'</p>';
        unset($_SESSION['succes']);
    }
}

// Fonction pour contaténer la date en français 
function fr_date($date){
    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
    return utf8_encode(strftime("%d %B", strtotime($date)));
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

// Générer un slug
function str_to_slug($name){
    $name = preg_replace('~[^\\pL0-9_]+~u', '-', $name);
    $name = preg_replace("/(é|è|ê|ë)/", "e", $name);
    $name = trim($name, "-");
    $name = iconv("utf-8", "us-ascii//TRANSLIT", $name);
    $name = strtolower($name);
    $name = preg_replace('~[^-a-z0-9_]+~', '', $name);
    return $name;
}

// Récupére toutes les dates entre 2
function get_between_dates($checkin, $checkout){
    $all_dates = [];
    $checkin = strtotime($checkin);
    $checkout = strtotime($checkout);
    for ($currentDate = $checkin; 
        $currentDate <= $checkout; 
        $currentDate += (86400)) {
        $date = date('Y-m-d', $currentDate);
        $all_dates[] = $date;
    }
    return $all_dates;
}