<?php

session_start();

// $root = Chemin dynamique pour retrouvé les fichiers CSS etc
$root = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] .":" .$_SERVER['SERVER_PORT'] . $_SERVER['PHP_SELF'];
$root = str_replace("index.php", "", $root);

define('ROOT', $root);
define('ASSETS', $root . "assets/");

include "../app/init.php";

$app = new App();