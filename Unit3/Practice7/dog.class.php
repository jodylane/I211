<?php

/**
 * Author: Louie Zhu
 * Date: 2/25/2017
 * Name: dog.class.php
 * Description: the Dog class models a dog. It extends Mammal class and implements the Nameable interface.
 */

class Dog extends Mammal implements Nameable {
    private $name;
    
    //constructor
    public function __construct($name, $type) {
        parent::__construct($type);
        $this->name = $name;
    }
    
    //get method
    public function getName() {
        return $this->name;
    }
    
    //set method
    public function setName($name) {
        $this->name = $name;
    }
    
    //the makeNoise method
    public function makeNoise() {
        return "Arf! Arf!";
    }
    public function toString() {
        echo "<b>Name</b>: ", $this->getName();
        echo "<br /><b>Type</b>: ", parent::getType();
        echo "<br /><b>Noise</b> ", $this->makeNoise();
    }
}

?>