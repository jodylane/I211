<?php

/*
 * Author: Louie Zhu
 * Date: Mar 6, 2016
 * File: movie_controller.class.php
 * Description: the movie controller
 *
 */

class MovieController {

    private $movie_model;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->movie_model = MovieModel::getMovieModel();
    }

    //index action that displays all movies
    public function index() {
        $movies = $this->movie_model->list_movie();

        if(!$movies) {
            // display an error
            $message = "There was a problem displaying movies.";

            $this->error($message);
            return;
        }

        // display all movies
        $view = new MovieIndex();
        $view->display($movies);
    }

    //show details of a movie
    public function detail($id) {
        // retrieve the specific movie
        $movie = $this->movie_model->view_movie($id);

        if(!$movie) {
            // display an error
            $message = "There was a problem displaying the movie id=$id.";

            $this->error($message);
            return;
        }

        // display movie details
        $view = new MovieDetail();
        $view->display($movie);
    }

    //handle an error
    public function error($message) {

    }
	
    //search movies
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $movies = $this->movie_model->search_movie($query_terms);

        if ($movies === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new MovieSearch();
        $search->display($query_terms, $movies);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $movies = $this->movie_model->search_movie($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($movies) {
            foreach ($movies as $movie) {
                $titles[] = $movie->getTitle();
            }
        }

        echo json_encode($titles);
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
