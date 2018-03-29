<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/11/2018
 * Time: 2:33 PM
 * Description: This file was created to create instances of our class objects and display the class methods we wrote.
 */
require_once 'hourly_worker.class.php';
// here we are creating two instances of workers assigning a first name, last name, wage, hours
$worker1 = new HourlyWorker('Luke', 'Smith', 15, 40);
$worker2 = new HourlyWorker('Cathleen', 'King', 20, 35);

echo "<h1>Hourly Worker Earnings</h1>";

// get the work 1 name and weakly earnings and display them
$name = $worker1->getName();
$earning = $worker1->getWeeklyEarnings();
echo "<p>Name: $name </br> Earnings: $earning</p>";

// get the work 2 name and weakly earnings and display them
$name = $worker2->getName();
$earning = $worker2->getWeeklyEarnings();
echo "<p>Name: $name </br> Earnings: $earning</p>";
