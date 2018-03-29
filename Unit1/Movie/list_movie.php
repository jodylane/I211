<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/18/2018
 * Time: 2:43 PM
 * Description: This file was created to
 */
require_once ('classes/list_movie.class.php');
require_once ('classes/movie_manager.class.php');

// create a MovieManager instance
$movie_manager = MovieManager::getMovieManager();

// get all movies
$movies = $movie_manager->listMovie();

// handle errors if the last query failed
if (!$movies) {
    $message = "There was a problem displaying movies.";
    header("Location: show_error.php?eMsg=$message");
    exit();
}

// display all movies
$view = new ListMovie();
$view->display($movies);
