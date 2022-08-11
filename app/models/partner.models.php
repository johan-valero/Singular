<?php 

class Partner{

    private $error = "";
    // Fonction de création d'un partenaire
    public function create($DATA, $FILES){
        $this->error = "";
        $DB = Database::newInstance();
        $arr['name'] = $DATA['name'];
        $arr['link'] = $DATA['link'];

        if(empty(trim($arr['name']))){
            $this->error .= "Veuillez entrer un nom de partenaire valide <br>";
        }

        if(empty(trim($arr['link']))){
            $this->error .= "Veuillez entrer un lien valide <br>";
        }

        $arr['image'] = "";
        $allowed[] = "image/jpeg";
        $allowed[] = "image/png";
        $allowed[] = "image/gif";
        $dir = "uploads/";

        if(!file_exists($dir)){
            mkdir($dir, 0777, true);
        }

        // Check for files
        foreach($FILES as $key => $img){
            if(in_array($img['type'], $allowed)){
                $destination = $dir . generate_filename(30). ".jpg";
                move_uploaded_file($img ['tmp_name'], $destination);
                $arr[$key] = $destination ;              
            }else{
                $this->error .= "Veuillez télécharger une image valide (.jpg, .png ou .gif).<br>";
            }
        }

        if ($this->error == ""){
            $DB = Database::newInstance();
            $query = "insert into partners (name_partner, link_partner, img_partner ) values (:name,:link,:image)";
            $check = $DB->write($query, $arr);
    
            if($check){
                redirect("admin/partners");
                return true;
            }
        }
        $_SESSION['error'] = $this->error;
    } 

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
        return $data[0];
    } 

    // Fonction suppression d'un partenaire
    public function delete($id){
        $DB = Database::newInstance();
        $id = (int)$id;
        $query = "delete from partners where id_partner = '$id' limit 1 ";
        $DB->write("$query");
    } 
}