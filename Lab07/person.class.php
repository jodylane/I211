<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:30 PM
 * Description: This file was created to manage a person
 */
class Person {
    // class variables
    private $first_name;
    private $last_name;

    // constructor method for new Person instance
    public function __construct ($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    // returns first_name
    public function getFirstName () {
        return $this->first_name;
    }

    // returns last_name
    public function getLastName () {
        return $this->last_name;
    }

    // displays Person info
    public function toString () {
        echo "Name: " . $this->getFirstName() . $this->getLastName() . "<br>";
    }
}