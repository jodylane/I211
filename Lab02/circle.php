<?php
/*
 * Author: Josh Lane
 * Date:1/25/2018
 * File: circle.php
 * Description: This file was created to show the form and circle details.
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>The Circle Application</title>
		<style>
            body {
                padding-left:30px; 
                padding-top:30px;
            }

            div {
                border:solid 1px #000; 
                width:300px; 
                padding: 10px;
            }

            table {
                border: none;
                border-collapse: collapse;
            }

            td {
                border: none;
                padding: 5px;
            }

            tr td:first-child {
                width: 100px;
                text-align: right;
            }
        </style>
    </head>
    <body>
        <h2>The Circle Application</h2>
        <div>
            <?php
            // require classes so we can create new instances of them
            require_once('point.class.php');
            require_once ('circle.class.php');

			//display the input form when the page is first loaded
            if (!isset($_GET['xCoord']) || !isset($_GET['yCoord']) || !isset($_GET['radius'])) {
                require_once 'circle_form.php';
            } else {
				//add your code here

                // get input values
                $xCoord = $_GET['xCoord'];
                $yCoord = $_GET['yCoord'];
                $radius = $_GET['radius'];

                // check number value to ensure number value is not less than or equal to 0
                if ($xCoord <= 0) {
                    echo "there beath an error. xCoordinate value must be greater than 0";
                    exit;
                } elseif ($yCoord <= 0) {
                    echo "there beath an error. yCoordinate value must be greater than 0";
                    exit;
                } elseif ($radius <= 0) {
                    echo "there beath an error. radius value must be greater than 0";
                    exit;
                }

                // create new instance of point
                $point = new Point($xCoord, $yCoord);

                // create new instance of a circle
                $circle = new Circle($point, $radius);

                // print circle details message to DOM
                echo $circle->toString();
			}
            ?>
        </div>
    </body>
</html>