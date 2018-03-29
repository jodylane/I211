<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/25/2018
 * Time: 6:01 PM
 * Description: This file was created to handle cylinder object creation and calculations.
 */
class Cylinder extends Circle {
    private $height;
    // overwrite circle construct function passing radius to parent class circle and setting height in its own construct function
    public function __construct($radius, $height) {
        parent::__construct($radius);
        $this->height = $height;
    }
    // returns height
    public function getHeight () {
        return $this->height;
    }
    // returns area calculated in circle class
    public function getBaseArea () {
        return parent::getArea(); // radius * radius * pi
    }
    // calculates and returns volume of cylinder
    public function getVolume () {
        return ($this->getBaseArea() * $this->getHeight()); // radius * radius * pi * height
    }
    // calculates and returns lateral surface area of cylinder
    public function getLateralSurface () {
        return (parent::getCircumference() * $this->getHeight()); // 2 * pi * radius * height
    }
    // calculates and returns surface area of cylinder
    public function getSurfaceArea () {
        return ($this->getLateralSurface() + parent::getArea()); // 2 * pi * radius * height + radius * radius * pi
    }
    // returns string json
    public function toString () {
        return '{"Radius":"' . number_format(parent::getRadius(), 2, '.', ',') . '", "Height":"' . number_format($this->getHeight(), 2, '.', ',') . '", "Base":"' . number_format($this->getBaseArea(), 2, '.', ',') . '", "Volume":"' . number_format($this->getVolume(), 2, '.', ',') . '", "Lateral":"' . number_format($this->getLateralSurface(), 2, '.', ',') . '", "Surface":"' . number_format($this->getSurfaceArea(), 2, '.', ',') . '"}';
    }
}
