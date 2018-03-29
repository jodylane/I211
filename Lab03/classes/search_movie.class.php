<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/1/2018
 * Time: 8:47 PM
 * Description: This file was created to render the view.
 */
// get access to header and footer methods
require_once 'application/app_view.class.php';
class SearchMovie {
    // display method takes string and array values to display movies
    public function display($terms, $movies)  {
        AppView::displayHeader("Search Results");
        ?>

        <div id="main-header"> Search Results for: <?php echo "'$terms'"?></div>
        <div class="grid-container">
            <?php
            if ($movies === 0) {
                echo "No movie was found.<br><br><br><br><br>";
            } else {
                //display movies in a grid; six movies per row
                foreach ($movies as $i => $movie) {
                    $id = $movie->getId();
                    $title = $movie->getTitle();
                    $rating = $movie->getRating();
                    $release_date = $release_date = new DateTime($movie->getRelease_date());
                    $image = $movie->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = MOVIE_IMG . $image;
                    }
                    if ($i%6 == 0) {
                        echo "<div class='row'>";
                    }
                    echo "<div class='col'><p><a href='view_movie.php?id=" . $id . "'><img src='" . $image .
                        "'></a><span>$title<br>Rated $rating<br>" . $release_date->format('m-d-Y') . "</span></p></div>";
                    ?>
                    <?php
                    if ($i%6 == 5 || $i == count($movies) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <?php
        AppView::displayFooter();
    }

}