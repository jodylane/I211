<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/18/2018
 * Time: 1:44 PM
 * Description: This file was created to
 */

require_once ('application/database.class.php');
require_once ('movie.class.php');
class MovieManager {
    // private data members
    private $db, $dbConnection;         // Database object and database connection
    static private $_instance = NULL;   // an instance of the current class
    private $tblMovie;                  // database table that stores all movies
    private $tblMovieRating;            // database table that stores all movie ratings

    private function __construct () {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblMovie = $this->db->getMovieTable();
        $this->tblMovieRating = $this->db->getMovieRatingTable();

        // Escapes special characters in a string for use in an SQL statement.
        // This stops SQL inject in POST vars.

        foreach($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        // Escapes special characters in a string for use in an SQL statement.
        // This stops SQL Injection in GET vars.

        foreach($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    // static method to ensure there is just one MovieManager instance
    public static function getMovieManager () {
        if(self::$_instance == NULL) {
            self::$_instance = new MovieManager();
        }
        return self::$_instance;
    }

    // the listMovie method retrieves all movies from the database and
    // returns an array of Movie objects if successful or false if failed.
    public function listMovie () {
        // construct the sql statement in this format
        // SELECT
        // FROM
        // WHERE

        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
                " WHERE " . $this->tblMovie . ".rating" . $this->tblMovieRating . ".rating_id";

        // execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed return false
        if (!$query) {
            return false;
        }

        // if the query succeeded, but there was no movie found
        if ($query->num_rows == 0) {
            return 0;
        }

        // handle the result
        // create an array to store all returned movies

        $movies = array();

        // loop through all rows in the returned recordsets
        while($obj = $query->fetch_object()) {
            $movie = new Movie(stripcslashes($obj->title), stripcslashes($obj->rating),
                    stripcslashes($obj->release_date), stripcslashes($obj->director),
                    stripcslashes($obj->image), stripcslashes($obj->description));

            // set the id for the movie
            $movie->setID($obj->id);

            // add movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

}