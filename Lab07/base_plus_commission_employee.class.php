<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:40 PM
 * Description: This file was created to manage base plus commission employees.
 */
class BasePlusCommissionEmployee extends CommissionEmployee {
    // class variable
    private $base_salary;

    // constructor method for new BasePlusCommissionEmployee instance overwrites
    // CommissionEmployee->__construct() method
    public function __construct ($person, $ssn, $sales, $commission_rate, $base_salary) {
        // calls CommissionEmployee->__construct() method and passes the appropriate info
        // to instantiate a new CommissionEmployee
        parent::__construct($person, $ssn, $sales, $commission_rate);
        $this->base_salary = $base_salary;
    }

    // return base_salary
    public function getBaseSalary () {
        return $this->base_salary;
    }

    // returns calculation of (commission_rate * sales) + base_salary
    public function getPaymentAmount () {
        $payment = ($this->getCommissionRate() * $this->getSales()) + $this->getBaseSalary();
        return $payment;
    }

    // displays BasePlusCommissionEmployee info overwrites CommissionEmployee->toString() method
    public function toString () {
        // in this case we don't want to use the CommissionEmployee->toString() method because
        // BasePlusCommissionEmployee's info would be incorrectly displayed. We also don't have to rewrite
        // more code than we have to and since the Employee->toString() method has the base of what we want
        // to return for BasePlusCommissionEmployee info we can call the parent 2 levels above this class
        // by calling the class name directly so we can return the info in the format we want.
        Employee::toString();
        printf("Gross sale: $%0.2f", $this->getSales());
        echo "<br>";
        printf("Commission rate: %0.2f", $this->getCommissionRate());
        echo "<br>";
        printf("Base salary: $%0.2f", $this->getSales());
        echo "<br>";
        printf("Earning: $%0.2f", $this->getPaymentAmount());

    }
}