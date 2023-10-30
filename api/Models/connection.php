<?php

class Connection{

    // Info de la bd
    static public function infoDatabase(){

        $infoDB = array(
            "database"=> "productos",
            "user"=> "root",    
            "pass"=> ""
        );

        return $infoDB;
    }

    static public function connect(){

        try {
           $link = new PDO(
            "mysql:host=localhost;dbname=".Connection::infoDatabase()["database"],
            Connection::infoDatabase()["user"],
            Connection::infoDatabase()["pass"]
        );

        // Permita catacteres latinos
        $link->exec("set names utf8");

        } catch (PDOException $e) { 
            //Mostramos el tipo de error
            die("error: ". $e->getMessage());
        }

        return $link;
    }
}