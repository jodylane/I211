<?php
/*
 * Author Louie Zhu
 * Date: 2/25/2017
 * Name: test_interface.php
 * Description: a client program that tests all classes and interfaces in the Nameable class hierarchy.
 */

 require ('utilities.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test the Nameable Interface</title>
    </head>
    <body>
        <?php
        //create two Dog instances
        $d1 = new Dog("Samantha", "Austrlian Shepherd");
        $d2 = new Dog("Maxwell", "German Shorthaired");

        //print information about the two dogs
        $d1->toString();
        echo "<br /><br />";
        $d2->toString();

        echo "<h2>Test the Nameable Interface with the Vehicle class hierarchy</h2>";
        $c1 = new Car("Betty", "Ferrari");
        $c2 = new Car('Max', 'Porsche');

        $c1->toString();
        echo "<br><br>";
        $c2->toString();

        ?>
    </body>
</html>
