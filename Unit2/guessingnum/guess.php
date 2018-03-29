<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 2/8/2018
 * Time: 2:38 PM
 * Description: This file was created to
 */
if (isset($_COOKIE['random'])) {
    $random = $_COOKIE['random'];
} else {
    $random = rand(1, 100);
    setcookie("random", $random);
}

$guess = (int)($_GET['guess']);

if ($guess > $random) {
    echo json_encode(array("result" => 1));
}elseif ($guess < $random) {
    echo json_encode(array("result" => -1));
} else {
    echo json_encode(array("result" => 0));
}

?>
