<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/9/2018
 * Time: 9:14 PM
 * Description: This file was created to
 */
class BookController {
    private $book_model;

    //default constructor
    public function __construct() {
        //create an instance of the BookModel class
        $this->book_model = BookModel::getBookModel();
    }

    //index action that displays all books
    public function index() {
        //retrieve all books and store them in an array
        $books = $this->book_model->list_book();

        if (!$books) {
            //display an error
            $message = "There was a problem displaying books.";
            $this->error($message);
            return;
        }

        // display all books
        $view = new BookIndex();
        $view->display($books);
    }

    //show details of a book
    public function detail($id) {
        //retrieve the specific book
        $book = $this->book_model->view_book($id);

        if (!$book) {
            //display an error
            $message = "There was a problem displaying the book id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display book details
        $view = new BookDetail();
        $view->display($book);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new BookError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }
}