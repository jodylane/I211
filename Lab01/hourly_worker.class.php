<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/11/2018
 * Time: 2:35 PM
 * Description: This file was created to create our hourlyworker class that allows us to blueprint new hourlyworker instance objects.
 */

class HourlyWorker {
    //establish our private variables
    private $first_name;
    private $last_name;
    private $wage;
    private $hours;
    // constructor function on initialization of a new instance object. this allows us to assign these variables on creation of object
    public function __construct($first_name, $last_name, $wage, $hours) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->wage = $wage;
        $this->hours = $hours;
    }
    // method to get the full name of worker
    public function getName() {
        return "$this->first_name $this->last_name";
    }
    // calculates the weekly earnings
    public function getWeeklyEarnings() {
        return "$" . $this->wage * $this->hours;
    }


}
