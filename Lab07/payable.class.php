<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:28 PM
 * Description: This file was created to ensure all classes that implement this class have these methods
 */
interface Payable {
    // creates abstract methods for classes that we know should have these methods/qualities
    // although we don't know what they are just yet or how to handle them
    public function getPaymentAmount();
    public function toString();
}