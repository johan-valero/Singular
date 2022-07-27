<?php

Class Controller{
    public function view($path, $data =[]){

        if(is_array($data)){
            extract($data);
        }
        if(file_exists("../app/views/" .$path.".php")){
            include "../app/views/" .$path.".php";
        }else{
            include "../app/views/404.php";
        }
    }

    // Chargement dynamique du models des qu'il est détecter par le nom 
    public function load_model($model){
        if(file_exists("../app/models/" .strtolower($model).".models.php")){
            include_once "../app/models/".strtolower($model).".models.php";
            // On retourne une instance
            return $a = new $model();
        }
        return false;
    }
}