<?php

// Nom du site
define("WEBSITE_TITLE", 'Singular');

// Nom de la Database
if($_SERVER['SERVER_NAME'] == "localhost"){
    define('DB_NAME', "db_singular");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_TYPE', "mysql");
    define('DB_HOST', "localhost");
}

// Definir la global url
$url = 'http://'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] .  str_replace("index.php", "",$_SERVER['PHP_SELF']) . str_replace("url=", "",$_SERVER['QUERY_STRING']);

// Défini l'url pour le serveur online
// $url = 'http://mywebsite.com/' . str_replace("url=", "",$_SERVER['QUERY_STRING']);
define('FULL_URL', $url);

// Défini l'addresse mail ou sont envoyé les mails de commandes et de messages 
define('EMAIL_WEBSITE', "contact.singular.jv@gmail.com");

// Activer l'affichage des erreurs
define('DEBUG', true);
if(DEBUG){
    ini_set('display_errors',1);
}else{
    ini_set('display_errors',0);
}