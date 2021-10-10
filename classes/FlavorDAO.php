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
            try{
                $query = $this->connection->prepare("SELECT * FROM flavorPizza WHERE code = :code");
                $query->bindParam(":code", $code);
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Flavor");
                if(count($array) == 1)
                    return $array[0];
                else
                    return false; 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }        

        public function insert(Flavor $flavor){
            try{
                $query = $this->connection->prepare("INSERT INTO flavorPizza VALUES (NULL, :name, :ingredients, :nameImage)");
                $query->bindParam(":name", $flavor->getName());
                $query->bindParam(":ingredients", $flavor->getIngredients());
                $query->bindParam(":nameImage", $flavor->getNameImage());
                return $query->execute();                 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            } 
        }

        public function update(Flavor $flavor){
            try{
                $query = $this->connection->prepare("UPDATE flavorPizza SET name=:name, ingredients=:ingredients, nameImage=:nameImage WHERE code=:code");
                $query->bindParam(":name", $flavor->getName());
                $query->bindParam(":ingredients", $flavor->getIngredients());
                $query->bindParam(":nameImage", $flavor->getNameImage());
                $query->bindParam(":code", $flavor->getCode());
                return $query->execute();                 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function delete($code){
            try{
                $query = $this->connection->prepare("DELETE FROM flavorPizza WHERE code=:code");
                $query->bindParam(":code", $code);
                return $query->execute();
            }
            catch(PDOException $e){
                if($e->getCode() == 23000)
                    return "This flavor cannot be excluded as it has already been marketed.";
                else    
                    return "ERROR: ".$e->getMessage();
            }  
        }

    }
?>   