<?php
    class Flavor{

        private $code;
        private $name;
        private $ingredients;
        private $nameImage;

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

        public function validate(){
            $erros = array();
            if(empty($this->getName()))
                $erros[] = "It is necessary to enter a name.";
            if(empty($this->getIngredients()))
                $erros[] = "It is necessary to inform the list of ingredients.";
            if(empty($this->getNameImage()))
                $erros[] = "It is necessary to select an image.";  
            return $erros;                                  
        }
        
    }
?>