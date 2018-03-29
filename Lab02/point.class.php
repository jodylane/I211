<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/25/2018
 * Time: 1:22 PM
 * Description: This file was created to blueprint a point.
 */
class Point{
    private $xCoord;
    private $yCoord;
    public function __construct ($x, $y) {
        // set x and y coordinates
        $this->xCoord = $x;
        $this->yCoord = $y;
    }

    // return coordinates
    public function getXCoord () {
        return $this->xCoord;
    }

    public function getYCoord () {
        return $this->yCoord;
    }
}