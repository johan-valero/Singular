<?php 

class Social{

    private $succes = "";
    // Fonction qui récupère tout les réseaux de la BDD.
    public function get_all(){
        $DB = Database::newInstance();
        $query = "select * from socials ";
        $result = $DB->read($query);
        return $result;
    }

    // Fonction qui récupère un lien via son nom.
    public function get_one($name){
        $DB = Database::newInstance();
        $query = "select * from socials where name = '$name' limit 1";
        $result = $DB->read($query);
        if($result){
            return $result[0];
        }
    }

    // Fonction de modifications d'un réseaux.
    public function edit($DATA){
        $this->error = "";
        $DB = Database::newInstance();
        foreach($DATA as $key => $value){
            $arr = array();
            $arr['name'] = $key;
            $arr['value'] = $value;
            
            if(empty(trim($arr['value']))){
                $this->error .= "Veuillez entrer une valeur valide. <br>";
            }
            $_SESSION['error'] = $this->error;

            if($key == "Facebook"){
                if(trim($value) != ""  && !strstr($value, "https://")){
                        $value = "https://www.facebook.com/".$value;
                        $arr['value'] = $value;
                }
                else{
                    $arr['value'] = $value;
                }
            }elseif($key == "Instagram"){
                if(trim($value) != ""  && !strstr($value, "https://")){
                    $value = "https://www.instagram.com/".$value;
                    $arr['value'] = $value;
            }
            else{
                $arr['value'] = $value;
            }
            }elseif($key == "Github"){
                if(trim($value) != ""  && !strstr($value, "https://")){
                    $value = "https://www.github.com/".$value;
                    $arr['value'] = $value;
            }
            else{
                $arr['value'] = $value;
            }
            }

            if($this->error == ""){
                $query = "update socials set value = :value where name = :name limit 1";
                $check = $DB->write($query,$arr); 
            }
        }
    } 
}