<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:37 PM
 * Description: This file was created to manage salaried employees
 */
class SalariedEmployee extends Employee {
    // class variable
    private $weekly_salary;

    // constructor method for new SalariedEmployee instance overwrites Employee->__construct() method
    public function __construct ($person, $ssn, $weekly_salary) {
        // calls Employee->__construct() method and passes the appropriate info to instantiate a new Employee
        parent::__construct($person, $ssn);
        $this->weekly_salary = $weekly_salary;
    }

    // returns weekly_salary
    public function getWeeklySalary () {
        return $this->weekly_salary;
    }

    // returns weekly_salary
    public function getPaymentAmount () {
        return $this->getWeeklySalary();
    }

    // displays SalariedEmployee info overwriting Employee->toString() method
    public function toString () {
        // calls Employee->toString() method so we don't have to entirely rewrite the method to return
        // the correct format for SalariedEmployee
        parent::toString();
        printf("Weekly Salary: $%0.2f", $this->getWeeklySalary());
        echo "<br>";
        printf("Earning: $%0.2f", $this->getPaymentAmount());
    }

}