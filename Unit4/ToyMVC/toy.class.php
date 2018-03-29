<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/22/2018
 * Time: 2:37 PM
 * Description: This file was created to
 */
class Toy {
    // properties of toys
    private $id, $name, $description, $price;

    // constructor that initializes toy properties
    public function __construct($id, $name, $desc, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }

    public function getId () {
        return $this->id;
    }
    public function getName () {
        return $this->name;
    }
    public function getDescription () {
        return $this->description;
    }
    public function getPrice () {
        return $this->price;
    }
}