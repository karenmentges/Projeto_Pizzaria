<?php
    class Flavor{

        // atributos
        private $code;
        private $name;
        private $ingredients;
        private $nameImage;

        // métodos
        public function getCode(){
            return $this->code;
        }

        public function setCode($code){
            $this->code = $code;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getIngredients(){
            return $this->ingredients;
        }

        public function setIngredients($ingredients){
            $this->ingredients = $ingredients;
        }

        public function getNameImage(){
            return $this->nameImage;
        }

        public function setNameImage($nameImage){
            $this->nameImage = $nameImage;
        } 
        
    }
?>