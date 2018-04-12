<?php

/**
 * Created by PhpStorm.
 * User: PeytonChester
 * Date: 3/29/18
 * Time: 4:21 PM
 * Description: The view for after you submit the "sign" form
 */
class SignGuest {
    //Create a public method called display
    public function display() {
?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Sign Guest</title>
                <link type="text/css" rel="stylesheet" href="www/css/styles.css" />
            </head>
            <body>
                <h1>GUESTBOOK APPLICATION</h1>

                <h3>Thank you for signing our guestbook. You will be contacted soon.</h3>

                <a href="index.php?action=show">Show Guest Book</a>
            </body>
        </html>
<?php
    }
}