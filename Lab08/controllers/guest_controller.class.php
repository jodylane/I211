<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/29/2018
 * Time: 4:10 PM
 * Description: This file was created to handle actions and display views.
 */
class GuestController {
    // private data members
    private $guest_model;

    public function __construct() {
        // get access to guest model
        $this->guest_model = GuestModel::getGuestModel();
    }

    public function index () {
        // display form
        $view = new Index();
        $view->display();
    }

    public function show() {
        // retrieve guests
        $guests = $this->guest_model->showGuests();

        // something went wrong with retrieving guests
        if (!$guests) {
            // display an error
            $message = "There was a problem displaying guests.";

            $this->error($message);
            return;
        }

        // display guest details
        $view = new ShowGuest();
        $view->display($guests);
    }

    public function sign ($f_name, $l_name, $dob, $email) {
        // clear and instantiate message
        $message = "";
        if ($f_name === ''){
            $message .= "There was a problem retrieving first name.<br>";
        }
        if ($l_name === ''){
            $message .= "There was a problem retrieving last name.<br>";
        }
        if ($dob === ''){
            $message .= "There was a problem retrieving birth date.<br>";
        }
        if ($email === ''){
            $message .= "There was a problem retrieving email.<br>";
        }
        // if message is not empty display an error and concatonate every message for every value that is empty
        if($message !== "") {
            $this->error($message);
            return;
        }
        // add guest to db
        $this->guest_model->addGuest($f_name, $l_name, $dob, $email);

        // display sign guest
        $view = new SignGuest();
        $view->display();
    }

    public function error($message) {
        // create aan object of the Error class
        $error = new GuestError();

        // display the error page
        $error->display($message);
    }
}