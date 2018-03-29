<?php

/*
 * Author Louie Zhu
 * Date: 2/25/2017
 * Name: rectangle.class.php
 * Description: this class models a rectangle. It extends the TwoDimentionalshape class. 
 */

class Rectangle extends TwoDimensionalShape {
    // declare private attributes
    private $width, $height;
    
     //constructor
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    
    //method to return the name
    public function getName() {
        return "Rectangle";
    }
    
    //method to return the area
    public function getArea() {
         return $this->width * $this->height;
    }
    
    //method to return the perimeter
    public function getPerimeter() {
        return ($this->width + $this->height) * 2;
    }
} //end of the Rectangle class

?>