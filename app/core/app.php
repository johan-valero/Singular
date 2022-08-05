<?php

Class App{
    protected $controller = "home";
    protected $method = "index";
    protected $params;

    public function __construct(){

        $url = $this->parseURL();

        // si le fichier existe on remplace la partie dans l'url en détruisant $url[0] = "home" et en remplacant par la fichier voulu.
        if(file_exists("../app/controllers/" .strtolower($url[0]).".php")){
            $this->controller = strtolower($url[0]);
            unset($url[0]);
        }
        
        require "../app/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Si la methode (la fonction issu d'une classe) existe on supprime la 2eme partie de l'url 
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1]) && is_callable([$this->controller, $url[1]])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Permet de gérer les reste de l'url 
        $this->params = (count($url) > 0) ? $url: ["home"]; 
        // Lance les méthodes et fonctions issus des classes
        call_user_func_array([$this->controller,$this->method], $this->params);
    }

    // Fonction pour décomposé l'URL
    private function parseURL(){
    $url = isset($_GET['url']) ? $_GET['url'] : "home";
    return explode("/", filter_var(trim($url, "/"),FILTER_SANITIZE_URL));
    }
}