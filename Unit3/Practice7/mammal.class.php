<?php

/**
 * Author: Louie Zhu
 * Date: 2/25/2017
 * Name: mammal.class.php
 * Description: An abstract class to models a mammal.
 */
abstract class Mammal {

    //private attribute
    private $type;

    //constructor
    public function __construct($type) {
        $this->type = $type;
    }

    //get method
    public function getType() {
        return $this->type;
    }

    //set method
    public function setType($type) {
        $this->type = $type;
    }

    //an abstract method
    abstract public function makeNoise();
}

?>