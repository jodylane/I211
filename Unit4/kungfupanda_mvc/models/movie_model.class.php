<?php

/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * File: movie_model.class.php
 * Description: the movie model
 * 
 */

class MovieModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblMovie;
    private $tblMovieRating;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblMovie = $this->db->getMovieTable();
        $this->tblMovieRating = $this->db->getMovieRatingTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        //initialize movie ratings
        if (!isset($_SESSION['movie_ratings'])) {
            $ratings = $this->get_movie_ratings();
            $_SESSION['movie_ratings'] = $ratings;
        }
    }

    //static method to ensure there is just one MovieModel instance
    public static function getMovieModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new MovieModel();
        }
        return self::$_instance;
    }

    /*
     * the list_movie method retrieves all movies from the database and
     * returns an array of Movie objects if successful or false if failed.
     * Movies should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_movie() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
                " WHERE " . $this->tblMovie . ".rating=" . $this->tblMovieRating . ".rating_id";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            return false;

        //if the query succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Movie(stripslashes($obj->title), stripslashes($obj->rating), stripslashes($obj->release_date), stripslashes($obj->director), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    /*
     * the viewMovie method retrieves the details of the movie specified by its id
     * and returns a movie object. Return false if failed.
     */

    public function view_movie($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
                " WHERE " . $this->tblMovie . ".rating=" . $this->tblMovieRating . ".rating_id" .
                " AND " . $this->tblMovie . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripslashes($obj->rating), stripslashes($obj->release_date), stripslashes($obj->director), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }

        return false;
    }


    //search the database for movies that match words in titles. Return an array of movies if succeed; false otherwise.
    public function search_movie($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach
        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
                " WHERE " . $this->tblMovie . ".rating=" . $this->tblMovieRating . ".rating_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Movie($obj->title, $obj->rating, $obj->release_date, $obj->director, $obj->image, $obj->description);

            //set the id for the movie
            $movie->setId($obj->id);

            //add the movie into the array
            $movies[] = $movie;
        }
        return $movies;
    }

    //get all movie ratings
    private function get_movie_ratings() {
        $sql = "SELECT * FROM " . $this->tblMovieRating;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $ratings = array();
        while ($obj = $query->fetch_object()) {
            $ratings[$obj->rating] = $obj->rating_id;
        }
        return $ratings;
    }

}
