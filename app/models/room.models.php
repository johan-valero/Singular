<?php

class Room{

    // Affichage des logements en incluant le lit la catégorie et les animaux via le "slug"
    public function get_all_with_details($slug){
        $DB = Database::newInstance();
        return $DB->read("
        select * from rooms 
        join beddings on rooms.id_bedding = beddings.id_bedding 
        join categories on rooms.id_category = categories.id_category 
        join animals on rooms.id_animal = animals.id_animal 
        where slug = :slug", ['slug'=>$slug]);
    }

    // Affichage des 4 derniers logementsen incluant la catégorie pour le template des cards
    public function get_last(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms 
        join categories on rooms.id_category = categories.id_category 
        order by id_room desc 
        limit 6");
    } 
    
    // Affichage des logements en incluant la catégorie
    public function get_all(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms
        join categories on rooms.id_category = categories.id_category 
        ");
    } 

    // Affichage des logements avec toutes les infos liés
    public function get_all_admin(){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms
        join categories on rooms.id_category = categories.id_category 
        join animals on rooms.id_animal = animals.id_animal 
        join beddings on rooms.id_bedding = beddings.id_bedding 
        ");
    } 

    // Affichage des logements pour une recherche en incluant CONCAT qui permet d'inclure la catégorie dans la recherche
    public function search_results($find){
        $DB = Database::newInstance();
        return $DB->read("select * from rooms join categories on rooms.id_category = categories.id_category where CONCAT(name_room, name_category)  like '$find'");
    }

    // Affichage des logements via le formulaire de recherche avancée 
    public function results_filter($GET){
        $DB = Database::newInstance();
        $query = "
        SELECT * FROM rooms 
        JOIN categories 
        ON categories.id_category = rooms.id_category
        JOIN beddings 
        ON beddings.id_bedding = rooms.id_bedding
        JOIN animals 
        ON animals.id_animal = rooms.id_animal
        JOIN avoir
        ON avoir.id_room = rooms.id_room
        JOIN accomodations
        ON accomodations.id_accomodation = avoir.id_accomodation
        ";

        // Mis en place de la query en ajoutant les filtre lorsqu'ils sont set
        if(count($GET) > 0){
            $query .= " WHERE ";
        }

        if(isset($GET['categories'])){
            $query .= " categories.id_category = '$GET[categories]' AND ";
        }

        if(isset($GET['beddings'])){
            $query .= " beddings.id_bedding = '$GET[beddings]' AND ";
        }

        if(isset($GET['animals'])){
            if(count($GET['animals']) > 1){
                $query .= " animals.id_animal IN (";
                foreach($GET['animals'] as $key => $value){
                    $query .= "'$value',";
                }
                $query = trim($query, ',');
                $query .= ") AND";
            }else{
                foreach($GET['animals'] as $key => $value){
                    $query .= " animals.id_animal = '$value' AND";
                }
            }
        }

        if(isset($GET['accomodations'])){
            if(count($GET['accomodations']) > 1){
                $query .= " avoir.id_accomodation IN (";
                foreach($GET['accomodations'] as $key => $value){
                    $query .= "'$value',";
                }
                $query = trim($query, ',');
                $query .= ")";
            }else{
                foreach($GET['accomodations'] as $key => $value){
                    $query .= " avoir.id_accomodation = '$value'";
                }
            }
        }

        $query = trim($query);
        $query = trim($query, 'AND');
        $query = trim($query, 'OR');
        $query .= "
        GROUP BY name_room
        ";

        $rooms = $DB->read($query);
        return $rooms;
    }

    // Fonction de création d'un logement
    public function create($DATA, $FILES){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['description'] = $DATA['description'];
        $arr['category'] = $DATA['categories'];
        $arr['animals'] = $DATA['animals'];
        $arr['beddings'] = $DATA['beddings'];
        $arr['price'] = $DATA['price'];
        $arr['persons'] = $DATA['persons'];
        $arr['address'] = $DATA['address'];
        $arr['zip'] = $DATA['zip'];
        $arr['city'] = $DATA['city'];
        $arr['date_open'] = $DATA['date_open'];
        $arr['date_close'] = $DATA['date_close'];
        $arr['checkin'] = $DATA['checkin'];
        $arr['checkout'] = $DATA['checkout'];
        $arr['area'] = $DATA['area'];
        $arr['slug'] = str_to_slug($DATA['name']);

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide. <br>";
        }

        // Si l'input description est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['description']))){
            $this->error .= "Veuillez entrer une description valide. <br>";
        }

