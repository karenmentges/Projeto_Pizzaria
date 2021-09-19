<?php
    require_once "Connection.php";
    require_once "Flavor.php";

    class FlavorDAO{
        
        public $connection;

        public function __construct(){
            $this->connection = Connection::connect();
        }

        public function list(){
            try{
                $query = $this->connection->prepare("SELECT * FROM flavorPizza ORDER BY name");
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Flavor");
                return $array;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function search($code){

        }        

        public function insert(Flavor $flavor){

        }

        public function change(Flavor $flavor){

        }

        public function delete($code){

        }

    }
?>   