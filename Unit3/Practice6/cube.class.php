<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 2:18 PM
 * Description: This file was created to
 */
class Cube extends ThreeDimensionalShape {
    // declare private attributes
    private $side;

    public function __construct ($side) {
        $this->side = $side;
    }

    // method to return name
    public function getName () {
        return "Cube";
    }

    // method to return area
    public function getArea () {
        return 6 * pow($this->side, 2);
    }

    // method to return volume
    public function getVolume () {
        return pow($this->side, 3);
    }
}