        // Si l'input adress est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['address']))){
            $this->error .= "Veuillez entrer une adresse valide. <br>";
        }

        // Si l'input city est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['city']))){
            $this->error .= "Veuillez entrer une ville valide. <br>";
        }

        // Si l'input price est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['price']) && !is_numeric($arr['price'])){
            $this->error .= "Veuillez entrer un prix valide. <br>";
        }

        // Si l'input persons est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['persons']) && !is_numeric($arr['persons'])){
            $this->error .= "Veuillez entrer un nombre de personne valide. <br>";
        }

        // Si l'input zip est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['zip']) && !is_numeric($arr['zip'])){
            $this->error .= "Veuillez entrer un nombre de personne valide. <br>";
        }

        // Si l'input area est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['area']) && !is_numeric($arr['area'])){
            $this->error .= "Veuillez entrer une superficie valide. <br>";
        }

        // Si l'input date_open est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['date_open'])){
            $this->error .= "Veuillez entrer une date d'ouverture valide. <br>";
        }

        // Si l'input date_close est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['date_close'])){
            $this->error .= "Veuillez entrer une date de fermeture valide. <br>";
        }

        // Si l'input checkin est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['checkin'])){
            $this->error .= "Veuillez entrer un horaire de départ valide. <br>";
        }

        // Si l'input checkout est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['checkout'])){
            $this->error .= "Veuillez entrer une horaire d'arrivée valide. <br>";
        }

        // Si l'input category est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['category']) == "-- Catégories --"){
            $this->error .= "Veuillez séléctionner une catégorie. <br>";
        }

         // Si l'input beddings est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['beddings']) == "-- Lit --"){
            $this->error .= "Veuillez séléctionner une litterie. <br>";
        }

         // Si l'input animals est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['animals']) == "-- Animaux --"){
            $this->error .= "Veuillez séléctionner une option pour les animaux. <br>";
        }

        $arr['image'] = "";
        $arr['image2'] = "";
        $arr['image3'] = "";
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "assets/img/rooms/";

        // Si il n'ya pas de message d'erreur stocker on crée la catégorie
        if ($this->error == ""){
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
                }           
            }
            
            $DB = Database::newInstance();
            $query = "
            insert into rooms(
                name_room, 
                id_category, 
                id_animal, 
                description_room, 
                price_room,
                img_room, 
                img2_room,
                img3_room, 
                slug, 
                id_bedding, 
                persons, 
                address_room, 
                zip_room,
                city_room,
                date_open, 
                date_close, 
                hour_checkin, 
                hour_checkout,
                area_room ) 
                values(
                    :name,
                    :category,
                    :animals,
                    :description, 
                    :price,
                    :image, 
                    :image2 , 
                    :image3, 
                    :slug, 
                    :beddings, 
                    :persons, 
                    :address, 
                    :zip, 
                    :city, 
                    :date_open, 
                    :date_close, 
                    :checkin, 
                    :checkout, 
                    :area)";
                "insert into avoir(
                    id_accomodation,
                    id_room) 
                values(
                    
                )";
            $check = $DB->write($query, $arr);
    
            // Si le logement est crée on redirige vers la page 
            if($check){
                redirect("admin/rooms");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 

    // Affichage d'un logement avec toutes les infos liés via l'id
    public function get_one($id){
        $DB = Database::newInstance();
        $result =  $DB->read("select * from rooms
        join categories on rooms.id_category = categories.id_category 
        join animals on rooms.id_animal = animals.id_animal 
        join beddings on rooms.id_bedding = beddings.id_bedding 
        where id_room = '$id'
        limit 1
        ");
        if($result){
            return $result[0];
        }
    } 

    // Fonction suppression d'un logement
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from rooms where id_room = '$id' limit 1 ";
        $DB->write("$query");
    } 

    // Fonction de modifications d'une catégorie
    public function edit($DATA,$FILES, $id){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['description'] = $DATA['description'];
        $arr['category'] = $DATA['categories'];
        $arr['animals'] = $DATA['animals'];
        $arr['beddings'] = $DATA['beddings'];
        $arr['price'] = $DATA['price'];
        $arr['persons'] = $DATA['persons'];
        $arr['address'] = $DATA['address'];
        $arr['zip'] = $DATA['zip'];
        $arr['city'] = $DATA['city'];
        $arr['date_open'] = $DATA['date_open'];
        $arr['date_close'] = $DATA['date_close'];
        $arr['checkin'] = $DATA['checkin'];
        $arr['checkout'] = $DATA['checkout'];
        $arr['area'] = $DATA['area'];
        $arr['slug'] = str_to_slug($DATA['name']);
        $image = "";

        // Si l'input name est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide. <br>";
        }

        // Si l'input description est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['description']))){
            $this->error .= "Veuillez entrer une description valide. <br>";
        }

        // Si l'input adress est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['address']))){
            $this->error .= "Veuillez entrer une adresse valide. <br>";
        }

        // Si l'input city est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty(trim($arr['city']))){
            $this->error .= "Veuillez entrer une ville valide. <br>";
        }

        // Si l'input price est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['price']) && !is_numeric($arr['price'])){
            $this->error .= "Veuillez entrer un prix valide. <br>";
        }

        // Si l'input persons est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['persons']) && !is_numeric($arr['persons'])){
            $this->error .= "Veuillez entrer un nombre de personne valide. <br>";
        }

        // Si l'input zip est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['zip']) && !is_numeric($arr['zip'])){
            $this->error .= "Veuillez entrer un nombre de personne valide. <br>";
        }

        // Si l'input area est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['area']) && !is_numeric($arr['area'])){
            $this->error .= "Veuillez entrer une superficie valide. <br>";
        }

        // Si l'input date_open est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['date_open'])){
            $this->error .= "Veuillez entrer une date d'ouverture valide. <br>";
        }

        // Si l'input date_close est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['date_close'])){
            $this->error .= "Veuillez entrer une date de fermeture valide. <br>";
        }

        // Si l'input checkin est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['checkin'])){
            $this->error .= "Veuillez entrer un horaire de départ valide. <br>";
        }

        // Si l'input checkout est vide en ajoute un message d'erreur dans la variable privé error 
        if(empty($arr['checkout'])){
            $this->error .= "Veuillez entrer une horaire d'arrivée valide. <br>";
        }

        // Si l'input category est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['category']) == "-- Catégories --"){
            $this->error .= "Veuillez séléctionner une catégorie. <br>";
        }

         // Si l'input beddings est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['beddings']) == "-- Lit --"){
            $this->error .= "Veuillez séléctionner une litterie. <br>";
        }

         // Si l'input animals est vide en ajoute un message d'erreur dans la variable privé error 
        if(trim($arr['animals']) == "-- Animaux --"){
            $this->error .= "Veuillez séléctionner une option pour les animaux. <br>";
        }

        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "assets/img/rooms/";

        // Si le dossier défini dans $dir existe alors on le crée avec les droit d'admin
        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        // Si il n'ya pas de message d'erreur stocker on crée la catégorie
        if ($this->error == ""){
            // Vérifie si il y a un fichier $_FILES et si le type de l'image est le même que ceux du tableau $allowed
            foreach($FILES as $key => $img){
                if(in_array($img['type'], $allowed)){
                    $destination = $dir . generate_filename(30). ".jpg";
                    move_uploaded_file($img ['tmp_name'], $destination);
                    $arr[$key] = $destination;
                    // $image .= ",".$key."= :" .$key;
                    if($key == 'image'){
                        $image .= ",img_room = :" .$key;
                    }elseif($key == 'image2'){
                        $image .= ",img2_room = :" .$key;
                    }elseif($key == 'image3'){
                        $image .= ",img3_room = :" .$key;
                    }      
                }
            }
            $DB = Database::newInstance();
            $query = "
                update rooms set 
                name_room = :name, 
                id_category = :category, 
                id_animal = :animals, 
                description_room = :description, 
                price_room = :price,
                id_bedding = :beddings, 
                persons = :persons, 
                address_room = :address, 
                zip_room = :zip,
                city_room = :city,
                date_open = :date_open, 
                date_close = :date_close, 
                hour_checkin = :checkin, 
                hour_checkout = :checkout,
                area_room = :area,
                slug = :slug
                $image
                where id_room = '$id' limit 1 "; 
                
            $check = $DB->write($query, $arr);
            
            // Si le logement est crée on redirige vers la page logements
            if($check){
                redirect("admin/rooms");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 
}