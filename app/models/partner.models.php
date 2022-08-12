<?php 

class Partner{

    private $error = "";
    // Fonction de création d'un partenaire
    public function create($DATA, $FILES){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['link'] = $DATA['link'];

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide <br>";
        }

        // Si l'input link est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['link']))){
            $this->error .= "Veuillez entrer un lien valide <br>";
        }

        $arr['image'] = "";
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "assets/img/partners/";

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

        // Si il n'ya pas de message d'erreur stocker on crée le partenaire
        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into partners (name_partner, link_partner, img_partner ) values (:name,:link,:image)";
            $check = $DB->write($query, $arr);
    
            // Si le partenaire est crée on redirige vers la page partenaire
            if($check){
                redirect("admin/partners");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 

    // Fonction qui récupère tout les partenaires de la BDD
    public function get_all(){
        $DB = Database::newInstance();
        $query = "select * from partners ";
        $result = $DB->read($query);
        return $result;
    }

    // Getter pour d'un partenaire en fonction de l'id
    public function get_one($id){
        $id = (int)$id;
        $DB = Database::newInstance();
        $data = $DB->read("select * from partners where id_partner = '$id' limit 1 ");
        if($data){
            return $data[0];
        }
    } 

    // Fonction suppression d'un partenaire
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from partners where id_partner = '$id' limit 1 ";
        $DB->write("$query");
    } 

    // Fonction de modifications d'un partenaire
    public function edit($DATA,$FILES, $id){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['link'] = $DATA['link'];

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide <br>";
        }

        // Si l'input link est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['link']))){
            $this->error .= "Veuillez entrer un lien valide <br>";
        }

        // Si il n'ya pas de message d'erreur stocker on crée le partenaire
        if ($this->error == ""){
            $arr['image'] = "";
            $allowed[] = "image/jpeg";
            $allowed[] = "image/png";
            $allowed[] = "image/gif";
            $dir = "assets/img/partners/";
    
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
        
            $DB = Database::newInstance();
            $query = "update partners set name_partner = :name, link_partner = :link, img_partner = :image where id_partner = '$id' limit 1 ";      
            $check = $DB->write($query, $arr);
    
            // Si le partenaire est crée on redirige vers la page partenaire
            if($check){
                redirect("admin/partners");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 
}