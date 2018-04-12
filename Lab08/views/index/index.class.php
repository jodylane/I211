<?php

/**
 * Created by PhpStorm.
 * User: PeytonChester
 * Date: 3/29/18
 * Time: 4:20 PM
 * Description: The homepage
 */

class Index {

    //Create a public method called display
    public function display() {
?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Guest Error</title>
                <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
            </head>
            <body>
            <!-- Create a form for the user to "sign" -->
            <!-- Pass along the inputs using the POST method -->
            <form action="index.php?action=sign" method="post">
                First name: <input type="text" name="firstname" required><br>
                Last name: <input type="text" name="lastname" required><br>
                Birthdate: <input type="date" name="birthdate" required><br>
                Email: <input type="email" name="email" required><br>

                <input type="submit" name="submit" value="Submit">
            </form>
            </body>
        </html>
<?php
    }
}