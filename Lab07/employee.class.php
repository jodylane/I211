<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:27 PM
 * Description: This file was created to manage employees
 */
abstract class Employee implements Payable {
    // this class implements the Payable class meaning that this class must have
    // getPayableAmount() and toString() methods
    // class variables
    private $person;
    private $ssn;
    private static $employee_count = 0;

    // constructor method for new Employee instance
    public function __construct($person, $ssn) {
        $this->person = $person;
        $this->ssn = $ssn;
        // increase employee_count
        self::$employee_count++;
    }

    // returns person object
    public function getPerson () {
        return $this->person;
    }

    // returns ssn
    public function getSsn () {
        return $this->ssn;
    }

    // returns employee_count
    public static function getEmployeeCount () {
        return self::$employee_count;
    }

    // displays Employee info
    public function toString () {
        // calls Person->toString() method to display Person info
        echo $this->getPerson()->toString();
        echo "Social security number: ", $this->getSsn() . "<br>";
    }
}