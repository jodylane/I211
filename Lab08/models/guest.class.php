<?php
// name: blake R.
class Guest {
    //private data members
    private $id, $firstName, $lastName, $birthdate, $email;

    //constructor
    public function __construct($id, $firstName, $lastName, $birthdate, $email){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
        $this->email = $email;
    }

    //getters
    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getBirthday(){
        return $this->birthdate;
    }

    public function getEmail(){
        return $this->email;
    }
}