<?php 

class Slider{

    private $error = "";
    // Fonction de création d'un carousel
    public function create($DATA, $FILES){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['title'] = $DATA['title'];
        $arr['message'] = $DATA['message'];
        $arr['link'] = $DATA['link'];

        // Si l'input title est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['title']))){
            $this->error .= "Veuillez entrer un titre valide. <br>";
        }

        // Si l'input message est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['message']))){
            $this->error .= "Veuillez entrer un message valide. <br>";
        }

        // Si l'input link est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['link']))){
            $this->error .= "Veuillez entrer un lien valide. <br>";
        }

        $arr['image'] = "";
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "assets/img/sliders/";

        // Si le dossier défini dans $dir existe alors on le crée avec les droit d'admin
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        // Vérifie si il y a un fichier $_FILES et si le type de l'image est le même que ceux du tableau $allowed
        foreach($FILES as $key => $img){
            if(in_array($img['type'], $allowed)){
                $destination = $dir . generate_filename(30). ".jpg";
                move_uploaded_file($img ['tmp_name'], $destination);
                $arr[$key] = $destination ;              
            }else{
                $this->error .= "Veuillez télécharger une image valide (.jpg, .png ou .gif).<br>";
            }
        }

        // Si il n'ya pas de message d'erreur stocker on crée le carousel
        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into sliders (title, message, link, img ) values (:title,:message,:link, :image)";
            $check = $DB->write($query, $arr);
    
            // Si le carousel est crée on redirige vers la page carousel
            if($check){
                redirect("admin/sliders");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 

    // Fonction qui récupère tout les carousels de la BDD
    public function get_all(){
        $DB = Database::newInstance();
        $query = "select * from sliders ";
        $result = $DB->read($query);
        return $result;
    }

    // Getter pour d'un carousel en fonction de l'id
    public function get_one($id){
        $id = (int)$id;
        $DB = Database::newInstance();
        $data = $DB->read("select * from sliders where id_slider = '$id' limit 1 ");
        if($data){
            return $data[0];
        }
    } 

    // Fonction suppression d'un carousel
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from sliders where id_slider = '$id' limit 1 ";
        $DB->write("$query");
    } 

    // Fonction de modifications d'un carousel
    public function edit($DATA,$FILES, $id){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['title'] = $DATA['title'];
        $arr['message'] = $DATA['message'];
        $arr['link'] = $DATA['link'];

        // Si l'input title est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['title']))){
            $this->error .= "Veuillez entrer un titre valide. <br>";
        }

        // Si l'input message est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['message']))){
            $this->error .= "Veuillez entrer un message valide. <br>";
        }

        // Si l'input link est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['link']))){
            $this->error .= "Veuillez entrer un lien valide. <br>";
        }

        if(isset($FILES) && is_array($FILES)){
            $arr['image'] = "";
            $allowed[] = "image/jpeg";
            $allowed[] = "image/png";
            $allowed[] = "image/gif";
            $dir = "assets/img/sliders/";
    
            // Si le dossier défini dans $dir existe alors on le crée avec les droit d'admin
            if(!file_exists($dir)){
                mkdir($dir, 0777, true);
            }
    
            // Vérifie si il y a un fichier $_FILES et si le type de l'image est le même que ceux du tableau $allowed
            foreach($FILES as $key => $img){
                if(in_array($img['type'], $allowed)){
                    $destination = $dir . generate_filename(30). ".jpg";
                    move_uploaded_file($img ['tmp_name'], $destination);
                    $arr[$key] = $destination ;              
                }else{
                    $this->error .= "Veuillez télécharger une image valide (.jpg, .png ou .gif).<br>";
                }
            }
        }else{
            $arr['image'] = $FILES;
        }

        // Si il n'ya pas de message d'erreur stocker on crée le carousel
        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "update sliders set title = :title, message = :message, link = :link, img = :image where id_slider = '$id' limit 1 ";      
            $check = $DB->write($query, $arr);
    
            // Si le carousel est crée on redirige vers la page carousel
            if($check){
                redirect("admin/sliders");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 
}