<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:27 PM
 * Description: This file was created to manage invoices
 */
class Invoice implements Payable{
    // this class implements the Payable class meaning that this class must have
    // getPayableAmount() and toString() methods
    // class variables
    private $part_number;
    private $part_description;
    private $quantity;
    private $price_per_item;
    private static $invoice_count = 0;

    // constructor method for new Invoice instance
    public function __construct ($part_number, $part_description, $quantity, $price_per_item) {
        $this->part_number = $part_number;
        $this->part_description = $part_description;
        $this->quantity = $quantity;
        $this->price_per_item = $price_per_item;
        // increase invoice_count
        self::$invoice_count++;
    }

    // returns part_number
    public function getPartNumber () {
        return $this->part_number;
    }

    // returns part_description
    public function getPartDescription () {
        return $this->part_description;
    }

    // returns quantity
    public function getQuantity () {
        return $this->quantity;
    }

    // returns price_per_item
    public function getPricePerItem () {
        return $this->price_per_item;
    }

    // returns calculation of price_per_item * quantity
    public function getPaymentAmount () {
        $payment = $this->getPricePerItem() * $this->getQuantity();
        return $payment;
    }

    // static method to return # of Invoice instances
    public static function getInvoiceCount () {
        return self::$invoice_count;
    }

    // displays Invoice info
    public function toString() {
        echo "Part Number: " . $this->getPartNumber() . "(" . $this->getPartDescription() . ")<br>";
        echo "Quantity: " . $this->getQuantity() . "<br>";
        printf("Price per item: $%0.2f", $this->getPricePerItem());
        echo "<br>";
        printf("Payment: $%0.2f", $this->getPaymentAmount());
    }
}