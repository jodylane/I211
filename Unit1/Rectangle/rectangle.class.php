<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/11/2018
 * Time: 2:17 PM
 * Description: This file was created to
 */
class Rectangle {
    private $width;
    private $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    //get a rectangles width
    public function get_width() {
        return $this->width;
    }
    //get a rectangles height
    public function get_height() {
        return $this->height;
    }
    //set a rectangles width
    public function set_width($w) {
        $this->width = $w;
    }
    //set a rectangles height
    public function set_height($h) {
        $this->height = $h;
    }
    //calculate the area of a rectangle
    public function calculate_area() {
        $area = $this->width * $this->height;
        return $area;
    }
    //calculate the perimeter of a rectangle
    public function calculate_perimeter() {
        $perimeter = 2 * ($this->width + $this->height);
        return $perimeter;
    }
}
