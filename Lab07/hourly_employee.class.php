<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:36 PM
 * Description: This file was created to manage hourly employees
 */
class HourlyEmployee extends Employee {
    // class variables
    private $wage;
    private $hours;

    // constructor method for new HourlyEmployee instance overwrites Employee->__construct() method
    public function __construct ($person, $ssn, $wage, $hours) {
        // calls Employee->__construct() method and passes the appropriate info to instantiate a new Employee
        parent::__construct($person, $ssn);
        $this->wage = $wage;
        $this->hours = $hours;
    }

    // returns wage
    public function getWage () {
        return $this->wage;
    }

    // returns hours
    public function getHours () {
        return $this->hours;
    }

    // returns calculation of wage * hours
    public function getPaymentAmount () {
        $payment = $this->getWage() * $this->getHours();
        return $payment;
    }

    // displays HourlyEmployee info overwriting Employee->toString() method
    public function toString () {
        // calls Employee->toString() method so we don't have to entirely rewrite the method to return
        // the correct format for HourlyEmployee
        parent::toString();
        printf("Wage per hour: $%0.2f", $this->getWage());
        echo "<br>Hours: " .  $this->getHours() . "<br>";
        printf("Earning: $%0.2f", $this->getPaymentAmount());
    }
}