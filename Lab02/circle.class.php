<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/25/2018
 * Time: 1:22 PM
 * Description: This file was created to blueprint a circle.
 */
class Circle {
    private $center;
    private $radius;

    public function __construct ($center, $radius) {
        $this->center = $center;
        // format radius into a decimal number with 1 decimal place.
        $this->radius = number_format($radius, 1, '.', ',');
    }

    // return center, area, radius, circumference, and circle details message a.k.a .toString()
    public function getCenter () {
        // returns center point. since center is an object we can call point methods on this variable.
        $x = $this->center->getXCoord();
        $y = $this->center->getYCoord();
        $coords = "[$x, $y]";
        return $coords;
    }

    public function getRadius () {
        return $this->radius;
    }

    public function getArea () {
        // calculate area pi multiplie by radius squared format 2 decimal numbers for area.
        $calc = 3.14 * pow($this->radius, 2);
        $area =  number_format($calc, 2, '.', ',');
        return $area;
    }

    public function getCircumference () {
        // calculates the circumference 2 multiplied by pi multiplied by radius.
        $calc = 2 * 3.14 * $this->radius;
        $circumference = $calc;
        return $circumference;
    }

    public function toString () {
        // format the response for circle details into a message as a string value.
        return "<strong> The details of the circle:</strong> </br></br> Center: " . $this->getPoint() . "</br> Radius: " . $this->getRadius() . "</br> Area: " . $this->getArea() . "</br> Circumference: " . $this->getCircumference();
    }
}