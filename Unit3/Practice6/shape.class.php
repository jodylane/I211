<?php

/*
 * Author Louie Zhu
 * Date: 2/25/2017
 * Name: shape.class.php
 * Description: this class models a geometric shape. This is an abstract, superclass.
 */

abstract class Shape {
    //private attribute
    private $name;
    
    //No constructor or destructor to define
    
    //abstract method to return the name
    abstract protected function getName();
    
} //end of Shape class
?>