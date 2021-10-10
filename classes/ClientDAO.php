<?php
    require_once "Connection.php";
    require_once "Client.php";

    class ClientDAO{
        
        public $connection;

        public function __construct(){
            $this->connection = Connection::connect();
        }

        public function list(){
            try{
                $query = $this->connection->prepare("SELECT * FROM client ORDER BY name");
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Client");
                return $array;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function search($code){
            try{
                $query = $this->connection->prepare("SELECT * FROM client WHERE code = :code");
                $query->bindParam(":code", $code);
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Client");
                if(count($array) == 1)
                    return $array[0];
                else
                    return false; 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }        

        public function insert(Client $client){
            try{
                $query = $this->connection->prepare("INSERT INTO client VALUES (NULL, :name, :email, :phone, :birthDate, :password, :state, :city, :address, :district, :howMeet, :pizzaPromo, :partnersPromo, :comments)");
                $query->bindValue(":name", $client->getName());
                $query->bindValue(":email", $client->getEmail());
                $query->bindValue(":phone", $client->getPhone());
                $query->bindValue(":birthDate", $client->getBirthDate());
                $query->bindValue(":password", password_hash($client->getPassword(), PASSWORD_DEFAULT));
                $query->bindValue(":state", $client->getState());
                $query->bindValue(":city", $client->getCity());
                $query->bindValue(":address", $client->getAddress());
                $query->bindValue(":district", $client->getDistrict());
                $query->bindValue(":howMeet", $client->getHowMeet());
                $query->bindValue(":pizzaPromo", $client->getPizzaPromo());
                $query->bindValue(":partnersPromo", $client->getPartnersPromo());
                $query->bindValue(":comments", $client->getComments());
                return $query->execute();                 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            } 
        }

        public function update(Client $client){
            try{
                $query = $this->connection->prepare("UPDATE client SET name=:name, email=:email, phone=:phone, birthDate=:birthDate, password=:password, state=:state, city=:city, address=:address, district=:district, howMeet=:howMeet, pizzaPromo=:pizzaPromo, partnersPromo=:partnersPromo, comments=:comments WHERE code=:code");
                $query->bindValue(":name", $client->getName());
                $query->bindValue(":email", $client->getEmail());
                $query->bindValue(":phone", $client->getPhone());
                $query->bindValue(":birthDate", $client->getBirthDate());
                $query->bindValue(":password", password_hash($client->getPassword(), PASSWORD_DEFAULT));
                $query->bindValue(":state", $client->getState());
                $query->bindValue(":city", $client->getCity());
                $query->bindValue(":address", $client->getAddress());
                $query->bindValue(":district", $client->getDistrict());
                $query->bindValue(":howMeet", $client->getHowMeet());
                $query->bindValue(":pizzaPromo", $client->getPizzaPromo());
                $query->bindValue(":partnersPromo", $client->getPartnersPromo());
                $query->bindValue(":comments", $client->getComments());
                $query->bindValue(":code", $client->getCode());
                return $query->execute();                 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function delete($code){
            try{
                $query = $this->connection->prepare("DELETE FROM client WHERE code=:code");
                $query->bindParam(":code", $code);
                return $query->execute();
            }
            catch(PDOException $e){  
                return "ERROR: ".$e->getMessage();
            }  
        }

        public function autenticate($email, $password){
            try{
                $query = $this->connection->prepare("SELECT * FROM client WHERE email=:email");
                $query->bindParam(":email", $email);
                $query->execute();
                $record = $query->fetch(PDO::FETCH_ASSOC); // retornamos como array associativo
                if($query->rowCount() == 1 && password_verify($password, $record['password'])) // sucesso
                    return $record;
                else
                    return false;    
            }
            catch(PDOException $e){
                echo "Data access error: ". $e->getMessage();
            }
        }                 
    }
?> 