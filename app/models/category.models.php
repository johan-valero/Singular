<?php

class Category{
    private $error = "";
    // Affichage des catégories
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from categories");
    }

    // Getter pour d'une catégorie en fonction de l'id
    public function get_one($id){
        $id = (int)$id;
        $DB = Database::newInstance();
        $data = $DB->read("select * from categories where id_category = '$id' limit 1 ");
        if($data){
            return $data[0];
        }
    } 

    // Fonction suppression d'une catégorie
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from categories where id_category = '$id' limit 1 ";
        $DB->write("$query");
    } 
    
    // Affiche les logements via le nom de catégorie
    public function get_rooms_by_name_category($name){
        $DB = Database::newInstance();
        return $DB->read("select * from categories 
        join rooms on categories.id_category = rooms.id_category 
        where name_category = '$name'");
    }

    // Affiche les données d'une catégorie via son nom
    public function get_cat($name){
        $DB = Database::newInstance();
        return $DB->read("select * from categories  
        where name_category = '$name'");
    }

    // Affiche les logements d'une même category
    public function get_rooms_by_id_category($id){
        $DB = Database::newInstance();
        return $DB->read("select * from categories 
        join rooms on categories.id_category = rooms.id_category 
        join beddings on beddings.id_bedding = rooms.id_bedding
        join animals on animals.id_animal = rooms.id_animal   
        where categories.id_category = '$id'
        order by id_room desc
        limit 4"
        );
    }

    // Fonction création d'une catégorie
    public function create($DATA, $FILES){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['description'] = $DATA['description'];
        $arr['icon'] = $DATA['icon'];

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide <br>";
        }

        // Si l'input description est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['description']))){
            $this->error .= "Veuillez entrer une description valide <br>";
        }

        // Si l'input icon est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['icon']))){
            $this->error .= "Veuillez entrer une icone valide <br>";
        }

        $arr['image'] = "";
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "assets/img/categories/";

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

        // Si il n'ya pas de message d'erreur stocker on crée la catégorie
        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into categories (name_category, description_category, icon_category, img_category ) values (:name,:description,:icon,:image)";
            $check = $DB->write($query, $arr);
    
            // Si la catégorie est crée on redirige vers la page 
            if($check){
                redirect("admin/categories");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 

    // Fonction de modifications d'une catégorie
    public function edit($DATA,$FILES, $id){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['description'] = $DATA['description'];
        $arr['icon'] = $DATA['icon'];

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide <br>";
        }

        // Si l'input description est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['description']))){
            $this->error .= "Veuillez entrer une description valide <br>";
        }

        // Si l'input icon est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['icon']))){
            $this->error .= "Veuillez entrer une icone valide <br>";
        }

        if(isset($FILES) && is_array($FILES)){
            $arr['image'] = "";
            $allowed[] = "image/jpeg";
            $allowed[] = "image/png";
            $allowed[] = "image/gif";
            $dir = "assets/img/categories/";
    
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

        // Si il n'ya pas de message d'erreur stocker on crée la catégorie
        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "update categories set name_category = :name, description_category = :description, icon_category = :icon, img_category = :image where id_category = '$id' limit 1 ";      
            $check = $DB->write($query, $arr);
    
            // Si le partenaire est crée on redirige vers la page catégorie
            if($check){
                redirect("admin/categories");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 
}