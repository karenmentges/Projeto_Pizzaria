<?php
    require_once "Connection.php";
    require_once "Order.php";
    require_once "CartItem.php";

    class OrderDAO{

        public $connection;

        public function __construct(){
            $this->connection = Connection::connect();
        }

        public function list(){
            try{
                $query = $this->connection->prepare("SELECT * FROM orderPizza ORDER BY code");
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Order");
                return $array;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function search($code){
            try{
                $query = $this->connection->prepare("SELECT * FROM orderPizza WHERE code = :code");
                $query->bindParam(":code", $code);
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Order");
                if(count($array) == 1)
                    return $array[0];
                else
                    return false; 
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        } 

        public function searchClient($codClient){
            try{
                $query = $this->connection->prepare("SELECT * FROM orderPizza WHERE codClient = :codClient");
                $query->bindParam(":codClient", $codClient);
                $query->execute();
                $array = $query->fetchAll(PDO::FETCH_CLASS, "Order");
                return $array;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        } 

        public function searchItemOrder($codOrder){
            try{
                $query = $this->connection->prepare("SELECT * FROM itemOrder WHERE codOrder = :codOrder");
                $query->bindParam(":codOrder", $codOrder);
                $query->execute();
                $array = $query->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function insert(Order $order){
            try{
                // inserindo pedido
                $query = $this->connection->prepare("INSERT INTO orderPizza VALUES (NULL, :codClient, :deliveryFee, :deliveryType, :dateOrder, :status)");
                $query->bindValue(":codClient", $order->getCodClient());
                $query->bindValue(":deliveryFee", $order->getDeliveryFee());
                $query->bindValue(":deliveryType", $order->getDeliveryType());
                $query->bindValue(":dateOrder", $order->getDateOrder());
                $query->bindValue(":status", $order->getStatus());
                $query->execute();
                // recuperando o id que foi gerado
                $query = $this->connection->prepare("SELECT max(code) AS code FROM orderPizza WHERE codClient = :codClient");
                $query->bindValue(":codClient", $order->getCodClient());
                $query->execute();
                $array = $query->fetch(PDO::FETCH_ASSOC);
                $codOrder = $array['code'];
                // inserir os itens
                foreach($order->getItens() as $item){
                    $query = $this->connection->prepare("INSERT INTO itemOrder VALUES (NULL, :codOrder, :codSize, :flavor1, :flavor2, :flavor3, :flavor4, :flavor5, :edge, :value)"); 
                    $query->bindValue(":codOrder", $codOrder);
                    $query->bindValue(":codSize", $item->getCodeSize()); 
                    $flavors = $item->getFlavors(); // array (cod, nome) 
                    $query->bindValue(":flavor1", isset($flavors[0]) ? $flavors[0][0] : NULL); 
                    $query->bindValue(":flavor2", isset($flavors[1]) ? $flavors[1][0] : NULL); 
                    $query->bindValue(":flavor3", isset($flavors[2]) ? $flavors[2][0] : NULL); 
                    $query->bindValue(":flavor4", isset($flavors[3]) ? $flavors[3][0] : NULL); 
                    $query->bindValue(":flavor5", isset($flavors[4]) ? $flavors[4][0] : NULL); 
                    $query->bindValue(":edge", $item->getEdge()); 
                    $query->bindValue(":value", $item->getPrice()); 
                    $query->execute();
                }
                return $codOrder;
            }
            catch(PDOException $e){
                echo "ERROR: ".$e->getMessage();
            }                
        }
    }
?>   