<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/18/2018
 * Time: 1:30 PM
 * Description: This file was created to
 */
class Movie {
    //private data members to store movie details
    private $id, $title, $rating, $release_date, $director, $image, $description;

    // movie constructor that initializes all variables except id
    public function __construct ($title, $rating, $release_date, $director, $image, $description) {
        $this->title = $title;
        $this->rating = $rating;
        $this->release_date = $release_date;
        $this->director = $director;
        $this->image = $image;
        $this->description = $description;
    }

    //get methods to return movie details
    public function getID () {
        return $this->id;
    }
    public function getTitle () {
        return $this->title;
    }
    public function getRating () {
        return $this->rating;
    }
    public function getRelease_date () {
        return $this->release_date;
    }
    public function getDirector () {
        return $this->director;
    }
    public function getImage () {
        return $this->image;
    }
    public function getDescription () {
        return $this->description;
    }

    // set movie id
    public function setID ($id) {
        $this->id = $id;
    }
}