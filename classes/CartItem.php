<?php
    class CartItem{
        private $codSize;
        private $nameSize;
        private $price;
        private $flavors; // array(cod, name)
        private $edge;

        public function getCodeSize(){
            return $this->codSize;
        }

        public function setCodeSize($codSize){
            $this->codSize = $codSize;
        }

        public function getNameSize(){
            return $this->nameSize;
        }

        public function setNameSize($nameSize){
            $this->nameSize = $nameSize;
        }

        public function getPrice(){
            return $this->price;          
        }        

        public function setPrice($price){
            $this->price = $price;
        }        

        public function getFlavors(){
            return $this->flavors;
        }

        public function setFlavors($flavors){ 
            $this->flavors = $flavors;
        }

        public function getListFlavors(){ // formato textual 
            $str = "";
            foreach($this->flavors as $f)
                $str .=$f[1].", "; // separa por virgula e espaço
             
            return substr($str, 0, strlen($str)-2); // retira ultima virgula e espaço
        }        

        public function getEdge(){
            return $this->edge;
        }

        public function setEdge($edge){
            $this->edge = $edge;
        }          
    }
?>