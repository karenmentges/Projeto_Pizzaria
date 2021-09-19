<?php
    abstract class Connection{
        // atributo
        public static $connection;

        // método
        public static function connect(){
            if(!isset(self::$connection)){
                try{
                    self::$connection = new PDO("mysql:host=localhost; dbname=pizza", "admpizza", "12345");
                }
                catch(PDOException $e){
                    echo "Connection error: ". $e->getMessage();
                    die();
                }
            }
            return self::$connection;
        }
    }

?>   