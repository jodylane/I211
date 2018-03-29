<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/16/2018
 * Time: 4:52 PM
 * Description: This file was created to recieve zipcode and retrieve results for ZipLookup class.
 */

require_once ('zip_lookup.class.php');

if(isset($_GET['zipcode'])) {
    $zip = $_GET['zipcode'];
} else {
    echo json_encode(array("error" => 'There was an issue getting the zipcode the user entered'));
    exit;
}

$results = new ZipLookup();

$results = $results->lookup($zip);

echo json_encode($results);