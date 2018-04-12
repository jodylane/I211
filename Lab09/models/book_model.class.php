<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/9/2018
 * Time: 8:58 PM
 * Description: This file was created to make calls to and from database.
 */
class BookModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBook;
    private $tblBookCategory;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getBookModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getBookTable();
        $this->tblBookCategory = $this->db->getBookCategoryTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        //initialize book categories
        if (!isset($_SESSION['book_categories'])) {
            $categories = $this->get_book_categories();
            $_SESSION['book_categories'] = $categories;
        }
    }

    //static method to ensure there is just one BookModel instance
    public static function getBookModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new BookModel();
        }
        return self::$_instance;
    }

    /*
     * the list_book method retrieves all movies from the database and
     * returns an array of Book objects if successful or false if failed.
     * Books should also be filtered by categories and/or sorted by titles or category if they are available.
     */

    public function list_book() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBookCategory .
            " WHERE " . $this->tblBook . ".category=" . $this->tblBookCategory . ".category_id";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no book was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned books
        $books = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $book = new Book(stripslashes($obj->title), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the book
            $book->setId($obj->id);

            //add the book into the array
            $books[] = $book;
        }
        return $books;
    }

    /*
     * the viewBook method retrieves the details of the book specified by its id
     * and returns a book object. Return false if failed.
     */

    public function view_book($id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblBookCategory .
            " WHERE " . $this->tblBook . ".category=" . $this->tblBookCategory . ".category_id" .
            " AND " . $this->tblBook . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a book object
            $book = new Book(stripslashes($obj->title), stripslashes($obj->isbn), stripslashes($obj->category), stripslashes($obj->publish_date), stripslashes($obj->publisher), stripslashes($obj->image), stripslashes($obj->description));
            //set the id for the book
            $book->setId($obj->id);

            return $book;
        }

        return false;
    }

    //get all book categories
    private function get_book_categories() {
        $sql = "SELECT * FROM " . $this->tblBookCategory;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $categories = array();
        while ($obj = $query->fetch_object()) {
            $categories[$obj->category] = $obj->category_id;
        }
        return $categories;
    }
}