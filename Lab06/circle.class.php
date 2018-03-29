<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/25/2018
 * Time: 5:48 PM
 * Description: This file was created to
 */
class Circle {
    // declare private data members
    private $radius;

    // constructor function to set radius on initialize
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // returns radius
    public function getRadius () {
        return $this->radius;
    }

    // calculates and returns area of circle
    public function getArea () {
        return ($this->getRadius() * $this->getRadius() * pi()); // radius * radius * pi
    }

    // calculate and returns circumference of circle
    public function getCircumference () {
        return (2 * $this->getRadius() * pi()); // 2 * radius * pi
    }
}