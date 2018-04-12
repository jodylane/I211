<?php

/*
 * Author: Josh Lane
 * Date: 3/29/18
 * Name: index.php
 * Description: this file creates a guest controller instance and adds autoloader for every class file and
 * handles calls controller actions
 */

// include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

// create an object of GuestController
$guest_controller = new GuestController();


// add your code below this line to complete this file

$action = "all";
if(isset($_GET['action']) && !(empty($_GET['action']))) {
    $action = $_GET['action'];
}

// invoke appropriate method depending on action value
if($action === 'all') {
    // render form
    $guest_controller->index();
} else if ($action === 'show') {
    // render show guests
    $guest_controller->show();
} else if ($action === 'sign') {
    $first = '';
    $last = '';
    $birth = '';
    $email = '';

    // retrieve post information
    if (isset($_POST['firstname']) && !(empty($_POST['firstname']))) {
        $first = $_POST['firstname'];
    }
    if (isset($_POST['lastname']) && !(empty($_POST['lastname']))) {
        $last = $_POST['lastname'];
    }
    if (isset($_POST['birthdate']) && !(empty($_POST['birthdate']))) {
        $birth = $_POST['birthdate'];
    }
    if (isset($_POST['email']) && !(empty($_POST['email']))) {
        $email = $_POST['email'];
    }

    // render sign and create new guest
    $guest_controller->sign($first,$last,$birth,$email);
} else {
    // an invalid action or other error occurred
    $message = "Invalid action was requested.";
    if (isset($_GET['message']) && !(empty($_GET['message']))) {
        $message = $_GET['message'];
    }
    // renders errors
    $guest_controller->error($message);
}
