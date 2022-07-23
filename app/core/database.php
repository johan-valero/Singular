<?php

// Connexion à la Database
class Database{

    // This is the database class
    public static $con;

    // run immediatly your instanciate class
    public function __construct(){
        try{
            $string = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;
            self::$con = new PDO($string, DB_USER, DB_PASS);
            self::$con->exec("set names utf8mb4");
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }

    // Getter de la connexion 
    public static function getInstance(){
        if(self::$con){
            // return self::$con;
        }  
        $instance = new self();
        return $instance;
    }

    public static function newInstance(){
        return $instance = new self();
    }

    // Read PDO from database
    public function read($query, $data = array()){
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);
        if($result){
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0){
                return $data;
            }
        }
        return false;
    }

    // Write PDO to database 
    public function write($query, $data = array()){
        $stmt = self::$con->prepare($query);
        $result = $stmt->execute($data);

        if($result){
            return true;
        }
        return false;
    }
}