<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/25/2018
 * Time: 8:56 PM
 * Description: This file was created to handle ajax request.
 */

// require classes for circle and cylinder
require_once('circle.class.php');
require_once('cylinder.class.php');

// retrieve our radius and height params
if(isset($_GET['radius'])) {
    $radius = $_GET['radius'];
}

if(isset($_GET['height'])) {
    $height = $_GET['height'];
}

// create new cylinder object and return string value
$cylinder = new Cylinder($radius, $height);
$results = $cylinder->toString();

// echo string json
echo $results;
