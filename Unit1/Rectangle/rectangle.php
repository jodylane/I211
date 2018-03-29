<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 1/11/2018
 * Time: 1:47 PM
 * Description: This file was created to
 */
require_once 'rectangle.class.php';

//create two rectangle objects
$r1 = new Rectangle(20, 30);
$r2 = new Rectangle(10, 5);

////set their widths and heights
//$r1->set_height(20);
//$r1->set_width(30);
//$r2->set_height(10);
//$r2->set_width(5);

// determine and display the first rectangles area and perimeter
$area = $r1->calculate_area();
$perimeter = $r1->calculate_perimeter();
echo "Rectangle 1: area=$area, perimeter=$perimeter ";

// determine and display the second rectangles area and perimeter

$area = $r2->calculate_area();
$perimeter = $r2->calculate_perimeter();
echo "Rectangle 2: area=$area, perimeter=$perimeter";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

</body>
</html>