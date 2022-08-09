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
        $_SESSION['error'] = "";
        $DB = Database::newInstance();
        $arr['product'] = ucwords($DATA->product);
        $arr['description'] = str_replace("'", "`",$DATA->description);
        $arr['quantity'] = $DATA->quantity;
        $arr['category'] = ucwords($DATA->category);
        $arr['price'] = $DATA->price;
        $arr['date'] = date("Y-m-d H:i:s");
        $arr['user_url'] = $_SESSION['user_url'];
        $arr['slag'] = $this->str_to_url($DATA->product);

        if(!is_numeric($arr['quantity'])){
            $_SESSION['error'] .= "Veuillez entrer une quantité de produit valide <br>";
        }

        if(!is_numeric($arr['category'])){
            $_SESSION['error'] .= "Veuillez entrer un nom de catégorie valide <br>";
        }

        if(!is_numeric($arr['price'])){
            $_SESSION['error'] .= "Veuillez entrer un prix de produit valide <br>";
        }

        // Sur que le slag est unique
        $slag_arr['slag'] = $arr['slag'];
        $query = "select slag from products where slag = :slag limit 1";
        $check = $DB->read($query);

        if($check){
            $arr['slag'] .= "-".rand(0,99999);
        }

        $arr['image'] = "";
        $arr['image2'] = "";
        $arr['image3'] = "";

        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";

        $dir = "uploads/";

        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        // Check for files
        foreach($FILES as $key => $img_row){
            if($img_row['error'] == 0 && in_array($img_row['type'], $allowed)){
                $destination = $dir . $this->generate_filename(30). ".jpg";
                move_uploaded_file($img_row ['tmp_name'], $destination);
                $arr[$key] = $destination ;              
            }
        }

        if (!isset($_SESSION['error']) || ($_SESSION['error'] == "")){
            $DB = Database::newInstance();
            $query = "insert into products (name_product, description_product, quantity_product, category_product, price_product, date_product , user_url, image_product, image2_product, image3_product, slag ) values (:product, :description, :quantity, :category, :price, :date, :user_url, :image, :image2, :image3, :slag)";
            $check = $DB->write($query, $arr);

            if($check){
                return true;
            }
        }
        return false;
    } 

}