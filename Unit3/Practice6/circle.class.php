<?php
/**
 * Author Louie Zhu
 * Date: 2/25/2017
 * Name: circle.class.php
 * Description: this class models a circle. It extends the TwoDimentionalshape class. 
 */
class Circle extends TwoDimensionalShape {
    // declare private attribute
    private $radius;
    
    //constructor
    public function __construct($r) {
        $this->radius = $r;
    }
    
    //method to return the name
    public function getName() {
        return "Circle";
    }
    
    //method to return the area
    public function getArea() {
         return pow($this->radius, 2)* M_PI;
    }
    
    //method to return the perimeter
    public function getPerimeter() {
        return $this->radius * 2 * M_PI;
    }
} //end of Circle class

?>