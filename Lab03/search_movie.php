<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/1/2018
 * Time: 8:52 PM
 * Description: This file was created to connect our movie manager and search class classes to
 * create a view to see search results.
 */

require_once 'classes/movie_manager.class.php';
require_once 'classes/search_movie.class.php';

if(!isset($_GET['query-terms'])) {
}
$terms = $_GET['query-terms'];

$movie_manager = MovieManager::getMovieManager(); //create a MovieManager

//retrieve movies
$movies = $movie_manager->search_movie($terms);

//handle errors if the last query failed
if (!$movies) {
    //handle errors for if the query failed or no results were returned
    $message = "There was a problem displaying movies.";
    if ($movies == 0) {
        $message = "There are no movie titles that matched '$terms'.";
    }

    header("Location: show_error.php?eMsg=$message");
    exit();
}

// display searched term result movies
$view = new SearchMovie();
$view->display($terms, $movies);
?>
