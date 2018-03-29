<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/27/2018
 * Time: 1:25 PM
 * Description: This file was created to
 */
class ToyController {
    private $toy_model;

    public function __construct () {
        // create an object of the ToyModel class
        $this->toy_model = new ToyModel();
    }

    // list all toys
    public function all () {
        // retrieve all toys and store them in an array
        $toys = $this->toy_model->getToys();

        // if there is no toy to display, display an error message
        if(!$toys) {
            header("Location: index.php?action=error&message=No toy was found.");
            exit;
        }

        // create an object of the ToyView class
        $view = new ToyView();

        // display all toys
        $view->display($toys);
    }
    // display an error message
    public function error ($message) {
        // create an object of the Error class
        $error = new ToyError();

        // display the error page
        $error->display($message);
    }

}