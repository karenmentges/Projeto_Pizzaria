<?php
    class Client{

        private $code;
        private $name;
        private $email;
        private $phone;
        private $birthDate;
        private $password;
        private $state;
        private $city;
        private $address;
        private $district;
        private $howMeet;
        private $pizzaPromo;
        private $partnersPromo;
        private $comments;

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

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        public function getBirthDate(){
            return $this->birthDate;
        }

        public function setBirthDate($birthDate){
            $this->birthDate = $birthDate;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getState(){
            return $this->state;
        }

        public function setState($state){
            $this->state = $state;
        }

        public function getCity(){
            return $this->city;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getAddress(){
            return $this->address;
        }

        public function setAddress($address){
            $this->address = $address;
        }

        public function getDistrict(){
            return $this->district;
        }

        public function setDistrict($district){
            $this->district = $district;
        }

        public function getHowMeet(){
            return $this->howMeet;
        }

        public function setHowMeet($howMeet){
            $this->howMeet = $howMeet;
        }

        public function getPizzaPromo(){
            return $this->pizzaPromo;
        }

        public function setPizzaPromo($pizzaPromo){
            $this->pizzaPromo = $pizzaPromo;
        }

        public function getPartnersPromo(){
            return $this->partnersPromo;
        }

        public function setPartnersPromo($partnersPromo){
            $this->partnersPromo = $partnersPromo;
        }

        public function getComments(){
            return $this->comments;
        }

        public function setComments($comments){
            $this->comments = $comments;
        }

        public function validate(){
            $erros = array();
            if(empty($this->getName()))
                $erros[] = "It is necessary to enter a name.";
            if(empty($this->getEmail()))
                $erros[] = "It is necessary to enter an e-mail.";
            if(empty($this->getPhone()))
                $erros[] = "It is necessary to enter a phone number.";  
            if(empty($this->getBirthDate()))
                $erros[] = "It is necessary to enter a birth date.";  
            if(empty($this->getPassword()))
                $erros[] = "It is necessary to enter a password.";  
            if(empty($this->getState()))
                $erros[] = "It is necessary to enter a state.";  
            if(empty($this->getCity()))
                $erros[] = "It is necessary to enter a city.";
            if(empty($this->getAddress()))
                $erros[] = "It is necessary to enter as address.";
            if(empty($this->getDistrict()))
                $erros[] = "It is necessary to enter a district.";
            return $erros;                                  
        }
    }
?>