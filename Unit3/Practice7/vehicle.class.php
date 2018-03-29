<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/6/2018
 * Time: 1:39 PM
 * Description: This file was created to
 */
abstract class Vehicle {
    private $make;

    // constructor
    public function __construct($make) {
        $this->make = $make;
    }

    // retrieve make of car
    public function getMake () {
        return $this->make;
    }

    // set make of car
    public function setMake ($make) {
        $this->make = $make;
    }

    // an abstract method
    abstract public function horn();
}
?>