<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/6/2018
 * Time: 1:42 PM
 * Description: This file was created to
 */
class Car extends Vehicle implements Nameable {
    private $name;

    // constructor
    public function __construct ($name, $make) {
        parent::__construct($make);
        $this->name = $name;
    }

    // retrieve name of car
    public function getName () {
        return $this->name;
    }

    // set name of car
    public function setName ($name) {
        $this->name = $name;
    }

    // the horn method simulates the sound of the car.
    public function horn () {
        return "Beep Beep";
    }

    public function toString() {
        echo "<b>Name</b>: ", $this->getName();
        echo "<br><b>Make</b>: ", parent::getMake();
        echo "<br><b>Horn Sound</b>: ", $this->horn();
    }
}
?>