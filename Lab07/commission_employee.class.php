<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:38 PM
 * Description: This file was created to manage commissioned employees
 */
class CommissionEmployee extends Employee {
    // class variables
    private $sales;
    private $commission_rate;

    // constructor method for new CommissionEmployee instance overwrites Employee->__construct() method
    public function __construct ($person, $ssn, $sales, $commission_rate) {
        // calls Employee->__construct() method and passes the appropriate info to instantiate a new Employee
        parent::__construct($person, $ssn);
        $this->sales = $sales;
        $this->commission_rate = $commission_rate;
    }

    // returns sales
    public function getSales () {
        return $this->sales;
    }

    // returns commission_rate
    public function getCommissionRate () {
        return $this->commission_rate;
    }

    // returns calculation of sales * commission_rate
    public function getPaymentAmount () {
        $payment = $this->getSales() * $this->getCommissionRate();
        return $payment;
    }

    // displays CommissionEmployee info overwriting Employee->toString() method
    public function toString () {
        // calls Employee->toString() method so we don't have to entirely rewrite the method to return
        // the correct format for CommissionEmployee
        parent::toString();
        printf("Gross sale: $%0.2f", $this->getSales());
        echo "<br>";
        printf("Commission rate: %0.2f", $this->getCommissionRate());
        echo "<br>";
        printf("Earnings: $%0.2f", $this->getPaymentAmount());
    }
}