<?php

/**
 * Created by PhpStorm.
 * User: PeytonChester
 * Date: 3/29/18
 * Time: 4:20 PM
 * Description: The page for viewing all the guests that have signed the book
 */
class ShowGuest {
    //Create a public method called display
    public function display($guests) {
?>

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Show Guest</title>
                <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
            </head>
            <body>
                <!-- Create the table to display the guests-->
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birth Date</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //Loop through all the guests that have signed
                        //Create a variable and assign it the value of whatever is being received
                        foreach ($guests as $guest) {
                            //Put the values in the table
                            echo "<tr>";
                            echo "<td>" . $guest->getFirstName() . " " . $guest->getLastName() . "</td>";
                            echo "<td>". $guest->getBirthday() . "</td>";
                            echo "<td>" . $guest->getEmail() . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php">Sign Guest Book</a>
            </body>
        </html>
<?php
    }
}