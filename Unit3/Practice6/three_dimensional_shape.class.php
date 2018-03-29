<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 2:08 PM
 * Description: This file was created to
 */
abstract class ThreeDimensionalShape extends Shape {
    // put your code here

    // abstract method to return area
    abstract protected function getArea();

    // abstract method to return volume
    abstract protected function getVolume();

    // method to print information
    public function toString () {
        echo "<h2>" . $this->getName() . "</h2>";
        printf("Area: %0.2f", $this->getArea());
        printf("<br> Volume: %.2f", $this->getVolume());
    }
}